<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyHoroscope extends Model
{
    protected $fillable = [
        'sign',
        'for_date',
        'description',
        'admin_description',
        'admin_updated_at',
        'lucky_number',
        'lucky_color',
        'mood',
        'compatibility',
        'lucky_time',
        'date_range',
        'source',
        'raw',
        'fetched_at',
    ];

    protected $casts = [
        'for_date' => 'date',
        'raw' => 'array',
        'fetched_at' => 'datetime',
        'admin_updated_at' => 'datetime',
    ];
}
