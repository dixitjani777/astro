<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DailyHoroscope;
use App\Models\HoroscopeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DailyHoroscopesController extends Controller
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

    public function index(Request $request)
    {
        $timezone = (string) env('HOROSCOPE_TIMEZONE', 'Asia/Kolkata');
        $defaultDate = Carbon::now($timezone)->toDateString();

        $date = $request->filled('date')
            ? Carbon::parse($request->string('date')->toString(), $timezone)->toDateString()
            : $defaultDate;

        $query = DailyHoroscope::query()
            ->whereDate('for_date', $date)
            ->orderBy('sign');

        if ($request->filled('sign')) {
            $query->where('sign', $request->string('sign')->toString());
        }

        return view('admin.daily-horoscopes.index', [
            'entries' => $query->paginate(25)->withQueryString(),
            'signs' => self::SIGNS,
            'date' => $date,
        ]);
    }

    public function edit(DailyHoroscope $daily_horoscope)
    {
        $section = HoroscopeContent::query()
            ->where('period', 'daily')
            ->where('sign', $daily_horoscope->sign)
            ->first();

        return view('admin.daily-horoscopes.form', [
            'entry' => $daily_horoscope,
            'signs' => self::SIGNS,
            'section' => $section,
        ]);
    }

    public function update(Request $request, DailyHoroscope $daily_horoscope)
    {
        $data = $request->validate([
            'admin_description' => ['nullable', 'string', 'max:10000'],
        ]);

        $daily_horoscope->admin_description = $data['admin_description'] ?: null;
        $daily_horoscope->admin_updated_at = $daily_horoscope->admin_description ? now() : null;
        $daily_horoscope->save();

        return redirect()
            ->route('admin.daily-horoscopes.index', [
                'date' => $daily_horoscope->for_date->toDateString(),
                'sign' => $daily_horoscope->sign,
            ])
            ->with('status', 'Daily horoscope updated.');
    }
}
