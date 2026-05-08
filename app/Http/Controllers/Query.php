<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Query extends Controller
{
    public function index(){
        return view('frontend/query/query');
    }

}
