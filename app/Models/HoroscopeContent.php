<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoroscopeContent extends Model
{
    protected $fillable = [
        'period',
        'sign',
        'title',
        'health_percent',
        'occupation_percent',
        'wealth_percent',
        'family_percent',
        'love_life_percent',
        'love_text',
        'career_text',
        'health_text',
        'money_text',
        'content_html',
        'meta_title',
        'meta_description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'health_percent' => 'integer',
        'occupation_percent' => 'integer',
        'wealth_percent' => 'integer',
        'family_percent' => 'integer',
        'love_life_percent' => 'integer',
    ];
}
