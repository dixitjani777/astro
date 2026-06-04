<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'source',
        'context',
        'page_url',
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'meta',
        'ip',
        'user_agent',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(EnquiryReply::class)->latest();
    }

    public function latestReply()
    {
        return $this->hasOne(EnquiryReply::class)->latestOfMany();
    }

    public function getRequestTypeLabelAttribute(): string
    {
        $source = strtolower((string) ($this->source ?? ''));
        $context = strtolower((string) ($this->context ?? ''));
        $subject = strtolower((string) ($this->subject ?? ''));

        return match (true) {
            $source === 'query' || str_contains($context, 'query') || str_contains($subject, 'query') => 'Astrology Query',
            $source === 'report' || str_contains($context, 'report') || str_contains($subject, 'report') => 'Horoscope Report',
            $source === 'astrologer' || str_contains($context, 'astrologer') || str_contains($subject, 'astrologer') => 'Astrologer Booking',
            $source === 'gemstone' || str_contains($context, 'gemstone') || str_contains($subject, 'gemstone') => 'Gemstone Recommendation',
            $source === 'pandit' || str_contains($context, 'pandit') || str_contains($subject, 'pandit') => 'Panditji Booking',
            $source === 'vastu' || str_contains($context, 'vastu') || str_contains($subject, 'vastu') => 'Vastu Consultation',
            $source === 'feedback' || str_contains($context, 'feedback') || str_contains($subject, 'feedback') => 'Feedback',
            $source === 'contact' || str_contains($context, 'contact') || str_contains($subject, 'contact') => 'Contact Us',
            $source === 'chatbot' || str_contains($context, 'chatbot') => 'Chatbot Request',
            default => $this->subject ?: ucfirst($this->source ?: 'Request'),
        };
    }

    public function getCurrentStatusLabelAttribute(): string
    {
        $latestReply = $this->relationLoaded('latestReply')
            ? $this->getRelation('latestReply')
            : $this->latestReply;

        if (!$latestReply) {
            return 'Received';
        }

        return match (strtolower((string) $latestReply->sender_type)) {
            'admin' => 'Answered',
            'user' => 'Awaiting Admin Response',
            default => ucfirst((string) $latestReply->sender_type),
        };
    }

    public function getLastUpdatedAtAttribute(): ?Carbon
    {
        $latestReply = $this->relationLoaded('latestReply')
            ? $this->getRelation('latestReply')
            : $this->latestReply;

        return $latestReply?->created_at ?? $this->updated_at ?? $this->created_at;
    }
}
