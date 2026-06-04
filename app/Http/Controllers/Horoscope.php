<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\DailyHoroscope;
use App\Models\HoroscopeContent;
use App\Services\HoroscopeApiClient;

class Horoscope extends Controller
{
    private const VALID_SIGNS = [
        'aries' => 'Aries',
        'taurus' => 'Taurus',
        'gemini' => 'Gemini',
        'cancer' => 'Cancer',
        'leo' => 'Leo',
        'virgo' => 'Virgo',
        'libra' => 'Libra',
        'scorpio' => 'Scorpio',
        'sagittarius' => 'Sagittarius',
        'capricorn' => 'Capricorn',
        'aquarius' => 'Aquarius',
        'pisces' => 'Pisces',
    ];

    public function about(){
        return view('frontend/horoscope/about', [
            'cms' => $this->cms('about', 'general'),
        ]);
    }
    
    public function prediction(){
        $period = strtolower((string) request()->segment(3));
        $allowed = ['daily', 'weekly', 'monthly', 'yearly'];
        if (!in_array($period, $allowed, true)) {
            abort(404);
        }

        return view('frontend/horoscope/prediction', [
            'cms' => $this->cms('prediction', $period),
        ]);
    }
    
    public function daily(){
        $sign = strtolower((string) request()->segment(3));
        if (! array_key_exists($sign, self::VALID_SIGNS)) {
            abort(404);
        }

        $timezone = (string) env('HOROSCOPE_TIMEZONE', 'Asia/Kolkata');
        $forDate = Carbon::now($timezone)->toDateString();

        $horoscope = DailyHoroscope::query()
            ->where('sign', $sign)
            ->whereDate('for_date', $forDate)
            ->first();

        $pageContent = HoroscopeContent::query()
            ->where('period', 'daily')
            ->where('sign', $sign)
            ->where('is_active', true)
            ->first();

        if (! $horoscope) {
            try {
                /** @var HoroscopeApiClient $client */
                $client = app(HoroscopeApiClient::class);
                $payload = $client->fetchDaily($sign);

                $horoscope = DailyHoroscope::updateOrCreate(
                    ['sign' => $sign, 'for_date' => $forDate],
                    [
                        'description' => $payload['description'] ?? null,
                        'source' => 'freehoroscopeapi',
                        'raw' => $payload['raw'] ?? null,
                        'fetched_at' => Carbon::now($timezone),
                    ]
                );
            } catch (\Throwable $e) {
                $horoscope = null;
            }
        }

        return view('frontend/horoscope/daily', [
            'sign' => $sign,
            'signLabel' => self::VALID_SIGNS[$sign],
            'forDate' => Carbon::parse($forDate, $timezone),
            'horoscope' => $horoscope,
            'pageContent' => $pageContent,
            'timezone' => $timezone,
        ]);
    }

    public function weekly(){
        return $this->renderPeriodSignPage('weekly');
    }

    public function monthly(){
        return $this->renderPeriodSignPage('monthly');
    }

    public function yearly(){
        return $this->renderPeriodSignPage('yearly');
    }

    public function report(){
        return view('frontend/horoscope/report', [
            'cms' => $this->cms('report', 'general'),
        ]);
    }

    public function matching(){
        return view('frontend/horoscope/matching', [
            'cms' => $this->cms('matching', 'general'),
        ]);
    }

    private function renderPeriodSignPage(string $period)
    {
        $sign = strtolower((string) request()->segment(3));
        if (! array_key_exists($sign, self::VALID_SIGNS)) {
            abort(404);
        }

        return view("frontend/horoscope/{$period}", [
            'sign' => $sign,
            'signLabel' => self::VALID_SIGNS[$sign],
            'cms' => $this->cms($period, $sign),
        ]);
    }

    private function cms(string $period, string $sign): ?HoroscopeContent
    {
        return HoroscopeContent::query()
            ->where('period', $period)
            ->where('sign', $sign)
            ->where('is_active', true)
            ->first();
    }
}
