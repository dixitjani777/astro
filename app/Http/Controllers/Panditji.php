<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Panditji extends Controller
{
    public function book(){
    	return view('frontend/panditji/book');
	}

	public function services(){
    	return view('frontend/panditji/services');
	}

	public function puja_services(){
    	return view('frontend/panditji/puja_services');
	}

	public function havan_services(){
    	return view('frontend/panditji/havan_services');
	}

	public function jaap(){
    	return view('frontend/panditji/jaap');
	}

	public function katha(){
    	return view('frontend/panditji/katha');
	}

	public function pujas(){
    	return view('frontend/panditji/pujas');
	}
}
