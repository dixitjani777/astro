<?php

namespace App\Support;

use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;

class FrontendTheme
{
    public const CURRENT = 'current';
    public const LIGHT = 'light';

    public function active(): string
    {
        if (!Schema::hasTable('settings')) {
            return self::CURRENT;
        }

        $theme = (string) Setting::plainValue('site.frontend_theme', self::CURRENT);

        return in_array($theme, [self::CURRENT, self::LIGHT], true) ? $theme : self::CURRENT;
    }

    public function view(string $lightView, string $currentView, array $data = []): View
    {
        if ($this->active() === self::LIGHT && view()->exists($lightView)) {
            return view($lightView, $data);
        }

        return view($currentView, $data);
    }
}
