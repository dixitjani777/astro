<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Gemstone extends Controller
{
    public function about(){
        return view('frontend/gemstone/about');
    }
    
    public function recommendations(){
        return view('frontend/gemstone/recommendations');
    }
    
    public function buy(){
        return view('frontend/gemstone/buy');
    }

    public function purchase(){
        return view('frontend/gemstone/purchase');
    }

}
