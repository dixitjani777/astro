<?php

namespace App\Mail;

use App\Models\Enquiry;
use App\Services\EmailTemplateService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientEnquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Enquiry $enquiry)
    {
    }

    public function build()
    {
        $payload = app(EmailTemplateService::class)->compose(
            'enquiry-client',
            [
                'name' => $this->enquiry->name,
                'email' => $this->enquiry->email,
                'subject' => $this->enquiry->subject,
                'message' => $this->enquiry->message,
            ],
            config('enquiries.client_reply_subject'),
            '<p>Thanks for contacting {{site_name}}.</p><p>We have received your enquiry and our team will reply shortly.</p><p><strong>Subject:</strong> {{subject}}</p><p><strong>Your message:</strong></p><p>{{message}}</p>'
        );

        return $this
            ->subject($payload['subject'])
            ->view('mail.render')
            ->with($payload);
    }
}
