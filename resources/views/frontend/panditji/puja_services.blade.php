<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Puja Services - Astroduniya')
@section('description','Pending')
@section('keywords','Pending')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php
	$toolbar_page="Puja Services"; 
	$toolbar_title="Puja List";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section>
	<div class="container">
		<div class="row">
			<header>
				<h3 class="font500 cus_clrg ">Select Puja To Perform</h3>		
			</header>

			<div class="row">
			
				<div class="col-md-4">
					<a href="{{ url('/panditji/pujas') }}">
						<figure>
							<img class="img-responsive-services" src="{{ asset('images/services/pt2.jpg') }}" alt="ask query"> 
						</figure>
						<h4 class='font500'>Ask Free Query</h4>
					</a>
					<p class="font400 cus_clrg">Epona is fully responsive and can adapt to any screen size, its incredibly fast. <a href="http://lc.astrolara.com:8080/astrology/about" target="_blank" rel="noopener" title="Read more about astrology" class="font600 letter-spacing-06"> Know more</a></p>
				</div>

				<div class="col-md-4">
					<a href="{{ url('/panditji/pujas') }}">
						<figure>
							<img class="img-responsive-services" src="{{ asset('images/services/pt2.jpg') }}" alt="Birth Journal">
						</figure>						
						<h4 class='font500'>Horoscope Report (Birth Journal)</h4>
					</a>
					<p class="font400 cus_clrg">You have endless possibilities to create layouts - various shortcodes<a href="http://lc.astrolara.com:8080/astrology/about" target="_blank" rel="noopener" title="Read more about astrology" class="font600 letter-spacing-06"> Know more</a></p>

				</div>

				<div class="col-md-4">
					<a href="{{ url('/panditji/pujas') }}">
						<figure>
							<img class="img-responsive-services" src="{{ asset('images/services/pt2.jpg') }}" alt="Book Astrologer">
						</figure>
						<h4 class='font500'>Book Astrologer</h4>
					</a>
					<p class="font400 cus_clrg">Epona includes the Revolution Slider, Layer Slider, Flex Slider<a href="http://lc.astrolara.com:8080/astrology/about" target="_blank" rel="noopener" title="Read more about astrology" class="font600 letter-spacing-06"> Know more</a></p>

				</div>

			</div>
			<br/>
			<div class="row">
			
				<div class="col-md-4">
					<a href="{{ url('/panditji/pujas') }}">
						<figure>
							<img class="img-responsive-services" src="{{ asset('images/services/pt2.jpg') }}" alt="ask query"> 
						</figure>
						<h4 class='font500'>Ask Free Query</h4>
					</a>
					<p class="font400 cus_clrg">Epona is fully responsive and can adapt to any screen size.<a href="http://lc.astrolara.com:8080/astrology/about" target="_blank" rel="noopener" title="Read more about astrology" class="font600 letter-spacing-06"> Know more</a></p>
				</div>

				<div class="col-md-4">
					<a href="{{ url('/panditji/pujas') }}">
						<figure>
							<img class="img-responsive-services" src="{{ asset('images/services/pt2.jpg') }}" alt="Birth Journal">
						</figure>						
						<h4 class='font500'>Horoscope Report (Birth Journal)</h4>
					</a>
					<p class="font400 cus_clrg">You have endless possibilities to create layouts - various shortcodes<a href="http://lc.astrolara.com:8080/astrology/about" target="_blank" rel="noopener" title="Read more about astrology" class="font600 letter-spacing-06"> Know more</a></p>

				</div>

				<div class="col-md-4">
					<a href="{{ url('/panditji/pujas') }}">
						<figure>
							<img class="img-responsive-services" src="{{ asset('images/services/pt2.jpg') }}" alt="Book Astrologer">
						</figure>
						<h4 class='font500'>Book Astrologer</h4>
					</a>
					<p class="font400 cus_clrg">Epona includes the Revolution Slider, Layer Slider, Flex Slider<a href="http://lc.astrolara.com:8080/astrology/about" target="_blank" rel="noopener" title="Read more about astrology" class="font600 letter-spacing-06"> Know more</a></p>

				</div>

			</div>
			<br/>
			<div class="row">
			
				<div class="col-md-4">
					<a href="{{ url('/panditji/pujas') }}">
						<figure>
							<img class="img-responsive-services" src="{{ asset('images/services/pt2.jpg') }}" alt="ask query"> 
						</figure>
						<h4 class='font500'>Ask Free Query</h4>
					</a>
					<p class="font400 cus_clrg">Epona is fully responsive and can adapt to any screen size, its incredibly fast and flexible.<a href="http://lc.astrolara.com:8080/astrology/about" target="_blank" rel="noopener" title="Read more about astrology" class="font600 letter-spacing-06"> Know more</a></p>
				</div>

				<div class="col-md-4">
					<a href="{{ url('/panditji/pujas') }}">
						<figure>
							<img class="img-responsive-services" src="{{ asset('images/services/pt2.jpg') }}" alt="Birth Journal">
						</figure>						
						<h4 class='font500'>Horoscope Report (Birth Journal)</h4>
					</a>
					<p class="font400 cus_clrg">You have endless possibilities to create layouts - various shortcodes<a href="http://lc.astrolara.com:8080/astrology/about" target="_blank" rel="noopener" title="Read more about astrology" class="font600 letter-spacing-06"> Know more</a></p>

				</div>

				<div class="col-md-4">
					<a href="{{ url('/panditji/pujas') }}">
						<figure>
							<img class="img-responsive-services" src="{{ asset('images/services/pt2.jpg') }}" alt="Book Astrologer">
						</figure>
						<h4 class='font500'>Book Astrologer</h4>
					</a>
					<p class="font400 cus_clrg">Epona includes the Revolution Slider, Layer Slider, Flex Slider<a href="http://lc.astrolara.com:8080/astrology/about" target="_blank" rel="noopener" title="Read more about astrology" class="font600 letter-spacing-06"> Know more</a></p>

				</div>

			</div>


		</div>
	</div>
</section>

@endsection
<!-- End Section -->



