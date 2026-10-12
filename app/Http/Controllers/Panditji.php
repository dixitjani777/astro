<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PanditService;
use App\Support\FrontendTheme;

class Panditji extends Controller
{
    public function book(){
	    	return view('frontend.panditji.book');
	}

	public function services(){
	    	return app(FrontendTheme::class)->view('frontend.themes.light.services.index', 'frontend/panditji/services', [
	            'pageTitle' => 'Panditji Services',
            'panditServices' => PanditService::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('title')
                ->get(),
        ]);
	}

	public function puja_services(){
	    	return app(FrontendTheme::class)->view('frontend.themes.light.services.index', 'frontend/panditji/puja_services', ['pageTitle' => 'Puja Services']);
	}

	public function havan_services(){
	    	return app(FrontendTheme::class)->view('frontend.themes.light.services.index', 'frontend/panditji/havan_services', ['pageTitle' => 'Havan Services']);
	}

	public function jaap(){
	    	return app(FrontendTheme::class)->view('frontend.themes.light.services.index', 'frontend/panditji/jaap', ['pageTitle' => 'Jaap']);
	}

	public function katha(){
	    	return app(FrontendTheme::class)->view('frontend.themes.light.services.index', 'frontend/panditji/katha', ['pageTitle' => 'Katha']);
	}

	public function pujas(){
	    	return app(FrontendTheme::class)->view('frontend.themes.light.services.index', 'frontend/panditji/pujas', ['pageTitle' => 'Pujas']);
	}
}
