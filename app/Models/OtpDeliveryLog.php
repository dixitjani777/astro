<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpDeliveryLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'purpose',
        'channel',
        'recipient',
        'template_slug',
        'status',
        'message_text',
        'request_payload',
        'response_payload',
        'error_message',
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
}
