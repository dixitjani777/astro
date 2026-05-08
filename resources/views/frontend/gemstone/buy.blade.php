<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Buy Gemstones Online : Certified Gemstones - Astroduniya')
@section('description','Buy government certified Gemstones at best prices. It comes with extra powerfull because pandit ji add extra effect by his Prayer.')
@section('keywords','buy gemstones online, government certified gemstones, gemstones, lucky gemstone, gemstones online, buy gemstones, gemstones buy, gemstones buy online, gemstones near me')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Buy Gemstone"; 
	$toolbar_title="Buy Gemstone";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')

<section class="p-0">
	<div class="container">
		
		<!-- info ba r-->
		<section id="infbr" class="p-0 info-bar info-bar-clean">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<img src="{{ asset('images/infobar/checkked.png')}}" class="info_img" alt="expert astrologer">
						<h1 class="letter-spacing-03 font-weight-medium fs--20"><b>Govt. Certified Gemstones</b></h1>
						<p class="letter-spacing-1 m-0"><b class="info_sub_clr">Authorized Gemstone</b></p>				
					</div>

					<div class="col-md-4">
						<img src="{{ asset('images/infobar/checkked.png')}}" class="info_img" alt="panditji">
						<h1 class="letter-spacing-03 font-weight-medium fs--20"><b>Premium Gemstones</b></h1>
						<p class="letter-spacing-1 m-0"><b class="info_sub_clr">Quality Gemstones</b></p>
					</div>
					
					<div class="col-md-4">
						<img src="{{ asset('images/infobar/checkked.png')}}" class="info_img" alt="online support">
						<h1 class="letter-spacing-03 font-weight-medium fs--20"><b>ONLINE SUPPORT</b></h1>
						<p class="letter-spacing-1 m-0"><b class="info_sub_clr">Professional Team</b></p>
					</div>

					
				</div>
			</div>
			
		</section>
		<!-- /info bar -->
	</div>
</section>

<!-- Choose Gemstones -->
<section id="daily_horoscope" class="bg-light">
<div>
	<div class="container mb-6">
		
		<div class="row">
			
			<div class="col-lg-4 mb-4">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						

						<img class="planet_shadow" src="{{ asset('images/stones/stone.png') }}" alt="stone" /> <br/><br/>
						<h5 class="card-title text-muted">
							Blue Sapphire / Neelam
						</h5>
						<p class="card-text color-red text-muted">
							<b>Lab Certified</b>
						</p>
						<p class="color-green font-weight-medium mb-4">
							<span class="bgylw">For Long life, Good Child</span>
						</p>
						<div class="shop-item-buttons">
							
							<a href="{{ url('/gemstone/recommendations') }}" class="btn btn-sm btn-warning btn-soft">Request to Buy</a>
						</div>
						
					</div>
				</div>

			</div>

			<div class="col-lg-4 mb-4">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						
						<img class="planet_shadow" src="{{ asset('images/stones/stone.png') }}" alt="stone" /> <br/><br/>
						<h5 class="card-title text-muted">
							Ruby / Manik
						</h5>
						<p class="card-text color-red text-muted">
							<b>Lab Certified</b>
						</p>
						<p class="color-green font-weight-medium mb-4">
							<span class="bgylw">For professional success, fame</span>
						</p>
						<div class="shop-item-buttons">
							
							<a href="{{ url('/gemstone/recommendations') }}" class="btn btn-sm btn-warning btn-soft">Request to Buy</a>
						</div>
						
					</div>
				</div>

			</div>

			<div class="col-lg-4 mb-4">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						
						<img class="planet_shadow" src="{{ asset('images/stones/stone.png') }}" alt="stone" /> <br/><br/>
						<h5 class="card-title text-muted">
							Emerald / Panna
						</h5>
						<p class="card-text color-red text-muted">
							<b>Lab Certified</b>
						</p>
						<p class="color-green font-weight-medium mb-4">
							<span class="bgylw">For Good Luck, restrict evil spirits</span>
						</p>
						<div class="shop-item-buttons">
							
							<a href="{{ url('/gemstone/recommendations') }}" class="btn btn-sm btn-warning btn-soft">Request to Buy</a>
						</div>
						
					</div>
				</div>

			</div>

			<div class="col-lg-4 mb-4">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						
						<img class="planet_shadow" src="{{ asset('images/stones/stone.png') }}" alt="stone" /> <br/><br/>
						<h5 class="card-title text-muted">
							Pearl / Moti
						</h5>
						<p class="card-text color-red text-muted">
							<b>Lab Certified</b>
						</p>
						<p class="color-green font-weight-medium mb-4">
							<span class="bgylw">For Peace, decisive</span>
						</p>
						<div class="shop-item-buttons">
							
							<a href="{{ url('/gemstone/recommendations') }}" class="btn btn-sm btn-warning btn-soft">Request to Buy</a>
						</div>
						
					</div>
				</div>

			</div>
			
			<div class="col-lg-4 mb-4">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						
						<img class="planet_shadow" src="{{ asset('images/stones/stone.png') }}" alt="stone" /> <br/><br/>
						<h5 class="card-title text-muted">
							Red Coral / Moonga
						</h5>
						<p class="card-text color-red text-muted">
							<b>Lab Certified</b>
						</p>
						<p class="color-green font-weight-medium mb-4">
							<span class="bgylw">For bring good power and respect</span>
						</p>
						<div class="shop-item-buttons">
							
							<a href="{{ url('/gemstone/recommendations') }}" class="btn btn-sm btn-warning btn-soft">Request to Buy</a>
						</div>
						
					</div>
				</div>

			</div>

			<div class="col-lg-4 mb-4">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						
						<img class="planet_shadow" src="{{ asset('images/stones/stone.png') }}" alt="stone" /> <br/><br/>
						<h5 class="card-title text-muted">
							Yellow Sapphire / Pukhraj
						</h5>
						<p class="card-text color-red text-muted">
							<b>Lab Certified</b>
						</p>
						<p class="color-green font-weight-medium mb-4">
							<span class="bgylw">For success and glory</span>
						</p>
						<div class="shop-item-buttons">
							
							<a href="{{ url('/gemstone/recommendations') }}" class="btn btn-sm btn-warning btn-soft">Request to Buy</a>
						</div>
						
					</div>
				</div>

			</div>

			<div class="col-lg-4 mb-4">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						
						<img class="planet_shadow" src="{{ asset('images/stones/stone.png') }}" alt="stone" /> <br/><br/>
						<h5 class="card-title text-muted">
							Diamond / Heera
						</h5>
						<p class="card-text color-red text-muted">
							<b>Lab Certified</b>
						</p>
						<p class="color-green font-weight-medium mb-4">
							<span class="bgylw">For Health Benefits</span>
						</p>
						<div class="shop-item-buttons">
							
							<a href="{{ url('/gemstone/recommendations') }}" class="btn btn-sm btn-warning btn-soft">Request to Buy</a>
						</div>
						
					</div>
				</div>

			</div>

			<div class="col-lg-4 mb-4">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						
						<img class="planet_shadow" src="{{ asset('images/stones/stone.png') }}" alt="stone" /> <br/><br/>
						<h5 class="card-title text-muted">
							Hessonite / Garnet
						</h5>
						<p class="card-text color-red text-muted">
							<b>Lab Certified</b>
						</p>
						<p class="color-green font-weight-medium mb-4">
							<span class="bgylw">For wealth and Fearlessness</span>
						</p>
						<div class="shop-item-buttons">
							
							<a href="{{ url('/gemstone/recommendations') }}" class="btn btn-sm btn-warning btn-soft">Request to Buy</a>
						</div>
						
					</div>
				</div>

			</div>
			
			<div class="col-lg-4 mb-4">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						
						<img class="planet_shadow" src="{{ asset('images/stones/stone.png') }}" alt="stone" /> <br/><br/>
						<h5 class="card-title text-muted">
							Cats Eye / Lehsunia
						</h5>
						<p class="card-text color-red text-muted">
							<b>Lab Certified</b>
						</p>
						<p class="color-green font-weight-medium mb-4">
							<span class="bgylw">For healing and wisdom</span>
						</p>
						<div class="shop-item-buttons">
							
							<a href="{{ url('/gemstone/recommendations') }}" class="btn btn-sm btn-warning btn-soft">Request to Buy</a>
						</div>
						
					</div>
				</div>

			</div>

		</div>

	</div>	
</div>	
</section>
<!-- /Choose Gemstones -->

@endsection
<!-- End Section -->



