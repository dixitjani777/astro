<?php

namespace App\Mail;

use App\Models\Enquiry;
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
        return $this
            ->subject('New enquiry received' . ($this->enquiry->source ? " ({$this->enquiry->source})" : ''))
            ->view('mail.enquiries.admin')
            ->with(['enquiry' => $this->enquiry]);
    }
}

