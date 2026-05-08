<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Account extends Controller
{
    public function index(){
    	return view('frontend/account/login_register');
	}

	public function forgotpassword(){
    	return view('frontend/account/forgot_password');
	}

	public function loginwithotp(){
    	return view('frontend/account/otp_login');
	}

    public function querystatus(){
    	return view('frontend/account/querystatus');
	}

	public function report(){
    	return view('frontend/account/report');
	}

	public function astrologerbooking(){
    	return view('frontend/account/bookastrostatus');
	}

	public function gemstonesuggestion(){
    	return view('frontend/account/gemsuggestion');
	}

	public function bookpanditJi(){
    	return view('frontend/account/panditjistatus');
	}

	public function vastu_specific(){
    	return view('frontend/account/vastu_specific');
	}

	public function orders(){
    	return view('frontend/account/orders');
	}

	public function setting(){
    	return view('frontend/account/account_settings');
	}

}
