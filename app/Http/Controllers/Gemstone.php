<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\FrontendTheme;

class Gemstone extends Controller
{
    public function about(){
        return view('frontend.gemstone.about');
    }
    
    public function recommendations(){
        return view('frontend.gemstone.recommendations');
    }
    
    public function buy(){
        return view('frontend.gemstone.buy');
    }

    public function purchase(){
        $gemstone = (string) request()->segment(3);
        return app(FrontendTheme::class)->view('frontend.themes.light.shop.index', 'frontend/gemstone/purchase', [
            'pageTitle' => 'Gemstone Purchase',
            'gemstone' => $gemstone,
        ]);
    }

}
