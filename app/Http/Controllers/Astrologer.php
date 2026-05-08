<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Astrologer extends Controller
{
    public function book(){
        return view('frontend/astrologer/book');
    }

    public function call(){
        return view('frontend/astrologer/call');
    }
    
    public function videocall(){
        return view('frontend/astrologer/videocall');
    }
    
    public function meet(){
        return view('frontend/astrologer/meet');
    }

}
