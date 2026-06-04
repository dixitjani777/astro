<?php

namespace Database\Seeders;

use App\Models\HoroscopeContent;
use Illuminate\Database\Seeder;

class HoroscopeCmsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            [
                'period' => 'about',
                'sign' => 'general',
                'title' => 'About Horoscope',
                'meta_title' => 'About Horoscope : What is Horoscope - Astroduniya',
                'meta_description' => 'Learn what horoscope is and how zodiac signs influence predictions.',
                'content_html' => '<p>Horoscope is the prediction of your zodiac sign. You can manage this content from Admin → Horoscope Content.</p>',
            ],
            [
                'period' => 'report',
                'sign' => 'general',
                'title' => 'Horoscope Report',
                'meta_title' => 'Horoscope Report : Janam patrika : Kundali - Astroduniya',
                'meta_description' => 'Get your horoscope report and analyze your past, present and future.',
                'content_html' => '<p>Manage this intro content from Admin → Horoscope Content (period: report, sign: general).</p>',
            ],
            [
                'period' => 'matching',
                'sign' => 'general',
                'title' => 'Horoscope Matching',
                'meta_title' => 'Horoscope Matching : Love compatibility - Astroduniya',
                'meta_description' => 'Get your horoscope matching report with highest accuracy result.',
                'content_html' => '<p>Manage this intro content from Admin → Horoscope Content (period: matching, sign: general).</p>',
            ],
            [
                'period' => 'prediction',
                'sign' => 'daily',
                'title' => 'Daily Horoscope',
                'meta_title' => 'Daily Horoscope : Predictions for All Zodiac - Astroduniya',
                'meta_description' => 'Choose your zodiac sign to read today\'s horoscope.',
                'content_html' => '<p>Choose your zodiac sign to see the daily horoscope.</p>',
            ],
            [
                'period' => 'prediction',
                'sign' => 'weekly',
                'title' => 'Weekly Horoscope',
                'meta_title' => 'Weekly Horoscope : Predictions for All Zodiac - Astroduniya',
                'meta_description' => 'Choose your zodiac sign to read the weekly horoscope.',
                'content_html' => '<p>Choose your zodiac sign to see the weekly horoscope.</p>',
            ],
            [
                'period' => 'prediction',
                'sign' => 'monthly',
                'title' => 'Monthly Horoscope',
                'meta_title' => 'Monthly Horoscope : Predictions for All Zodiac - Astroduniya',
                'meta_description' => 'Choose your zodiac sign to read the monthly horoscope.',
                'content_html' => '<p>Choose your zodiac sign to see the monthly horoscope.</p>',
            ],
            [
                'period' => 'prediction',
                'sign' => 'yearly',
                'title' => 'Yearly Horoscope',
                'meta_title' => 'Yearly Horoscope : Predictions for All Zodiac - Astroduniya',
                'meta_description' => 'Choose your zodiac sign to read the yearly horoscope.',
                'content_html' => '<p>Choose your zodiac sign to see the yearly horoscope.</p>',
            ],
        ];

        foreach ($defaults as $row) {
            HoroscopeContent::updateOrCreate(
                ['period' => $row['period'], 'sign' => $row['sign']],
                [
                    'title' => $row['title'] ?? null,
                    'meta_title' => $row['meta_title'] ?? null,
                    'meta_description' => $row['meta_description'] ?? null,
                    'content_html' => $row['content_html'] ?? null,
                    'is_active' => true,
                ]
            );
        }
    }
}

