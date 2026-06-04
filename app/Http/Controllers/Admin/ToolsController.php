<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class ToolsController extends Controller
{
    public function clearCache()
    {
        Cache::forget('settings.all');
        Artisan::call('cache:clear');

        return back()->with('status', 'Cache cleared.');
    }
}

