<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Details of Puja - Astroduniya')
@section('description','pending')
@section('keywords','pending')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Book Puja"; 
	$toolbar_title="Book Puja";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<!-- CSS -->
<link href="{{asset('css/layout-shop.css') }}" rel="stylesheet" type="text/css">
<!-- /CSS -->

<!-- CONTENT -->
<section class="cus_pd35">
	<div class="container">
		<div class="row">
		<div class="col-md-9 col-sm-9">
			<div  class="col-md-12">
				<div class="col-md-5">
					<figure>
						<img class="img-responsive-services" src="{{ asset('images/services/pt2.jpg') }}" alt="Book Astrologer">
					</figure>	
				</div>

				<div class="col-md-7">
					
					<h1 class="product-view-title font500">Blue Sapphire (Neelam) - 5 carat</h1>
					
					<p class="cus_clrg letter-spacing-0_6">
						 Powerfull Gemstone to improve health, gain longevity, fame.
						<strong></strong>
					</p>

					<hr class="half-margins" /><br/>
					<div id="infbr" class="info-bar">
						<div class="row" style="margin-bottom: -20px;margin-top: -30px;">
							<div class="col-md-5" style="border-right:none;">
								<img src="{{ asset('images/infobar/correct.png') }}" class="info_img" alt="expert astrologer">
								<h3 class="letter-spacing-1 fnt"><b>LAB CERTIFIED</b></h3>
								<h4 class="letter-spacing-1"><b class="info_sub_clr">experience</b></h4>				
							</div>

							<div class="col-md-5">
								<img src="{{ asset('images/infobar/correct.png') }}" class="info_img" alt="online support">
								<h3 class="letter-spacing-1 fnt"><b>ENERGIZATION</b></h3>
								<h4 class="letter-spacing-1"><b class="info_sub_clr">Professional</b></h4>
							</div>
						</div>
					</div><br>
					<hr class="half-margins" />
					<div>
						
						<ul>
						 	<li>To get rid of bad effects of Gand moola nakshatra.</li>
						 	<li>Performed to remove negative effects of nakshatras.</li>
						 	<li>Also Known as Sataisa puja.</li>
						 	<li>Perfomed on 27th day after the birth of child.</li>
						 	<li>27 tree leaves and 27 well waters are used.</li>
						</ul>
					</div>
					<hr class="half-margins" />

					<form action="" method="get" class="form-inline margin-top10 nopadding clearfix">

						<div class="btn-group pull-left product-opt-qty">
							<a href="{{ url('/panditji/book#enquiry') }}" class="btn btn-primary">Send Enquiry</a>
						</div><!-- /btn-group -->
						
						<br/><br/>					
					</form>
					

				</div>
			</div>

		</div>

		<div  class="col-md-3 col-sm-3">
			
			
			<div class="thumbnail" style="background-color:#eee;">
				<br/>
				<img class="img-responsive" src="{{ asset('images/other/support.png') }}" alt="">
				<div class="caption">
					<br/>
					<center><h3 class="bold">Customer Care</h3>
					<h5 class="cus_mar bold">+91 9699342442</h5>
					<h5 class="bold">(9AM to 6PM)</h5>
					</center>
					
				</div>
			</div>

		</div>
		</div>
		<br/><br/><br/><br/>
		<!-- Planet Shadow class = "planet_shadow" -->
		<div id="sun">
			
			
			
			<div class="tabs nomargin-top">
				
				<ul class="nav nav-tabs">
					<li class="active"><a href="#about_sun" data-toggle="tab" aria-expanded="false">Description</a></li>
					<li><a href="#spec_sun" data-toggle="tab" aria-expanded="false">Specifications</a></li>
					<li><a href="#more_sun" data-toggle="tab" aria-expanded="false">Reviews (2)</a></li>
					
				</ul>

				<div class="tab-content">
					<div id="about_sun" class="tab-pane active">
						<img src="{{ asset('images/planets/sun.png') }}" class="pull-left" width="57px" height="57px" alt="sun">

						<p class="cus_clrg">Various Names of Sun : Aditya, Aruna, Bhanu, Dhinakara, Hell, Pusha, Ravi, Surya.</p>
						

						<p class="cus_clrg">The Sun is a “king of planets” as it rules royalty and the higher positions and It is largest among all planets. It represents the actual core of a person, life force, pride, the father, male children and authority character. A strong Sun in horoscope indicates courage and the ability to motivate others. If Sun is weak in horoscope indicates the person lacks encouragement and the energy level is weak. <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Sun in your horoscope.</p>
					</div>

					<div id="spec_sun" class="tab-pane cus_clrg">
						<h5>Sun Facts :</h5>
						
						<li>Rulling House of the Sun : <a href="{{ url('/astrology/houses#fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a></li>
						<li>The Sun Rules over :<a href="{{ url('/astrology/signs#leo') }}" target="_blank" rel="noopener" title="know more about Leo"> Leo</a></li>
						<li>Ruling Numbers of the Sun : 1, 10, 19, 28</li>
						<li>Ruling Color of the Sun : Gold, yellow, copper, pink</li>
						<li>Ruling Day of the Sun : Sunday</li>
						<li>It stays in each zodiac for : One month</li>
							
					</div>

					<div id="more_sun" class="tab-pane">
						<h5 class="font500">Recommendation :</h5>
						<div class="row">
							<div class="col-md-4">
								<div class="featured-box_more">
									<a href="{{ url('/gemstones/order#ruby') }}">
									<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="sun">
									<br><br>
									<h5 class="items font500">Ruby</h5>
									<a href="" class="btn btn-sm btn-primary noradius cusmarb"><span>Buy Gemstone</span></a>
									<br>
									</a>
								</div>
							</div>
							<div class="col-md-4">
								<div class="featured-box_more">
									<a href="{{ url('/panditji/puja#graha') }}">
									<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="sun">
									<br><br>
									<h5 class="items font500">Suriya Puja</h5>
									<a href="" class="btn btn-sm btn-primary noradius cusmarb"><span>Book Puja</span></a>
									<br>
									</a>
								</div>
							</div>
																	
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- /CONTENT -->

@endsection
<!-- End Section -->



