<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class EmailTemplatesSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(
            ['key' => 'mail.brand.logo'],
            ['type' => 'string', 'value' => 'images/logo.png']
        );

        Setting::updateOrCreate(
            ['key' => 'mail.brand.primary_color'],
            ['type' => 'string', 'value' => '#c89b3c']
        );

        Setting::updateOrCreate(
            ['key' => 'mail.brand.dark_color'],
            ['type' => 'string', 'value' => '#101828']
        );

        Setting::updateOrCreate(
            ['key' => 'mail.brand.tagline'],
            ['type' => 'string', 'value' => 'Astrology guidance made simple']
        );

        Setting::updateOrCreate(
            ['key' => 'mail.brand.signature'],
            ['type' => 'text', 'value' => 'This email was sent automatically by the website system.']
        );
    }
}
