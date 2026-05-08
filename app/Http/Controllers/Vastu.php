<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vastu extends Controller
{
    public function index(){
    	return view('frontend/vastu/vastu');
	}
}
