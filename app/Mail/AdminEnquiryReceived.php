<?php

namespace App\Mail;

use App\Models\Enquiry;
use App\Services\EmailTemplateService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminEnquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Enquiry $enquiry)
    {
    }

    public function build()
    {
        $payload = app(EmailTemplateService::class)->compose(
            'enquiry-admin',
            ['enquiry' => $this->enquiry],
            'New enquiry received' . ($this->enquiry->source ? " ({$this->enquiry->source})" : ''),
            '<p><strong>New enquiry received.</strong></p>{{enquiry_details}}'
        );

        return $this
            ->subject($payload['subject'])
            ->view('mail.render')
            ->with($payload);
    }
}
