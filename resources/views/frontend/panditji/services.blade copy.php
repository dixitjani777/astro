<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Puja & Other Services - Astroduniya')
@section('description','Pending')
@section('keywords','Pending')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php
	$toolbar_page="Puja & Other Services"; 
	$toolbar_title="Prayer Services";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9">
				<header class="text-center">
					<h1 class="font500 styleColor">	Prayer Services				
						<p class="sub_heading letter-spacing-1">Choose Prayer Services.</p>
					</h1>		
				</header>

				<div class="row">
		
					<div class="col-md-6">
						<a href="{{ url('/panditji/puja-services') }}">
							<figure>
								<img class="img-responsive-services" style="height: 260px;" src="{{ asset('images/services/pt2.jpg') }}" alt="ask query"> 
							</figure>
							<h4 class='font500'>Puja Services</h4>
						</a>
						<p class="font400 cus_clrg">Epona is fully responsive and can adapt to any screen size, its incredibly fast and flexible.</p>
					</div>

					<div class="col-md-6">
						<a href="{{ url('/panditji/havan-services') }}">
							<figure>
								<img class="img-responsive-services" style="height: 260px;" src="{{ asset('images/services/hvn.jpg') }}" alt="Birth Journal">
							</figure>						
							<h4 class='font500'>Havan Services</h4>
						</a>
						<p class="font400 cus_clrg">Epona is fully responsive and can adapt to any screen size, its incredibly fast and flexible.</p>

					</div>					
				</div>

				<div class="row">
				
					<div class="col-md-6">
						<a href="{{ url('/panditji/jaap') }}">
							<figure>
								<img class="img-responsive-services" style="height: 260px;" src="{{ asset('images/recent_work/nvs.jpg') }}" alt="ask query"> 
							</figure>
							<h4 class='font500'>Jaap & Shanti Pujas</h4>
						</a>
						<p class="font400 cus_clrg">Epona is fully responsive and can adapt to any screen size, its incredibly fast and flexible.</p>
					</div>

					<div class="col-md-6">
						<a href="{{ url('/panditji/katha') }}">
							<figure>
								<img class="img-responsive-services" style="height: 260px;" src="{{ asset('images/services/katha.jpg') }}" alt="Birth Journal">
							</figure>						
							<h4 class='font500'>Shreemad Katha</h4>
						</a>
						<p class="font400 cus_clrg">Epona is fully responsive and can adapt to any screen size, its incredibly fast and flexible.</p>

					</div>
				</div>
			</div>
			
			<!-- INFO -->
			
			<div class="col-md-3">
				@include('frontend.panditji.sidebar.sidebar')
			</div>

		</div>
	</div>
</section>

@endsection
<!-- End Section -->



