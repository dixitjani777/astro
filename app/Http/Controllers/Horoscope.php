<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Horoscope extends Controller
{
    public function about(){
        return view('frontend/horoscope/about');
    }
    
    public function prediction(){
        return view('frontend/horoscope/prediction');
    }
    
    public function daily(){
        return view('frontend/horoscope/daily');
    }

    public function weekly(){
        return view('frontend/horoscope/weekly');
    }

    public function monthly(){
        return view('frontend/horoscope/monthly');
    }

    public function yearly(){
        return view('frontend/horoscope/yearly');
    }

    public function report(){
        return view('frontend/horoscope/report');
    }

    public function matching(){
        return view('frontend/horoscope/matching');
    }

}
