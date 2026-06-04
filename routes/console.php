<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Carbon;
use App\Models\DailyHoroscope;
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
});
