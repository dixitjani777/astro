<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Astrology extends Controller
{
    public function about(){
        return view('frontend/astrology/about');
    }

    public function planets(){
        return view('frontend/astrology/planets');
    }

    public function signs(){
        return view('frontend/astrology/signs');
    }

    public function houses(){
        return view('frontend/astrology/houses');
    }

}
