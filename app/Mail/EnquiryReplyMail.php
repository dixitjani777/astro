<?php

namespace App\Mail;

use App\Models\Enquiry;
use App\Models\EnquiryReply;
use App\Services\EmailTemplateService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Enquiry $enquiry,
        public EnquiryReply $reply
    ) {
    }

    public function build()
    {
        $payload = app(EmailTemplateService::class)->compose(
            'enquiry-reply',
            [
                'name' => $this->enquiry->name ?: optional($this->enquiry->user)->name,
                'email' => $this->enquiry->email ?: optional($this->enquiry->user)->email,
                'mobile' => $this->enquiry->phone ?: optional($this->enquiry->user)->mobile,
                'subject' => $this->enquiry->subject ?: $this->enquiry->request_type_label,
                'message' => $this->reply->body ?: ($this->reply->payment_url ?: ''),
                'reply_body' => $this->reply->body ?: '',
                'attachment_url' => $this->reply->attachment_url ?: '',
                'payment_url' => $this->reply->payment_url ?: '',
                'login_url' => url('/myaccount/querystatus'),
            ],
            'We have a reply for your enquiry',
            '<p>Hello {{name}},</p><p>We have replied to your enquiry.</p><p><strong>Subject:</strong> {{subject}}</p><p>{{reply_body}}</p><p><a href="{{login_url}}">View your account</a></p>'
        );

        return $this
            ->subject($payload['subject'])
            ->view('mail.render')
            ->with($payload);
    }
}
