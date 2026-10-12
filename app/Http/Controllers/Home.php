<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\DailyHoroscope;
use App\Models\HomeService;
use App\Models\HomeSlider;
use Illuminate\Support\Facades\Cache;
use App\Support\FrontendTheme;

class Home extends Controller
{
    public function index(){
        $timezone = (string) env('HOROSCOPE_TIMEZONE', 'Asia/Kolkata');
        $forDate = Carbon::now($timezone)->toDateString();

        $dailyPreview = DailyHoroscope::query()
            ->where('sign', 'aries')
            ->whereDate('for_date', $forDate)
            ->first();

        $data = [
            'dailyPreview' => $dailyPreview,
            'dailyPreviewDate' => Carbon::parse($forDate, $timezone),
            'homeSlides' => Cache::remember('frontend.home_sliders.active', 300, function () {
                $now = now();

                return HomeSlider::query()
                    ->where('is_active', true)
                    ->where(function ($q) use ($now) {
                        $q->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
                    })
                    ->where(function ($q) use ($now) {
                        $q->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
                    })
                    ->orderBy('sort_order')
                    ->orderByDesc('id')
                    ->get();
            }),
            'homeServices' => HomeService::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('title')
                ->get(),
        ];

        return app(FrontendTheme::class)->view(
            'frontend.themes.light.home',
            'frontend.home',
            $data
        );
	}
}
