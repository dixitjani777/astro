<?php

namespace App\Mail;

use App\Services\EmailTemplateService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $code)
    {
    }

    public function build()
    {
        $payload = app(EmailTemplateService::class)->compose(
            'otp-code',
            [
                'code' => $this->code,
                'expires_seconds' => 180,
            ],
            'Your OTP code',
            '<p>Use the one-time password below to continue.</p><p style="font-size:32px; letter-spacing:6px; font-weight:bold; text-align:center; background:#fff7e6; padding:16px; border-radius:12px;">{{code}}</p><p>This code expires in {{expires_minutes}} minutes.</p>'
        );

        return $this
            ->subject($payload['subject'])
            ->view('mail.render')
            ->with($payload);
    }
}
