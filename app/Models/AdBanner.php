<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdBanner extends Model
{
    protected $fillable = [
        'title',
        'placement',
        'content_type',
        'image_path',
        'link_url',
        'embed_html',
        'youtube_url',
        'is_active',
        'sort_order',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function getYoutubeEmbedSrcAttribute(): ?string
    {
        $id = $this->extractYoutubeId((string) $this->youtube_url);
        return $id ? "https://www.youtube.com/embed/{$id}" : null;
    }

    private function extractYoutubeId(string $url): ?string
    {
        $url = trim($url);
        if ($url === '') {
            return null;
        }

        // https://youtu.be/<id>
        if (preg_match('~youtu\.be/([A-Za-z0-9_-]{6,})~', $url, $m)) {
            return $m[1];
        }

        // https://www.youtube.com/watch?v=<id>
        $parts = parse_url($url);
        if (!is_array($parts)) {
            return null;
        }

        $host = strtolower((string) ($parts['host'] ?? ''));
        if (!str_contains($host, 'youtube.com')) {
            return null;
        }

        parse_str((string) ($parts['query'] ?? ''), $q);
        if (!empty($q['v']) && is_string($q['v'])) {
            return preg_replace('~[^A-Za-z0-9_-]~', '', $q['v']) ?: null;
        }

        // https://www.youtube.com/embed/<id>
        if (!empty($parts['path']) && preg_match('~/embed/([A-Za-z0-9_-]{6,})~', (string) $parts['path'], $m)) {
            return $m[1];
        }

        return null;
    }
}
