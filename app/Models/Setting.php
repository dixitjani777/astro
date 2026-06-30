<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    public static function plainValue(string $key, mixed $default = null): mixed
    {
        if (!Schema::hasTable('settings')) {
            return $default;
        }

        return cache()->remember("setting.value.{$key}", 3600, function () use ($key, $default) {
            $setting = static::query()->where('key', $key)->first();

            return $setting?->value ?? $default;
        });
    }
}
