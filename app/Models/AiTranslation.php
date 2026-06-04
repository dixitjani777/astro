<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiTranslation extends Model
{
    protected $fillable = [
        'source_locale',
        'target_locale',
        'source_text',
        'translated_text',
        'hash',
    ];
}

