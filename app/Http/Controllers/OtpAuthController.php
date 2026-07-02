<?php

namespace App\Http\Controllers;

use App\Mail\OtpCodeMail;
use App\Mail\RegistrationCompletedMail;
use App\Models\OtpDeliveryLog;
use App\Models\Setting;
use App\Models\User;
use App\Services\WhatsAppService;
use App\Support\IpGeolocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class OtpAuthController extends Controller
{
    private const OTP_TTL_SECONDS = 180;

    public function show()
    {
        return redirect('/account?mode=otp');
    }

    public function send(Request $request)
    {
        $purpose = strtolower((string) $request->input('purpose', 'login'));
        $purpose = in_array($purpose, ['login', 'register'], true) ? $purpose : 'login';

        $rules = [
            'purpose' => ['nullable', 'string', 'in:login,register'],
            'country_code' => ['nullable', 'string', 'max:8'],
        ];

        if ($purpose === 'register') {
            $rules = array_merge($rules, [
                'name' => ['required', 'string', 'max:150'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
                'mobile' => ['required', 'string', 'max:32', Rule::unique('users', 'mobile')],
                'mobile_raw' => ['nullable', 'string', 'max:32'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        } else {
            $rules = array_merge($rules, [
                'identifier' => ['required', 'string', 'max:255'],
            ]);
        }

        $data = $request->validate($rules);

        if ($purpose === 'register') {
            return $this->sendRegistrationOtp($request, $data);
        }

        return $this->sendLoginOtp($request, $data);
    }

    public function verify(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'otp' => ['required', 'digits:6'],
            'purpose' => ['nullable', 'string', 'in:login,register'],
        ]);

        $email = strtolower($data['email']);
        $purpose = strtolower((string) ($data['purpose'] ?? $request->session()->get('otp_purpose', 'login')));
        $purpose = in_array($purpose, ['login', 'register'], true) ? $purpose : 'login';
        $payload = Cache::get($this->otpCacheKey($email));

        if (!$payload || empty($payload['hash']) || !Hash::check($data['otp'], $payload['hash'])) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP. Please request a new OTP.'])->withInput();
        }

        Cache::forget($this->otpCacheKey($email));

        $existing = User::query()->whereRaw('LOWER(email) = ?', [$email])->first();
        $countryCode = $this->normalizeCountryCode($request->session()->get('otp_country_code') ?? $request->input('country_code') ?? $existing?->country_code);
        $mobile = $request->session()->get('otp_mobile');

        if ($purpose === 'register') {
            if (User::query()->whereRaw('LOWER(email) = ?', [$email])->where('is_blocked', true)->exists()) {
                return back()->withErrors(['email' => 'This email is blocked. Please contact support.'])->withInput();
            }

            if ($mobile && User::query()->where('mobile', $mobile)->where('is_blocked', true)->exists()) {
                return back()->withErrors(['mobile' => 'This mobile number is blocked. Please contact support.'])->withInput();
            }

            if ($existing) {
                return back()->withErrors(['email' => 'An account already exists with this email. Please log in instead.'])->withInput();
            }

            $name = (string) ($request->session()->get('otp_name') ?: Str::before($email, '@'));
            $password = (string) ($request->session()->get('otp_password') ?: Str::random(32));

            $user = User::create([
                'email' => $email,
                'name' => $name,
                'mobile' => $mobile,
                'country_code' => $countryCode,
                'password' => $password,
                'email_verified_at' => now(),
                'mobile_verified_at' => $countryCode === 'in' && $mobile ? now() : null,
            ]);

            $wasRecentlyCreated = true;
        } else {
            $user = $existing;
            $wasRecentlyCreated = false;

            if (!$user) {
                return back()->withErrors(['email' => 'No account found with this email. Please register first.'])->withInput();
            }
        }

        if ($user->isAdmin()) {
            return redirect()->route('admin.login')->with('status', 'Please log in from the Admin panel.');
        }

        if ($user->isBlocked()) {
            return back()->withErrors(['email' => 'This account is blocked. Please contact support.'])->withInput();
        }

        Auth::login($user, true);
        $request->session()->regenerate();

        if ($wasRecentlyCreated) {
            try {
                $log = $this->createOtpDeliveryLog('register_welcome', 'email', (string) $user->email, 'registration-complete', [
                    'mail_mailer' => config('mail.default'),
                    'mail_host' => config('mail.mailers.smtp.host'),
                    'mail_port' => config('mail.mailers.smtp.port'),
                ]);

                Mail::to($user->email)->send(new RegistrationCompletedMail($user));

                $this->finalizeOtpDeliveryLog($log, 'sent', null, null, 'Registration welcome email sent.');
            } catch (\Throwable $e) {
                report($e);
                if (isset($log)) {
                    $this->finalizeOtpDeliveryLog($log, 'failed', null, $e->getMessage(), 'Registration welcome email failed.');
                }
            }

                if ($user->country_code === 'in' && $user->mobile) {
                    app(WhatsAppService::class)->sendRegistrationWelcome($user);
                }
        }

        $request->session()->forget([
            'otp_email',
            'otp_purpose',
            'otp_name',
            'otp_mobile',
            'otp_password',
            'otp_country_code',
            'otp_identifier',
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'redirect_url' => url('/myaccount/querystatus'),
                'message' => 'Logged in successfully.',
                'purpose' => $purpose,
            ]);
        }

        return redirect('/myaccount/querystatus')->with('status', 'Logged in successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/account')->with('status', 'Logged out.');
    }

    private function sendLoginOtp(Request $request, array $data)
    {
        $identifier = strtolower(trim($data['identifier']));
        $user = $this->findUserByIdentifier($identifier);

        if (!$user) {
            return back()->withErrors(['identifier' => 'No account found with this email or mobile number. Please register first.'])->withInput();
        }

        if ($user->isBlocked()) {
            return back()->withErrors(['identifier' => 'This account is blocked. Please contact support.'])->withInput();
        }

        if ($user->isAdmin()) {
            return back()->withErrors(['identifier' => 'Admin accounts must log in from the Admin panel.'])->withInput();
        }

        $isMobileIdentifier = !$this->isEmail($identifier);
        $countryCode = $this->resolveCountryCode($request, $user, $identifier);

        if ($isMobileIdentifier && $countryCode !== 'in') {
            return back()->withErrors(['identifier' => 'NRI accounts should use email for OTP login.'])->withInput();
        }

        $code = (string) random_int(100000, 999999);
        Cache::put($this->otpCacheKey($user->email), [
            'hash' => Hash::make($code),
            'created_at' => now()->toIso8601String(),
        ], self::OTP_TTL_SECONDS);

        $emailLog = $this->createOtpDeliveryLog('login', 'email', (string) $user->email, 'otp-code', [
            'mail_mailer' => config('mail.default'),
            'mail_host' => config('mail.mailers.smtp.host'),
            'mail_port' => config('mail.mailers.smtp.port'),
        ]);
        try {
            Mail::to($user->email)->send(new OtpCodeMail($code));
            $this->finalizeOtpDeliveryLog($emailLog, 'sent', null, null, 'OTP email sent.');
        } catch (\Throwable $e) {
            report($e);
            $this->finalizeOtpDeliveryLog($emailLog, 'failed', null, $e->getMessage(), 'OTP email failed.');
        }

        $mobile = $countryCode === 'in' ? $this->normalizeMobile($user->mobile) : null;
        if ($mobile) {
            $waLog = $this->createOtpDeliveryLog('login', 'whatsapp', $mobile, 'astro_otp', [
                'whatsapp_api_url' => Setting::plainValue('whatsapp.api_url'),
                'whatsapp_sender' => Setting::plainValue('whatsapp.sender'),
                'country_code' => $countryCode,
            ]);

            $waResult = app(WhatsAppService::class)->sendOtp($mobile, $code, [
                'purpose' => 'login',
                'name' => $user->name,
                'email' => $user->email,
            ]);

            if ($waResult) {
                $this->finalizeOtpDeliveryLog(
                    $waLog,
                    $waResult->status === 'sent' ? 'sent' : $waResult->status,
                    [
                        'whatsapp_log_id' => $waResult->id,
                        'http_status' => $waResult->http_status,
                        'response_payload' => $waResult->response_payload,
                    ],
                    $waResult->status === 'failed' ? 'WhatsApp OTP failed.' : null,
                    'Login WhatsApp OTP ' . $waResult->status . '.'
                );
            } else {
                $this->finalizeOtpDeliveryLog($waLog, 'skipped', null, 'WhatsApp OTP not sent.', 'Login WhatsApp OTP skipped.');
            }
        }

        $request->session()->put('otp_email', $user->email);
        $request->session()->put('otp_purpose', 'login');
        $request->session()->put('otp_name', $user->name);
        $request->session()->put('otp_mobile', $mobile);
        $request->session()->put('otp_country_code', $countryCode);
        $request->session()->put('otp_identifier', $identifier);

        $message = $mobile
            ? 'OTP sent to your email and mobile number. Please check both inboxes.'
            : 'OTP sent to your email. Please check your inbox.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'expires_in' => self::OTP_TTL_SECONDS,
                'email' => $user->email,
                'purpose' => 'login',
            ]);
        }

        return back()->with('status', $message);
    }

    private function sendRegistrationOtp(Request $request, array $data)
    {
        $email = strtolower(trim($data['email']));
        $mobile = $this->normalizeMobile($data['mobile'] ?? $data['mobile_raw'] ?? null);
        $countryCode = $this->resolveCountryCode($request);

        if (User::query()->whereRaw('LOWER(email) = ?', [$email])->exists()) {
            return back()->withErrors(['email' => 'An account already exists with this email. Please log in instead.'])->withInput();
        }

        if ($mobile && User::query()->where('mobile', $mobile)->exists()) {
            return back()->withErrors(['mobile' => 'An account already exists with this mobile number.'])->withInput();
        }

        $code = (string) random_int(100000, 999999);
        Cache::put($this->otpCacheKey($email), [
            'hash' => Hash::make($code),
            'created_at' => now()->toIso8601String(),
        ], self::OTP_TTL_SECONDS);

        $emailLog = $this->createOtpDeliveryLog('register', 'email', $email, 'otp-code', [
            'mail_mailer' => config('mail.default'),
            'mail_host' => config('mail.mailers.smtp.host'),
            'mail_port' => config('mail.mailers.smtp.port'),
        ]);
        try {
            Mail::to($email)->send(new OtpCodeMail($code));
            $this->finalizeOtpDeliveryLog($emailLog, 'sent', null, null, 'OTP email sent.');
        } catch (\Throwable $e) {
            report($e);
            $this->finalizeOtpDeliveryLog($emailLog, 'failed', null, $e->getMessage(), 'OTP email failed.');
        }

        $sendToMobile = $countryCode === 'in' && $mobile;
        if ($sendToMobile) {
            $waLog = $this->createOtpDeliveryLog('register', 'whatsapp', $mobile, 'astro_otp', [
                'whatsapp_api_url' => Setting::plainValue('whatsapp.api_url'),
                'whatsapp_sender' => Setting::plainValue('whatsapp.sender'),
                'country_code' => $countryCode,
            ]);

            $waResult = app(WhatsAppService::class)->sendRegistrationOtp($mobile, $code, [
                'purpose' => 'register',
                'name' => $data['name'] ?? '',
                'email' => $email,
            ]);

            if ($waResult) {
                $this->finalizeOtpDeliveryLog(
                    $waLog,
                    $waResult->status === 'sent' ? 'sent' : $waResult->status,
                    [
                        'whatsapp_log_id' => $waResult->id,
                        'http_status' => $waResult->http_status,
                        'response_payload' => $waResult->response_payload,
                    ],
                    $waResult->status === 'failed' ? 'WhatsApp OTP failed.' : null,
                    'Register WhatsApp OTP ' . $waResult->status . '.'
                );
            } else {
                $this->finalizeOtpDeliveryLog($waLog, 'skipped', null, 'WhatsApp OTP not sent.', 'Register WhatsApp OTP skipped.');
            }
        }

        $request->session()->put('otp_email', $email);
        $request->session()->put('otp_purpose', 'register');
        $request->session()->put('otp_name', $data['name'] ?? null);
        $request->session()->put('otp_mobile', $mobile);
        $request->session()->put('otp_password', (string) ($data['password'] ?? ''));
        $request->session()->put('otp_country_code', $countryCode);

        $message = $sendToMobile
            ? 'OTP sent to your email and mobile number. Please check both inboxes.'
            : 'OTP sent to your email. Please check your inbox.';

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'expires_in' => self::OTP_TTL_SECONDS,
                'email' => $email,
                'purpose' => 'register',
            ]);
        }

        return back()->with('status', $message);
    }

    private function normalizeMobile(?string $mobile): ?string
    {
        $mobile = trim((string) $mobile);

        if ($mobile === '') {
            return null;
        }

        $mobile = preg_replace('/[^\d+]/', '', $mobile);

        return $mobile !== '' ? $mobile : null;
    }

    private function normalizeCountryCode(mixed $countryCode): string
    {
        $countryCode = strtolower(trim((string) $countryCode));

        if ($countryCode === '') {
            return 'in';
        }

        return substr($countryCode, 0, 2);
    }

    private function resolveCountryCode(Request $request, ?User $user = null, ?string $identifier = null): string
    {
        if ($user?->country_code) {
            return $this->normalizeCountryCode($user->country_code);
        }

        $sessionCountry = $this->normalizeCountryCode($request->session()->get('otp_country_code'));
        if ($sessionCountry !== 'in' || $request->session()->has('otp_country_code')) {
            return $sessionCountry;
        }

        $inputCountry = $this->normalizeCountryCode($request->input('country_code'));
        if ($inputCountry !== 'in' || $request->filled('country_code')) {
            return $inputCountry;
        }

        $mobile = $this->normalizeMobile($identifier);
        if ($mobile && Str::startsWith($mobile, '+91')) {
            return 'in';
        }

        if ($mobile && $user?->mobile && Str::startsWith($user->mobile, '+91')) {
            return 'in';
        }

        $geo = IpGeolocation::lookup($request->ip());
        $geoCountry = strtolower(trim((string) ($geo['country'] ?? '')));
        if ($geoCountry === 'india') {
            return 'in';
        }

        return 'in';
    }

    private function findUserByIdentifier(string $identifier): ?User
    {
        $identifier = trim($identifier);
        if ($identifier === '') {
            return null;
        }

        if ($this->isEmail($identifier)) {
            return User::query()->whereRaw('LOWER(email) = ?', [Str::lower($identifier)])->first();
        }

        $candidates = $this->mobileLookupCandidates($identifier);
        if (empty($candidates)) {
            return null;
        }

        foreach ($candidates as $mobile) {
            $user = User::query()->where('mobile', $mobile)->first();
            if ($user) {
                return $user;
            }
        }

        return null;
    }

    private function mobileLookupCandidates(string $identifier): array
    {
        $mobile = $this->normalizeMobile($identifier);
        if (!$mobile) {
            return [];
        }

        $candidates = [$mobile];

        if (!Str::startsWith($mobile, '+') && preg_match('/^\d{10}$/', $mobile)) {
            $candidates[] = '+91' . $mobile;
        }

        return array_values(array_unique($candidates));
    }

    private function isEmail(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function otpCacheKey(string $email): string
    {
        return 'otp:email:' . Str::lower(trim($email));
    }

    private function createOtpDeliveryLog(string $purpose, string $channel, string $recipient, ?string $templateSlug, array $requestPayload = []): ?OtpDeliveryLog
    {
        if (!Schema::hasTable('otp_delivery_logs')) {
            return null;
        }

        return OtpDeliveryLog::create([
            'user_id' => auth()->id(),
            'purpose' => $purpose,
            'channel' => $channel,
            'recipient' => $recipient,
            'template_slug' => $templateSlug,
            'status' => 'pending',
            'request_payload' => $requestPayload,
            'sent_at' => null,
        ]);
    }

    private function finalizeOtpDeliveryLog(?OtpDeliveryLog $log, string $status, ?array $responsePayload = null, ?string $errorMessage = null, ?string $messageText = null): void
    {
        if (!$log) {
            return;
        }

        $log->update([
            'status' => $status,
            'response_payload' => $responsePayload,
            'error_message' => $errorMessage,
            'message_text' => $messageText,
            'sent_at' => now(),
        ]);
    }
}
