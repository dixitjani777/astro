<?php

namespace App\Mail;

use App\Models\User;
use App\Services\EmailTemplateService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationCompletedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public User $user)
    {
    }

    public function build()
    {
        $payload = app(EmailTemplateService::class)->compose(
            'registration-complete',
            [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'mobile' => $this->user->mobile,
                'login_url' => url('/account'),
            ],
            'Welcome to ' . config('app.name'),
            '<p>Your account has been created successfully.</p><p><strong>Name:</strong> {{name}}</p><p><strong>Email:</strong> {{email}}</p><p><strong>Mobile:</strong> {{mobile}}</p><p><a href="{{login_url}}">Log in to your account</a></p>'
        );

        return $this
            ->subject($payload['subject'])
            ->view('mail.render')
            ->with($payload);
    }
}
