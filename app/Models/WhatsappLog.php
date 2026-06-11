<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'enquiry_id',
        'enquiry_reply_id',
        'recipient',
        'template_slug',
        'message_text',
        'status',
        'http_status',
        'request_payload',
        'response_payload',
        'sent_at',
    ];

    protected $casts = [
        'request_payload' => 'array',
        'response_payload' => 'array',
        'sent_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class);
    }

    public function enquiryReply()
    {
        return $this->belongsTo(EnquiryReply::class);
    }
}
