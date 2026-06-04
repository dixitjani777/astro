<?php

namespace App\Mail;

use App\Models\Enquiry;
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
        return $this
            ->subject(config('enquiries.client_reply_subject'))
            ->view('mail.enquiries.client')
            ->with(['enquiry' => $this->enquiry]);
    }
}

