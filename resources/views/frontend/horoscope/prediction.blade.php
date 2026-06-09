<?php
$prediction = Request::segment(3); 
    switch ($prediction) {
        case "daily":
        	$title="Daily Horoscope : Predictions for All Zodiac - Astroduniya";
        	$description="Read daily horoscope for aries, taurus, gemini, cancer, leo, virgo, libra, scorpio, sagittarius, capricorn, aquarius, pisces";
        	$keywords="today horoscope, daily horoscope, aries horoscope, taurus horoscope, gemini horoscope, cancer horoscope, leo horoscope, virgo horoscope, libra horoscope, scorpio horoscope, sagittarius horoscope, capricorn horoscope, aquarius horoscope, pisces horoscope";
        	$toolbar_page="Daily Horoscope"; 
			$toolbar_title="Daily Horoscope";
            break;
        case "weekly":
        	$title="Weekly Horoscope : Predictions for All Zodiac - Astroduniya";
        	$description="Read weekly horoscope for aries, taurus, gemini, cancer, leo, virgo, libra, scorpio, sagittarius, capricorn, aquarius, pisces";
        	$keywords="weekly horoscope, aries horoscope, taurus horoscope, gemini horoscope, cancer horoscope, leo horoscope, virgo horoscope, libra horoscope, scorpio horoscope, sagittarius horoscope, capricorn horoscope, aquarius horoscope, pisces horoscope";
            $toolbar_page="Weekly Horoscope"; 
			$toolbar_title="Weekly Horoscope";
            break;
        case "monthly":
        	$title="Monthly Horoscope : Predictions for All Zodiac - Astroduniya";
        	$description="Read monthly horoscope for aries, taurus, gemini, cancer, leo, virgo, libra, scorpio, sagittarius, capricorn, aquarius, pisces";
        	$keywords="monthly horoscope, aries horoscope, taurus horoscope, gemini horoscope, cancer horoscope, leo horoscope, virgo horoscope, libra horoscope, scorpio horoscope, sagittarius horoscope, capricorn horoscope, aquarius horoscope, pisces horoscope";
            $toolbar_page="Monthly Horoscope"; 
			$toolbar_title="Monthly Horoscope";
            break;
        case "yearly":
            $title="Yearly Horoscope : Predictions for All Zodiac - Astroduniya";
        	$description="Read yearly horoscope for aries, taurus, gemini, cancer, leo, virgo, libra, scorpio, sagittarius, capricorn, aquarius, pisces";
        	$keywords="yearly horoscope, aries horoscope, taurus horoscope, gemini horoscope, cancer horoscope, leo horoscope, virgo horoscope, libra horoscope, scorpio horoscope, sagittarius horoscope, capricorn horoscope, aquarius horoscope, pisces horoscope";
        	$toolbar_page="Yearly Horoscope"; 
			$toolbar_title="Yearly Horoscope";
			break;
        default:
            
    }

    if (!empty($cms?->meta_title)) {
        $title = $cms->meta_title;
    }
    if (!empty($cms?->meta_description)) {
        $description = $cms->meta_description;
    }
?>

<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title',$title)
@section('description',$description)
@section('keywords',$keywords)
<!-- End of layout, title, description, keywords -->


<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section style="background-image: url(../../images/other/bgvb.png);">
	<div class="container">
		<div class="row">	
			<div class="col-md-9 col-sm-9">
				<header class="text-center">
					<?php 
						$get_period = Request::segment(3); 
						if($get_period == 'daily')
						{
							$period = 'daily';
						}else if($get_period == 'weekly'){
							$period = 'weekly';
						}else if($get_period == 'monthly'){
							$period = 'monthly';
						}else if($get_period == 'yearly'){
							$period = 'yearly';
						}
					?>

					<h1>{{ ucfirst($period) }}<span class="styleColor"> Horoscope</span>					
						<p class="sub_heading letter-spacing-1">Choose your zodiac sign.</p>
					</h1>
					<div class="divider half-margins"><!-- divider -->
						<i class="fa fa-chevron-down"></i>
					</div>			
				</header><br>

				@if(!empty($cms?->content_html))
					<div class="mb-4">
						{!! $cms->content_html !!}
					</div>
				@endif

				<div class="row">
						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/aries') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/aries.png') }}" alt="aries" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Aries
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>21 Mar to 20 Apr</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/taurus') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/taurus.png') }}" alt="Taurus" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Taurus
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>21 Apr to 21 May</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/gemini') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/gemini.png') }}" alt="Gemini" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Gemini
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>22 May to 21 Jun</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/cancer') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/cancer.png') }}" alt="Cancer" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Cancer
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>22 Jun to 22 Jul</span>
									</p>
									</a>
								</div>
							</div>

						</div>

					</div>
					
					<div class="row">
						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/leo') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/leo.png') }}" alt="Leo" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Leo
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>23 Jul to 22 Aug</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						
						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/virgo') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/virgo.png') }}" alt="Virgo" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Virgo
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>23 Aug to 23 Sep</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/libra') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/libra.png') }}" alt="Libra" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Libra
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>24 Sep to 23 Oct</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/scorpio') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/scorpio.png') }}" alt="Scorpio" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Scorpio
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>24 Oct to 22 Nov</span>
									</p>
									</a>
								</div>
							</div>

						</div>
					</div>
					
					<div class="row">
						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/sagittarius') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/sagittarius.png') }}" alt="sagittarius" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Sagittarius
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>23 Nov to 21 Dec</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/capricorn') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/capricorn.png') }}" alt="Capricorn" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Capricorn
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>22 Dec to 20 Jan</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/aquarius') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/aquarius.png') }}" alt="Aquarius" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Aquarius
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>21 Jan to 19 Feb</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 pt-4 pb-4 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/horoscope/'.$period.'/pisces') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/pisces.png') }}" alt="Pisces" /><br/>
									<h5 class="clrlb text-muted font-weight-medium">
										Pisces
									</h5>
									<p class="card-text cus_mar font-weight-medium">
										<span>20 Feb to 20 Mar</span>
									</p>
									</a>
								</div>
							</div>

						</div>	

					</div>

			</div>
			
			<!-- SIDEBAR -->
			<div class="col-md-3 col-sm-3">
				@include('frontend.horoscope.sidebar.sidebar')
			</div>
			<!-- / SIDEBAR -->

		</div>
	</div>
</section>

@endsection
<!-- End Section -->
