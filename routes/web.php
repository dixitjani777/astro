<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account;
use App\Http\Controllers\Astrologer;
use App\Http\Controllers\Astrology;
use App\Http\Controllers\Gemstone;
use App\Http\Controllers\Home;
use App\Http\Controllers\Horoscope;
use App\Http\Controllers\Panditji;
use App\Http\Controllers\Query;
use App\Http\Controllers\Section;
use App\Http\Controllers\Vastu;


// Route::get('/', function () {
//     return view('welcome');
// });

/* home */
//Route::get('/','Home@index');
Route::get('/', [Home::class, 'index']);

/* query */
Route::get('/query',[Query::class,'index']);

/* account */
Route::get('/account',[Account::class,'index']);
Route::get('/account/resetpassword',[Account::class,'forgotpassword']);
Route::get('/account/loginwithotp',[Account::class,'loginwithotp']);

/* My account */
Route::get('/myaccount/querystatus',[Account::class,'querystatus']);
Route::get('/myaccount/report',[Account::class,'report']);
Route::get('/myaccount/astrologerbooking',[Account::class,'astrologerbooking']);
Route::get('/myaccount/gemstonesuggestion',[Account::class,'gemstonesuggestion']);
Route::get('/myaccount/bookpanditJi',[Account::class,'bookpanditJi']);
Route::get('/myaccount/vastu-specific',[Account::class,'vastu_specific']);
Route::get('/myaccount/orders',[Account::class,'orders']);
Route::get('/myaccount/setting',[Account::class,'setting']);

/* astrology */
Route::get('/astrology/about',[Astrology::class,'about']);
Route::get('/astrology/planets',[Astrology::class,'planets']);
Route::get('/astrology/signs',[Astrology::class,'signs']);
Route::get('/astrology/houses',[Astrology::class,'houses']);

/* horoscope */
Route::get('/horoscope/about',[Horoscope::class,'about']);
Route::get('/horoscope/prediction/daily',[Horoscope::class,'prediction']);
Route::get('/horoscope/prediction/weekly',[Horoscope::class,'prediction']);
Route::get('/horoscope/prediction/monthly',[Horoscope::class,'prediction']);
Route::get('/horoscope/prediction/yearly',[Horoscope::class,'prediction']);

Route::get('/horoscope/daily/aries',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/taurus',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/gemini',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/cancer',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/leo',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/virgo',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/libra',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/scorpio',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/sagittarius',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/capricorn',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/aquarius',[Horoscope::class,'daily']);
Route::get('/horoscope/daily/pisces',[Horoscope::class,'daily']);

Route::get('/horoscope/weekly/aries',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/taurus',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/gemini',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/cancer',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/leo',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/virgo',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/libra',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/scorpio',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/sagittarius',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/capricorn',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/aquarius',[Horoscope::class,'weekly']);
Route::get('/horoscope/weekly/pisces',[Horoscope::class,'weekly']);

Route::get('/horoscope/monthly/aries',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/taurus',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/gemini',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/cancer',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/leo',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/virgo',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/libra',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/scorpio',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/sagittarius',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/capricorn',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/aquarius',[Horoscope::class,'monthly']);
Route::get('/horoscope/monthly/pisces',[Horoscope::class,'monthly']);

Route::get('/horoscope/yearly/aries',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/taurus',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/gemini',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/cancer',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/leo',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/virgo',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/libra',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/scorpio',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/sagittarius',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/capricorn',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/aquarius',[Horoscope::class,'yearly']);
Route::get('/horoscope/yearly/pisces',[Horoscope::class,'yearly']);

Route::get('/horoscope/report',[Horoscope::class,'report']);
Route::get('/horoscope/matching',[Horoscope::class,'matching']);

/* astrologer */

Route::get('/astrologer/book',[Astrologer::class,'book']);

// Route::get('/astrologer/call',[Astrologer::class,'call']);
// Route::get('/astrologer/videocall',[Astrologer::class,'videocall']);
// Route::get('/astrologer/meet',[Astrologer::class,'meet']);

/* gemstone */
Route::get('/gemstone/about',[Gemstone::class,'about']);
Route::get('/gemstone/recommendations',[Gemstone::class,'recommendations']);
Route::get('/gemstone/buy',[Gemstone::class,'buy']);

Route::get('/gemstone/purchase/blue_sapphire',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/ruby',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/emerald',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/pearl',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/red_coral',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/yellow_sapphire',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/diamond',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/hessonite',[Gemstone::class,'purchase']);
Route::get('/gemstone/purchase/cats_eye',[Gemstone::class,'purchase']);

/* panditji */
Route::get('/panditji/book',[Panditji::class,'book']);
Route::get('/panditji/services',[Panditji::class,'services']);
Route::get('/panditji/puja-services',[Panditji::class,'puja_services']);
Route::get('/panditji/havan-services',[Panditji::class,'havan_services']);
Route::get('/panditji/jaap',[Panditji::class,'jaap']);
Route::get('/panditji/katha',[Panditji::class,'katha']);

Route::get('/panditji/pujas',[Panditji::class,'pujas']);

/* vastu */
Route::get('/vastu',[Vastu::class,'index']);

/* section */
Route::get('/teamwork',[Section::class,'teamwork']);
Route::get('/donate',[Section::class,'donate']);
Route::get('/contact',[Section::class,'contact']);
Route::get('/about',[Section::class,'about']);
Route::get('/blogs',[Section::class,'blogs']);
Route::get('/readblog/birth-month-influence/1',[Section::class,'readblog']);
Route::get('/teamactivity',[Section::class,'teamactivity']);
Route::get('/disclaimer',[Section::class,'disclaimer']);
Route::get('/feedback',[Section::class,'feedback']);
Route::get('/disclaimer',[Section::class,'disclaimer']);
Route::get('/payment',[Section::class,'payment']);
Route::get('/privacy',[Section::class,'privacy']);
Route::get('/terms',[Section::class,'terms']);