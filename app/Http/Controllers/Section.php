<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Section extends Controller
{
    /*public function teamwork(){
        return view('frontend/section/teamwork');
    }*/

    public function donate(){
        return view('frontend/section/donate');
    }

    public function contact(){
        return view('frontend/section/contact');
	}

    public function about(){
		return view('frontend/section/about');
	}

    public function blogs(){
        return view('frontend/section/blogs');
    }

    public function readblog(){
        return view('frontend/section/readblog');
    }

    public function teamactivity(){
        return view('frontend/section/teamactivity');
    }

    public function disclaimer(){
        return view('frontend/section/disclaimer');
    }

    public function feedback(){
        return view('frontend/section/feedback');
    }

    public function payment(){
        return view('frontend/section/payment');
    }

    public function privacy(){
        return view('frontend/section/privacy');
    }

    public function terms(){
        return view('frontend/section/terms');
    }
    
}

?>