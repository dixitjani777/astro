<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoroscopeContent;
use Illuminate\Http\Request;

class HoroscopeContentsController extends Controller
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

    private const PERIODS = [
        'about',
        'prediction',
        'daily',
        'weekly',
        'monthly',
        'yearly',
        'report',
        'matching',
    ];

    public function index(Request $request)
    {
        $query = HoroscopeContent::query()->latest();

        if ($request->filled('period')) {
            $query->where('period', $request->string('period')->toString());
        }

        if ($request->filled('sign')) {
            $query->where('sign', $request->string('sign')->toString());
        }

        return view('admin.horoscope-contents.index', [
            'contents' => $query->paginate(25)->withQueryString(),
            'signs' => self::SIGNS,
            'periods' => self::PERIODS,
        ]);
    }

    public function create()
    {
        $defaults = [
            'period' => request()->string('period')->toString() ?: 'daily',
            'sign' => request()->string('sign')->toString() ?: null,
            'is_active' => true,
        ];

        return view('admin.horoscope-contents.form', [
            'content' => new HoroscopeContent($defaults),
            'signs' => self::SIGNS,
            'periods' => self::PERIODS,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        HoroscopeContent::create($data);

        return redirect()->route('admin.horoscope-contents.index')->with('status', 'Horoscope content created.');
    }

    public function edit(HoroscopeContent $horoscope_content)
    {
        return view('admin.horoscope-contents.form', [
            'content' => $horoscope_content,
            'signs' => self::SIGNS,
            'periods' => self::PERIODS,
        ]);
    }

    public function update(Request $request, HoroscopeContent $horoscope_content)
    {
        $data = $this->validated($request, $horoscope_content->id);
        $horoscope_content->update($data);

        return redirect()->route('admin.horoscope-contents.index')->with('status', 'Horoscope content updated.');
    }

    public function destroy(HoroscopeContent $horoscope_content)
    {
        $horoscope_content->delete();
        return redirect()->route('admin.horoscope-contents.index')->with('status', 'Horoscope content deleted.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $period = (string) $request->input('period', 'daily');
        $uniqueRule = 'unique:horoscope_contents,sign,NULL,id,period,' . $period;
        if ($ignoreId) {
            $uniqueRule = 'unique:horoscope_contents,sign,' . $ignoreId . ',id,period,' . $period;
        }

        $generalPeriods = ['about', 'report', 'matching'];
        $predictionPeriods = ['daily', 'weekly', 'monthly', 'yearly'];

        $allowedSignValues = self::SIGNS;
        if (in_array($period, $generalPeriods, true)) {
            $allowedSignValues = ['general'];
        } elseif ($period === 'prediction') {
            $allowedSignValues = $predictionPeriods;
        }

        $data = $request->validate([
            'period' => ['required', 'string', 'in:' . implode(',', self::PERIODS)],
            'sign' => ['required', 'string', 'in:' . implode(',', $allowedSignValues), $uniqueRule],
            'title' => ['nullable', 'string', 'max:200'],
            'health_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'occupation_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'wealth_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'family_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'love_life_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'love_text' => ['nullable', 'string', 'max:4000'],
            'career_text' => ['nullable', 'string', 'max:4000'],
            'health_text' => ['nullable', 'string', 'max:4000'],
            'money_text' => ['nullable', 'string', 'max:4000'],
            'content_html' => ['nullable', 'string', 'max:200000'],
            'meta_title' => ['nullable', 'string', 'max:200'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        return $data;
    }
}
