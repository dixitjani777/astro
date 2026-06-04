<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PanditService;

class Panditji extends Controller
{
    public function book(){
    	return view('frontend/panditji/book');
	}

	public function services(){
    	return view('frontend/panditji/services', [
            'panditServices' => PanditService::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('title')
                ->get(),
        ]);
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
