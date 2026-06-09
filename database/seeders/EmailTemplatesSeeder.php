<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class EmailTemplatesSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(
            ['key' => 'mail.brand.logo'],
            ['type' => 'string', 'value' => 'images/logo.png']
        );

        Setting::updateOrCreate(
            ['key' => 'mail.brand.primary_color'],
            ['type' => 'string', 'value' => '#c89b3c']
        );

        Setting::updateOrCreate(
            ['key' => 'mail.brand.dark_color'],
            ['type' => 'string', 'value' => '#101828']
        );

        Setting::updateOrCreate(
            ['key' => 'mail.brand.tagline'],
            ['type' => 'string', 'value' => 'Astrology guidance made simple']
        );

        Setting::updateOrCreate(
            ['key' => 'mail.brand.signature'],
            ['type' => 'text', 'value' => 'This email was sent automatically by the website system.']
        );

        $templates = [
            [
                'name' => 'OTP Code',
                'slug' => 'otp-code',
                'subject' => 'Your OTP code',
                'body_html' => '<p>Hello,</p><p>Use the one-time password below to continue with your account action.</p><p style="font-size:34px; letter-spacing:6px; font-weight:bold; text-align:center; background:#fff7e6; padding:16px; border-radius:12px;">{{code}}</p><p>This code expires in {{expires_minutes}} minutes.</p><p>If you did not request this code, you can ignore this email.</p>',
            ],
            [
                'name' => 'Client Enquiry Received',
                'slug' => 'enquiry-client',
                'subject' => 'We received your enquiry',
                'body_html' => '<p>Thanks for contacting {{site_name}}.</p><p>We have received your enquiry and our team will reply shortly.</p><p><strong>Subject:</strong> {{subject}}</p><p><strong>Your message:</strong></p><p>{{message}}</p>',
            ],
            [
                'name' => 'Admin Enquiry Received',
                'slug' => 'enquiry-admin',
                'subject' => 'New enquiry received',
                'body_html' => '<p><strong>New enquiry received.</strong></p>{{enquiry_details}}',
            ],
            [
                'name' => 'Registration Complete',
                'slug' => 'registration-complete',
                'subject' => 'Welcome to AstroDuniya',
                'body_html' => '<p>Your account has been created successfully.</p><p><strong>Name:</strong> {{name}}</p><p><strong>Email:</strong> {{email}}</p><p><strong>Mobile:</strong> {{mobile}}</p><p><a href="{{login_url}}">Log in to your account</a></p>',
            ],
        ];

        foreach ($templates as $template) {
            EmailTemplate::updateOrCreate(
                ['slug' => $template['slug']],
                [
                    'name' => $template['name'],
                    'subject' => $template['subject'],
                    'body_html' => $template['body_html'],
                    'is_active' => true,
                ]
            );
        }
    }
}
