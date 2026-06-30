<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PanditService extends Model
{
    protected $fillable = [
        'title',
        'category',
        'short_text',
        'benefits',
        'details_html',
        'image_path',
        'link_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];
}
