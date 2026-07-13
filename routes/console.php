<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Carbon;
use App\Models\DailyHoroscope;
use App\Models\HoroscopeContent;
use App\Services\HoroscopeAiClient;
use App\Services\HoroscopeApiClient;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('horoscope:fetch-daily {--date= : YYYY-MM-DD (optional, default today)}', function () {
    $timezone = (string) env('HOROSCOPE_TIMEZONE', 'Asia/Kolkata');

    $forDate = $this->option('date')
        ? Carbon::parse((string) $this->option('date'), $timezone)->toDateString()
        : Carbon::now($timezone)->toDateString();

    $signs = [
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

    /** @var HoroscopeApiClient $client */
    $client = app(HoroscopeApiClient::class);

    $ok = 0;
    $failed = 0;

    foreach ($signs as $sign) {
        try {
            $payload = $client->fetchDaily($sign);

            DailyHoroscope::updateOrCreate(
                ['sign' => $sign, 'for_date' => $forDate],
                [
                    'description' => $payload['description'] ?? null,
                    'source' => 'freehoroscopeapi',
                    'raw' => $payload['raw'] ?? null,
                    'fetched_at' => Carbon::now($timezone),
                ]
            );

            $ok++;
            $this->info("OK: {$sign}");
        } catch (\Throwable $e) {
            $failed++;
            $this->error("FAILED: {$sign} ({$e->getMessage()})");
        }
    }

    $this->line("Done for {$forDate} (tz: {$timezone}). OK={$ok}, FAILED={$failed}");
})->purpose('Fetch and store daily horoscopes (all 12 signs) into database');

Artisan::command('horoscope:sync-periods {--periods=* : Optional list of periods to sync (weekly, monthly, yearly)}', function () {
    $timezone = (string) env('HOROSCOPE_TIMEZONE', 'Asia/Kolkata');
    $periods = $this->option('periods');
    $periods = is_array($periods) ? array_values(array_filter(array_map('strtolower', $periods))) : [];
    if (empty($periods)) {
        $periods = ['weekly', 'monthly', 'yearly'];
    }

    $allowedPeriods = ['weekly', 'monthly', 'yearly'];
    $signs = [
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

    /** @var HoroscopeAiClient $aiClient */
    $aiClient = app(HoroscopeAiClient::class);
    /** @var HoroscopeApiClient $client */
    $client = app(HoroscopeApiClient::class);

    foreach ($periods as $period) {
        if (! in_array($period, $allowedPeriods, true)) {
            $this->warn("Skipping unsupported period: {$period}");
            continue;
        }

        $ok = 0;
        $failed = 0;

        foreach ($signs as $sign) {
            try {
                $payload = $aiClient->generate($period, $sign, ucfirst($sign));
                if (empty($payload['content_html']) && empty($payload['love_text']) && empty($payload['career_text']) && empty($payload['health_text']) && empty($payload['money_text'])) {
                    $payload = $client->fetchPeriod($period, $sign);
                    if (empty($payload['description'])) {
                        throw new \RuntimeException('Empty horoscope response from AI and API.');
                    }

                    $desc = trim((string) $payload['description']);
                    $payload = [
                        'title' => ucfirst($sign) . ' ' . ucfirst($period) . ' Horoscope',
                        'meta_title' => ucfirst($sign) . ' ' . ucfirst($period) . ' Horoscope',
                        'meta_description' => null,
                        'content_html' => '<p>' . e($desc) . '</p>',
                        'love_text' => $desc,
                        'career_text' => null,
                        'health_text' => null,
                        'money_text' => null,
                        'health_percent' => null,
                        'occupation_percent' => null,
                        'wealth_percent' => null,
                        'family_percent' => null,
                        'love_life_percent' => null,
                        'source' => 'free-api-fallback',
                        'raw' => $payload['raw'] ?? null,
                    ];
                }

                HoroscopeContent::updateOrCreate(
                    ['period' => $period, 'sign' => $sign],
                    [
                        'title' => $payload['title'] ?? ucfirst($sign) . ' ' . ucfirst($period) . ' Horoscope',
                        'health_percent' => $payload['health_percent'] ?? null,
                        'occupation_percent' => $payload['occupation_percent'] ?? null,
                        'wealth_percent' => $payload['wealth_percent'] ?? null,
                        'family_percent' => $payload['family_percent'] ?? null,
                        'love_life_percent' => $payload['love_life_percent'] ?? null,
                        'love_text' => $payload['love_text'] ?? null,
                        'career_text' => $payload['career_text'] ?? null,
                        'health_text' => $payload['health_text'] ?? null,
                        'money_text' => $payload['money_text'] ?? null,
                        'content_html' => $payload['content_html'] ?? null,
                        'meta_title' => $payload['meta_title'] ?? null,
                        'meta_description' => $payload['meta_description'] ?? null,
                        'is_active' => true,
                    ]
                );

                $ok++;
                $this->info("{$period}: OK {$sign}");
            } catch (\Throwable $e) {
                $failed++;
                $this->error("{$period}: FAILED {$sign} ({$e->getMessage()})");
            }
        }

        $this->line("Done {$period} (tz: {$timezone}). OK={$ok}, FAILED={$failed}");
    }
})->purpose('Fetch and store weekly/monthly/yearly horoscopes into horoscope contents');

app()->booted(function () {
    /** @var Schedule $schedule */
    $schedule = app(Schedule::class);

    $timezone = (string) env('HOROSCOPE_TIMEZONE', 'Asia/Kolkata');
    $time = (string) env('HOROSCOPE_FETCH_TIME', '06:15');

    $schedule->command('horoscope:fetch-daily')
        ->dailyAt($time)
        ->timezone($timezone)
        ->onOneServer()
        ->withoutOverlapping(30);

    $schedule->command('horoscope:sync-periods')
        ->dailyAt('06:30')
        ->timezone($timezone)
        ->onOneServer()
        ->withoutOverlapping(45);
});
