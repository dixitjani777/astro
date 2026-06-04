<?php

namespace Database\Seeders;

use App\Models\HoroscopeContent;
use Illuminate\Database\Seeder;

class HoroscopePeriodSignsSeeder extends Seeder
{
    private const SIGNS = [
        'aries',
        'taurus',
        'gemini',
        'cancer',
        'leo',
        'virgo',
        'libra',
        'scorpio',
        'sagittarius',
        'capricorn',
        'aquarius',
        'pisces',
    ];

    private const PERIODS = ['weekly', 'monthly', 'yearly'];

    public function run(): void
    {
        foreach (self::PERIODS as $period) {
            foreach (self::SIGNS as $sign) {
                HoroscopeContent::updateOrCreate(
                    ['period' => $period, 'sign' => $sign],
                    [
                        'is_active' => true,
                        'health_percent' => 75,
                        'occupation_percent' => 70,
                        'wealth_percent' => 72,
                        'family_percent' => 78,
                        'love_life_percent' => 74,
                        'love_text' => ucfirst($period) . " love outlook for {$sign}. Update from Admin → Horoscope Content.",
                        'career_text' => ucfirst($period) . " career outlook for {$sign}.",
                        'health_text' => ucfirst($period) . " health outlook for {$sign}.",
                        'money_text' => ucfirst($period) . " money outlook for {$sign}.",
                        'content_html' => null,
                        'title' => ucfirst($sign) . ' ' . ucfirst($period) . ' Horoscope',
                        'meta_title' => null,
                        'meta_description' => null,
                    ]
                );
            }
        }
    }
}

