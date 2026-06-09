<?php

namespace App\Services;

use App\Models\EmailTemplate;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class EmailTemplateService
{
    public function compose(string $slug, array $data, string $fallbackSubject, string $fallbackBodyHtml): array
    {
        $template = Schema::hasTable('email_templates')
            ? EmailTemplate::query()
                ->where('slug', $slug)
                ->where('is_active', true)
                ->first()
            : null;

        $subject = trim((string) ($template?->subject ?? '')) ?: $fallbackSubject;
        $bodyHtml = trim((string) ($template?->body_html ?? '')) ?: $fallbackBodyHtml;

        return [
            'subject' => $subject,
            'heading' => $subject,
            'bodyHtml' => $this->renderTokens($bodyHtml, $data),
        ];
    }

    private function renderTokens(string $html, array $data): string
    {
        $settings = $this->siteSettings();
        $enquiry = $data['enquiry'] ?? null;

        $replacements = [
            '{{site_name}}' => e((string) (config('app.name') ?: '')),
            '{{brand_name}}' => e((string) ($settings['mail.from.name'] ?? config('app.name'))),
            '{{support_email}}' => e((string) ($settings['site.email'] ?? config('mail.from.address'))),
            '{{support_phone}}' => e((string) ($settings['site.phone'] ?? '')),
            '{{support_address}}' => (string) ($settings['contact.address_html'] ?? ''),
            '{{business_hours}}' => e((string) ($settings['contact.business_hours'] ?? '')),
            '{{login_url}}' => e(url('/account')),
            '{{year}}' => e((string) now()->year),
            '{{code}}' => e((string) ($data['code'] ?? '')),
            '{{expires_minutes}}' => e((string) max(1, (int) ceil(((int) ($data['expires_seconds'] ?? 180)) / 60))),
            '{{name}}' => e((string) ($data['name'] ?? '')),
            '{{email}}' => e((string) ($data['email'] ?? '')),
            '{{mobile}}' => e((string) ($data['mobile'] ?? '')),
            '{{subject}}' => e((string) ($data['subject'] ?? '')),
            '{{message}}' => nl2br(e((string) ($data['message'] ?? ''))),
            '{{source}}' => e((string) ($data['source'] ?? '')),
            '{{context}}' => e((string) ($data['context'] ?? '')),
            '{{page_url}}' => e((string) ($data['page_url'] ?? '')),
            '{{phone}}' => e((string) ($data['phone'] ?? '')),
            '{{enquiry_details}}' => $enquiry ? $this->enquiryDetailsHtml($enquiry) : '',
        ];

        return strtr($html, $replacements);
    }

    private function enquiryDetailsHtml(object $enquiry): string
    {
        $rows = [
            'Source' => $enquiry->source ?? '-',
            'Context' => $enquiry->context ?? '-',
            'Page' => $enquiry->page_url ?? '-',
            'Name' => $enquiry->name ?? '-',
            'Email' => $enquiry->email ?? '-',
            'Phone' => $enquiry->phone ?? '-',
            'Subject' => $enquiry->subject ?? '-',
            'Message' => $enquiry->message ?? '-',
        ];

        $html = '<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #e5e7eb; border-collapse:collapse; margin:16px 0;">';
        foreach ($rows as $label => $value) {
            $html .= '<tr>';
            $html .= '<td style="width:160px; padding:10px 12px; background:#f9fafb; border-bottom:1px solid #e5e7eb; font-weight:bold; color:#111827;">' . e($label) . '</td>';
            $html .= '<td style="padding:10px 12px; border-bottom:1px solid #e5e7eb; color:#374151;">' . nl2br(e((string) $value)) . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        return $html;
    }

    private function siteSettings(): array
    {
        return Cache::remember('settings.all', 3600, function () {
            if (!Schema::hasTable('settings')) {
                return [];
            }

            return Setting::pluck('value', 'key')->toArray();
        });
    }
}
