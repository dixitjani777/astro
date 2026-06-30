<?php

namespace App\Services;

use App\Models\Enquiry;
use App\Models\EnquiryReply;
use App\Models\Setting;
use App\Models\User;
use App\Models\WhatsappLog;
use App\Models\WhatsappTemplate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

class WhatsAppService
{
    private const OTP_TEMPLATE_SLUG = 'astro_otp';
    private const OTP_PROVIDER_PRIORITY = 'wa';
    private const OTP_PROVIDER_STYPE = 'auth';

    public function sendOtp(string $recipient, string $code, array $context = []): ?WhatsappLog
    {
        $recipient = $this->normalizePhoneRecipient($recipient);
        if ($recipient === '') {
            return null;
        }

        return $this->sendOtpViaProvider($recipient, $code, $context);
    }

    public function sendRegistrationOtp(string $recipient, string $code, array $context = []): ?WhatsappLog
    {
        $context['purpose'] = 'register';

        return $this->sendOtp($recipient, $code, $context);
    }

    public function sendRegistrationWelcome(User $user): ?WhatsappLog
    {
        if (empty($user->mobile)) {
            return null;
        }

        return $this->sendTemplate('registration-complete', (string) $user->mobile, [
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile,
            'login_url' => url('/account'),
            'message' => 'Your account has been created successfully. You can log in at ' . url('/account'),
        ], [
            'user_id' => $user->id,
        ]);
    }

    public function sendEnquiryReply(Enquiry $enquiry, EnquiryReply $reply): ?WhatsappLog
    {
        $recipient = $this->resolveRecipientMobile($enquiry);
        if (!$recipient) {
            return null;
        }

        $replyUrl = $reply->attachment_url ?? null;
        $message = trim((string) ($reply->body ?? ''));

        if ($reply->payment_url) {
            $message .= ($message !== '' ? "\n\n" : '') . 'Payment link: ' . $reply->payment_url;
        }
        if ($replyUrl) {
            $message .= ($message !== '' ? "\n\n" : '') . 'Attachment: ' . $replyUrl;
        }
        if ($message === '') {
            $message = 'We have replied to your enquiry. Please check your account for details.';
        }

        return $this->sendTemplate('enquiry-reply', $recipient, [
            'name' => $this->resolveRecipientName($enquiry),
            'email' => $this->resolveRecipientEmail($enquiry),
            'mobile' => $recipient,
            'subject' => $enquiry->subject ?? $enquiry->request_type_label,
            'message' => $message,
            'reply_body' => $reply->body ?? '',
            'attachment_url' => $replyUrl ?? '',
            'payment_url' => $reply->payment_url ?? '',
            'login_url' => url('/myaccount/querystatus'),
        ], [
            'enquiry_id' => $enquiry->id,
            'enquiry_reply_id' => $reply->id,
            'user_id' => $enquiry->user_id,
        ]);
    }

    public function sendTemplate(string $slug, string $recipient, array $data = [], array $meta = []): ?WhatsappLog
    {
        $recipient = trim($recipient);
        if ($recipient === '') {
            return null;
        }

        $settings = $this->settings();
        $enabled = filter_var((string) ($settings['whatsapp.enabled'] ?? '1'), FILTER_VALIDATE_BOOL);

        $template = Schema::hasTable('whatsapp_templates')
            ? WhatsappTemplate::query()->where('slug', $slug)->where('is_active', true)->first()
            : null;

        $fallback = $data['message'] ?? ('Message from ' . config('app.name'));
        $messageText = $this->renderTokens((string) ($template?->body_text ?? ''), $data);
        if (trim($messageText) === '') {
            $messageText = $fallback;
        }

        $payload = [
            'to' => $recipient,
            'template' => $slug,
            'message' => $messageText,
            'variables' => $data,
        ];

        if (!$enabled || empty($settings['whatsapp.api_url'])) {
        return $this->storeLog(array_merge($meta, [
            'recipient' => $recipient,
            'template_slug' => $slug,
            'message_text' => $messageText,
                'status' => 'skipped',
                'http_status' => null,
                'request_payload' => $payload,
                'response_payload' => ['message' => 'WhatsApp is disabled or missing API URL.'],
                'sent_at' => null,
            ]));
        }

        $request = Http::acceptJson()->asJson()->timeout((int) ($settings['whatsapp.timeout'] ?? 20));
        if (!empty($settings['whatsapp.api_token'])) {
            $request = $request->withToken((string) $settings['whatsapp.api_token']);
        }
        if (!empty($settings['whatsapp.api_key'])) {
            $request = $request->withHeaders([
                'X-API-KEY' => (string) $settings['whatsapp.api_key'],
            ]);
        }

        try {
            $response = $request->post((string) $settings['whatsapp.api_url'], $payload);

            return $this->storeLog(array_merge($meta, [
                'recipient' => $recipient,
                'template_slug' => $slug,
                'message_text' => $messageText,
                'status' => $response->successful() ? 'sent' : 'failed',
                'http_status' => $response->status(),
                'request_payload' => $payload,
                'response_payload' => $this->decodeResponseBody($response->body()),
                'sent_at' => $response->successful() ? now() : null,
            ]));
        } catch (\Throwable $e) {
            return $this->storeLog(array_merge($meta, [
                'recipient' => $recipient,
                'template_slug' => $slug,
                'message_text' => $messageText,
                'status' => 'failed',
                'http_status' => null,
                'request_payload' => $payload,
                'response_payload' => ['message' => $e->getMessage()],
                'sent_at' => null,
            ]));
        }
    }

    private function sendOtpViaProvider(string $recipient, string $code, array $context = []): ?WhatsappLog
    {
        $settings = $this->settings();
        $enabled = filter_var((string) ($settings['whatsapp.enabled'] ?? '1'), FILTER_VALIDATE_BOOL);
        $apiUrl = trim((string) ($settings['whatsapp.api_url'] ?? ''));
        $user = trim((string) ($settings['whatsapp.user'] ?? ''));
        $pass = trim((string) ($settings['whatsapp.pass'] ?? ''));
        $sender = trim((string) ($settings['whatsapp.sender'] ?? ''));

        $templateText = $this->resolveOtpTemplateText();
        $requestPayload = [
            'user' => $user,
            'pass' => $pass,
            'sender' => $sender,
            'phone' => $recipient,
            'text' => $templateText,
            'priority' => self::OTP_PROVIDER_PRIORITY,
            'stype' => self::OTP_PROVIDER_STYPE,
            'Params' => $code,
        ];

        $log = $this->storeLog(array_merge($context, [
            'recipient' => $recipient,
            'template_slug' => self::OTP_TEMPLATE_SLUG,
            'message_text' => 'OTP sent using template ' . $templateText,
            'status' => 'pending',
            'http_status' => null,
            'request_payload' => $this->maskOtpPayload($requestPayload),
            'response_payload' => null,
            'sent_at' => null,
        ]));

        if (!$enabled || $apiUrl === '') {
            $log->update([
                'status' => 'skipped',
                'response_payload' => ['message' => 'WhatsApp is disabled or missing API URL.'],
            ]);

            return $log;
        }

        if ($user === '' || $pass === '' || $sender === '') {
            $log->update([
                'status' => 'skipped',
                'response_payload' => ['message' => 'WhatsApp credentials are missing.'],
            ]);

            return $log;
        }

        try {
            $response = Http::timeout((int) ($settings['whatsapp.timeout'] ?? 20))
                ->connectTimeout(10)
                ->get($apiUrl, $requestPayload);

            $log->update([
                'status' => $response->successful() ? 'sent' : 'failed',
                'http_status' => $response->status(),
                'response_payload' => $this->decodeResponseBody($response->body()),
                'sent_at' => $response->successful() ? now() : null,
            ]);

            return $log;
        } catch (\Throwable $e) {
            $log->update([
                'status' => 'failed',
                'response_payload' => ['message' => $e->getMessage()],
            ]);

            return $log;
        }
    }

    private function storeLog(array $data): WhatsappLog
    {
        return WhatsappLog::create([
            'user_id' => $data['user_id'] ?? null,
            'enquiry_id' => $data['enquiry_id'] ?? null,
            'enquiry_reply_id' => $data['enquiry_reply_id'] ?? null,
            'recipient' => $data['recipient'] ?? null,
            'template_slug' => $data['template_slug'] ?? null,
            'message_text' => $data['message_text'] ?? null,
            'status' => $data['status'] ?? 'sent',
            'http_status' => $data['http_status'] ?? null,
            'request_payload' => $data['request_payload'] ?? null,
            'response_payload' => $data['response_payload'] ?? null,
            'sent_at' => $data['sent_at'] ?? now(),
        ]);
    }

    private function settings(): array
    {
        return Cache::remember('whatsapp.settings', 3600, function () {
            if (!Schema::hasTable('settings')) {
                return [];
            }

            return Setting::query()
                ->whereIn('key', [
                    'whatsapp.enabled',
                    'whatsapp.api_url',
                    'whatsapp.api_token',
                    'whatsapp.api_key',
                    'whatsapp.timeout',
                    'whatsapp.sender',
                    'whatsapp.default_country',
                    'whatsapp.user',
                    'whatsapp.pass',
                ])
                ->pluck('value', 'key')
                ->toArray();
        });
    }

    private function normalizePhoneRecipient(string $recipient): string
    {
        return preg_replace('/\D+/', '', trim($recipient)) ?: '';
    }

    private function resolveOtpTemplateText(): string
    {
        if (!Schema::hasTable('whatsapp_templates')) {
            return self::OTP_TEMPLATE_SLUG;
        }

        $template = WhatsappTemplate::query()
            ->where('slug', self::OTP_TEMPLATE_SLUG)
            ->where('is_active', true)
            ->first();

        return $template?->slug ?: self::OTP_TEMPLATE_SLUG;
    }

    private function maskOtpPayload(array $payload): array
    {
        if (array_key_exists('user', $payload)) {
            $payload['user'] = $payload['user'] !== '' ? '***' : '';
        }
        if (array_key_exists('pass', $payload)) {
            $payload['pass'] = $payload['pass'] !== '' ? '***' : '';
        }
        if (array_key_exists('sender', $payload)) {
            $payload['sender'] = $payload['sender'] !== '' ? '***' : '';
        }
        $payload['Params'] = isset($payload['Params']) ? '***' : null;

        return $payload;
    }

    private function renderTokens(string $text, array $data): string
    {
        $replacements = [
            '{{site_name}}' => (string) config('app.name'),
            '{{name}}' => (string) ($data['name'] ?? ''),
            '{{email}}' => (string) ($data['email'] ?? ''),
            '{{mobile}}' => (string) ($data['mobile'] ?? ''),
            '{{code}}' => (string) ($data['code'] ?? ''),
            '{{expires_minutes}}' => (string) ($data['expires_minutes'] ?? ''),
            '{{subject}}' => (string) ($data['subject'] ?? ''),
            '{{message}}' => (string) ($data['message'] ?? ''),
            '{{reply_body}}' => (string) ($data['reply_body'] ?? ''),
            '{{attachment_url}}' => (string) ($data['attachment_url'] ?? ''),
            '{{payment_url}}' => (string) ($data['payment_url'] ?? ''),
            '{{login_url}}' => (string) ($data['login_url'] ?? ''),
        ];

        return trim(strtr($text, $replacements));
    }

    private function decodeResponseBody(string $body): array|string|null
    {
        $decoded = json_decode($body, true);
        return json_last_error() === JSON_ERROR_NONE ? $decoded : $body;
    }

    private function resolveRecipientMobile(Enquiry $enquiry): ?string
    {
        $mobile = $enquiry->phone ?: $enquiry->user?->mobile;
        $mobile = trim((string) $mobile);

        return $mobile !== '' ? $mobile : null;
    }

    private function resolveRecipientEmail(Enquiry $enquiry): ?string
    {
        $email = $enquiry->email ?: $enquiry->user?->email;
        $email = trim((string) $email);

        return $email !== '' ? $email : null;
    }

    private function resolveRecipientName(Enquiry $enquiry): ?string
    {
        $name = $enquiry->name ?: $enquiry->user?->name;
        $name = trim((string) $name);

        return $name !== '' ? $name : null;
    }
}
