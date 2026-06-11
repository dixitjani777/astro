<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EnquiryReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'enquiry_id',
        'sender_type',
        'sender_user_id',
        'body',
        'payment_url',
        'attachment_disk',
        'attachment_path',
        'attachment_original_name',
        'attachment_mime',
        'attachment_size',
    ];

    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class);
    }

    public function senderUser()
    {
        return $this->belongsTo(User::class, 'sender_user_id');
    }

    public function getAttachmentUrlAttribute(): ?string
    {
        if (!$this->attachment_path) {
            return null;
        }

        return Storage::disk($this->attachment_disk ?: 'public')->url($this->attachment_path);
    }

    public function getAttachmentIsImageAttribute(): bool
    {
        return str_starts_with((string) ($this->attachment_mime ?? ''), 'image/');
    }
}
