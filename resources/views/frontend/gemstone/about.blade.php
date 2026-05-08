<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','About Gemstone : Power of Gemstone - Astroduniya')
@section('description','Gemstones helps to balance the body, mind, and spirit. These are healing stones which increase inner peace and prosperity.')
@section('keywords','gemstones, gems, birthstone, about gemstone, power of gemstone, lucky gemstone, gemstones uses, gemstones online, gemstone shopping, buy gemstones')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="About Gemstone"; 
	$toolbar_title="Power of Gemstones";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section>
	<div class="container">
		<div class="row">	
			<div class="col-lg-9 order-1 order-lg-1">
				<div class="mb-3">
					<img class="img-fluid" src="{{ asset('images/other/gems.png') }}" width="840" alt="about astrology"><br/><br/>										
					<p>Gemstones is powerful factor in astrology. They hold hidden energy in varying degrees, which helps to balance the body, mind, and spirit. They are healing stones which has been used for healing and spiritual rituals. Each Gemstones has a unique power and history behind it.  Every planet combined with a specific gemstone and it helps in balancing the effects of that planet upon us. </p><br/>
						
					<section class="py-4 bg-elight mb-3">
					    <div class="container">
					        <div class="row">
					            <div class="col-12 col-md-8">
					                <h4 class="m-0 font-weight-medium text-muted">What is your <span class="styleColor font-weight-medium">Lucky Gemstone ? </span></h4>
					                <p class="m-0">Ask to our expert Astrologer&nbsp;&nbsp;<span class="badge badge-success badge-soft">Free</span></p>
					            </div>
					            
					            <div class="col-12 mt-4 d-block d-md-none"><!-- mobile spacer bdfooter --></div>

					            <div class="col-12 col-md-4 text-align-end text-center-xs">
					                <a href="{{ url('/gemstone/recommendations') }}" class="btn btn-sm btn-warning btn-soft" target="_blank">Ask Now</a>
					            </div>
					        </div>
					    </div>
					</section><br/>

					
					<p>
						The tenets of Astrology believe that gemstone can change persons luck, health,  inner peace and prosperity. Wearing gemstone according to your sun sign can bring good effects to you. <span class="font-weight-normal badge badge-pill badge-primary badge-soft fs--15 styleColor">Choose your zodiac to explore.</span>
					</p><br/>

					<div class="row">
						
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/gemstone/about#blue_sapphire') }}"><i class="fa fa-caret-right"></i><span> Blue Sapphire (Neelam)</span></a>
						</div>
						
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/gemstone/about#ruby') }}"><i class="fa fa-caret-right"></i><span> Ruby (Manik)</span></a>
						</div>

						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/gemstone/about#emerald') }}"><i class="fa fa-caret-right"></i><span> Emerald (Panna)</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/gemstone/about#pearl') }}"><i class="fa fa-caret-right"></i><span> Pearl (Moti)</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/gemstone/about#red_coral') }}"><i class="fa fa-caret-right"></i><span> Red Coral (Moonga)</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/gemstone/about#yellow_sapphire') }}"><i class="fa fa-caret-right"></i><span> Yellow Sapphire (Pukhraj)</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/gemstone/about#diamond') }}"><i class="fa fa-caret-right"></i><span> Diamond (Heera)</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/gemstone/about#hessonite') }}"><i class="fa fa-caret-right"></i><span> Hessonite (Garnet)</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/gemstone/about#cats_eye') }}"><i class="fa fa-caret-right"></i><span> Cat’s Eye (Lehsunia)</span></a>
						</div>
				  </div>
					
				</div>

				<br id="blue_sapphire" ><br><br>
				<div>

					<h3>Blue Sapphire (Neelam)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_blue_sapphire" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_blue_sapphire" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_blue_sapphire" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_blue_sapphire" class="tab-pane active">
								
									<p>
										Blue Sapphire signifies planet Saturn. It is usually well-worn for removing evil effects in a person’s life. It can help in gaining good health and child.
									</p>
									<p>
										Blue sapphire should be worn in right hand middle finger on Saturday after appearance of stars.<br/>
										<span class="styleColor">Disclaimer : Results of this service may vary from person to person.</span>
									</p>
								
							</div>

							<div id="spec_blue_sapphire" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Rulling House of the Sun : <a href="{{ url('/gemstone/houses#fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a></li>
								<li>The Sun Rules over :<a href="{{ url('/signs#leo') }}" target="_blank" rel="noopener" title="know more about Leo"> Leo</a></li>
								<li>Ruling Numbers of the Sun : 1, 10, 19, 28</li>
								<li>Ruling Color of the Sun : Gold, yellow, copper, pink</li>
								<li>Ruling Day of the Sun : Sunday</li>
								<li>It stays in each zodiac for : One month</li>
									
							</div>

							<div id="more_blue_sapphire" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="Ruby" />
											<h6 class="mb-2 my-2">
												Ruby
											</h6>
											
											<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
										</div>
									</div>

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="Ruby" />
											<h6 class="mb-2 my-2">
												Suriya Puja
											</h6>
											
											<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
										</div>
									</div>																		
								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="ruby" ><br><br>
				<div>

					<h3>Ruby (Manik)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_ruby" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_ruby" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_ruby" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_ruby" class="tab-pane active">
								
									<p>
										Blue Sapphire signifies planet Saturn. It is usually well-worn for removing evil effects in a person’s life. It can help in gaining good health and child.
									</p>
									<p>
										Blue sapphire should be worn in right hand middle finger on Saturday after appearance of stars.<br/>
										<span class="styleColor">Disclaimer : Results of this service may vary from person to person.</span>
									</p>
								
							</div>

							<div id="spec_ruby" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Rulling House of the Sun : <a href="{{ url('/gemstone/houses#fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a></li>
								<li>The Sun Rules over :<a href="{{ url('/signs#leo') }}" target="_blank" rel="noopener" title="know more about Leo"> Leo</a></li>
								<li>Ruling Numbers of the Sun : 1, 10, 19, 28</li>
								<li>Ruling Color of the Sun : Gold, yellow, copper, pink</li>
								<li>Ruling Day of the Sun : Sunday</li>
								<li>It stays in each zodiac for : One month</li>
									
							</div>

							<div id="more_ruby" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="Ruby" />
											<h6 class="mb-2 my-2">
												Ruby
											</h6>
											
											<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
										</div>
									</div>

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="Ruby" />
											<h6 class="mb-2 my-2">
												Suriya Puja
											</h6>
											
											<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
										</div>
									</div>																		
								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="emerald" ><br><br>
				<div>

					<h3>Emerald (Panna)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_emerald" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_emerald" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_emerald" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_emerald" class="tab-pane active">
								
									<p>
										Blue Sapphire signifies planet Saturn. It is usually well-worn for removing evil effects in a person’s life. It can help in gaining good health and child.
									</p>
									<p>
										Blue sapphire should be worn in right hand middle finger on Saturday after appearance of stars.<br/>
										<span class="styleColor">Disclaimer : Results of this service may vary from person to person.</span>
									</p>
								
							</div>

							<div id="spec_emerald" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Rulling House of the Sun : <a href="{{ url('/gemstone/houses#fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a></li>
								<li>The Sun Rules over :<a href="{{ url('/signs#leo') }}" target="_blank" rel="noopener" title="know more about Leo"> Leo</a></li>
								<li>Ruling Numbers of the Sun : 1, 10, 19, 28</li>
								<li>Ruling Color of the Sun : Gold, yellow, copper, pink</li>
								<li>Ruling Day of the Sun : Sunday</li>
								<li>It stays in each zodiac for : One month</li>
									
							</div>

							<div id="more_emerald" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="emerald" />
											<h6 class="mb-2 my-2">
												emerald
											</h6>
											
											<a href="{{ url('/gemstones/order#emerald') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
										</div>
									</div>

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="emerald" />
											<h6 class="mb-2 my-2">
												Suriya Puja
											</h6>
											
											<a href="{{ url('/gemstones/order#emerald') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
										</div>
									</div>																		
								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="pearl" ><br><br>
				<div>

					<h3>Pearl (Moti)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_pearl" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_pearl" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_pearl" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_pearl" class="tab-pane active">
								
									<p>
										Blue Sapphire signifies planet Saturn. It is usually well-worn for removing evil effects in a person’s life. It can help in gaining good health and child.
									</p>
									<p>
										Blue sapphire should be worn in right hand middle finger on Saturday after appearance of stars.<br/>
										<span class="styleColor">Disclaimer : Results of this service may vary from person to person.</span>
									</p>
								
							</div>

							<div id="spec_pearl" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Rulling House of the Sun : <a href="{{ url('/gemstone/houses#fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a></li>
								<li>The Sun Rules over :<a href="{{ url('/signs#leo') }}" target="_blank" rel="noopener" title="know more about Leo"> Leo</a></li>
								<li>Ruling Numbers of the Sun : 1, 10, 19, 28</li>
								<li>Ruling Color of the Sun : Gold, yellow, copper, pink</li>
								<li>Ruling Day of the Sun : Sunday</li>
								<li>It stays in each zodiac for : One month</li>
									
							</div>

							<div id="more_pearl" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="pearl" />
											<h6 class="mb-2 my-2">
												pearl
											</h6>
											
											<a href="{{ url('/gemstones/order#pearl') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
										</div>
									</div>

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="pearl" />
											<h6 class="mb-2 my-2">
												Suriya Puja
											</h6>
											
											<a href="{{ url('/gemstones/order#pearl') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
										</div>
									</div>																		
								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="red_coral" ><br><br>
				<div>

					<h3>Red Coral (Moonga)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_red_coral" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_red_coral" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_red_coral" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_red_coral" class="tab-pane active">
								
									<p>
										Blue Sapphire signifies planet Saturn. It is usually well-worn for removing evil effects in a person’s life. It can help in gaining good health and child.
									</p>
									<p>
										Blue sapphire should be worn in right hand middle finger on Saturday after appearance of stars.<br/>
										<span class="styleColor">Disclaimer : Results of this service may vary from person to person.</span>
									</p>
								
							</div>

							<div id="spec_red_coral" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Rulling House of the Sun : <a href="{{ url('/gemstone/houses#fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a></li>
								<li>The Sun Rules over :<a href="{{ url('/signs#leo') }}" target="_blank" rel="noopener" title="know more about Leo"> Leo</a></li>
								<li>Ruling Numbers of the Sun : 1, 10, 19, 28</li>
								<li>Ruling Color of the Sun : Gold, yellow, copper, pink</li>
								<li>Ruling Day of the Sun : Sunday</li>
								<li>It stays in each zodiac for : One month</li>
									
							</div>

							<div id="more_red_coral" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="red_coral" />
											<h6 class="mb-2 my-2">
												red_coral
											</h6>
											
											<a href="{{ url('/gemstones/order#red_coral') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
										</div>
									</div>

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="red_coral" />
											<h6 class="mb-2 my-2">
												Suriya Puja
											</h6>
											
											<a href="{{ url('/gemstones/order#red_coral') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
										</div>
									</div>																		
								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="yellow_sapphire" ><br><br>
				<div>

					<h3>Yellow Sapphire (Pukhraj)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_yellow_sapphire" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_yellow_sapphire" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_yellow_sapphire" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_yellow_sapphire" class="tab-pane active">
								
									<p>
										Blue Sapphire signifies planet Saturn. It is usually well-worn for removing evil effects in a person’s life. It can help in gaining good health and child.
									</p>
									<p>
										Blue sapphire should be worn in right hand middle finger on Saturday after appearance of stars.<br/>
										<span class="styleColor">Disclaimer : Results of this service may vary from person to person.</span>
									</p>
								
							</div>

							<div id="spec_yellow_sapphire" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Rulling House of the Sun : <a href="{{ url('/gemstone/houses#fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a></li>
								<li>The Sun Rules over :<a href="{{ url('/signs#leo') }}" target="_blank" rel="noopener" title="know more about Leo"> Leo</a></li>
								<li>Ruling Numbers of the Sun : 1, 10, 19, 28</li>
								<li>Ruling Color of the Sun : Gold, yellow, copper, pink</li>
								<li>Ruling Day of the Sun : Sunday</li>
								<li>It stays in each zodiac for : One month</li>
									
							</div>

							<div id="more_yellow_sapphire" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="yellow_sapphire" />
											<h6 class="mb-2 my-2">
												yellow_sapphire
											</h6>
											
											<a href="{{ url('/gemstones/order#yellow_sapphire') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
										</div>
									</div>

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="yellow_sapphire" />
											<h6 class="mb-2 my-2">
												Suriya Puja
											</h6>
											
											<a href="{{ url('/gemstones/order#yellow_sapphire') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
										</div>
									</div>																		
								</div>
							</div>

						</div>
					</div>
				</div>				

				<br id="diamond" ><br><br>
				<div>

					<h3>Diamond (Heera)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_diamond" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_diamond" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_diamond" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_diamond" class="tab-pane active">
								
									<p>
										Blue Sapphire signifies planet Saturn. It is usually well-worn for removing evil effects in a person’s life. It can help in gaining good health and child.
									</p>
									<p>
										Blue sapphire should be worn in right hand middle finger on Saturday after appearance of stars.<br/>
										<span class="styleColor">Disclaimer : Results of this service may vary from person to person.</span>
									</p>
								
							</div>

							<div id="spec_diamond" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Rulling House of the Sun : <a href="{{ url('/gemstone/houses#fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a></li>
								<li>The Sun Rules over :<a href="{{ url('/signs#leo') }}" target="_blank" rel="noopener" title="know more about Leo"> Leo</a></li>
								<li>Ruling Numbers of the Sun : 1, 10, 19, 28</li>
								<li>Ruling Color of the Sun : Gold, yellow, copper, pink</li>
								<li>Ruling Day of the Sun : Sunday</li>
								<li>It stays in each zodiac for : One month</li>
									
							</div>

							<div id="more_diamond" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="diamond" />
											<h6 class="mb-2 my-2">
												diamond
											</h6>
											
											<a href="{{ url('/gemstones/order#diamond') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
										</div>
									</div>

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="diamond" />
											<h6 class="mb-2 my-2">
												Suriya Puja
											</h6>
											
											<a href="{{ url('/gemstones/order#diamond') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
										</div>
									</div>																		
								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="hessonite" ><br><br>
					<div>

						<h3>Hessonite (Garnet)<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_hessonite" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_hessonite" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_hessonite" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_hessonite" class="tab-pane active">
									
										<p>
											Blue Sapphire signifies planet Saturn. It is usually well-worn for removing evil effects in a person’s life. It can help in gaining good health and child.
										</p>
										<p>
											Blue sapphire should be worn in right hand middle finger on Saturday after appearance of stars.<br/>
											<span class="styleColor">Disclaimer : Results of this service may vary from person to person.</span>
										</p>
									
								</div>

								<div id="spec_hessonite" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Sun : <a href="{{ url('/gemstone/houses#fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a></li>
									<li>The Sun Rules over :<a href="{{ url('/signs#leo') }}" target="_blank" rel="noopener" title="know more about Leo"> Leo</a></li>
									<li>Ruling Numbers of the Sun : 1, 10, 19, 28</li>
									<li>Ruling Color of the Sun : Gold, yellow, copper, pink</li>
									<li>Ruling Day of the Sun : Sunday</li>
									<li>It stays in each zodiac for : One month</li>
										
								</div>

								<div id="more_hessonite" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="hessonite" />
												<h6 class="mb-2 my-2">
													hessonite
												</h6>
												
												<a href="{{ url('/gemstones/order#hessonite') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="hessonite" />
												<h6 class="mb-2 my-2">
													Suriya Puja
												</h6>
												
												<a href="{{ url('/gemstones/order#hessonite') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>

					<br id="cats_eye" ><br><br>
					<div>

						<h3>Cat’s Eye (Lehsunia)<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_cats_eye" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_cats_eye" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_cats_eye" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_cats_eye" class="tab-pane active">
									
										<p>
											Blue Sapphire signifies planet Saturn. It is usually well-worn for removing evil effects in a person’s life. It can help in gaining good health and child.
										</p>
										<p>
											Blue sapphire should be worn in right hand middle finger on Saturday after appearance of stars.<br/>
											<span class="styleColor">Disclaimer : Results of this service may vary from person to person.</span>
										</p>
									
								</div>

								<div id="spec_cats_eye" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Sun : <a href="{{ url('/gemstone/houses#fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a></li>
									<li>The Sun Rules over :<a href="{{ url('/signs#leo') }}" target="_blank" rel="noopener" title="know more about Leo"> Leo</a></li>
									<li>Ruling Numbers of the Sun : 1, 10, 19, 28</li>
									<li>Ruling Color of the Sun : Gold, yellow, copper, pink</li>
									<li>Ruling Day of the Sun : Sunday</li>
									<li>It stays in each zodiac for : One month</li>
										
								</div>

								<div id="more_cats_eye" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="cats_eye" />
												<h6 class="mb-2 my-2">
													cats_eye
												</h6>
												
												<a href="{{ url('/gemstones/order#cats_eye') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/jupiter.png') }}" width="80px" height="80px" alt="cats_eye" />
												<h6 class="mb-2 my-2">
													Suriya Puja
												</h6>
												
												<a href="{{ url('/gemstones/order#cats_eye') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>

			</div>
			
			<!-- SIDEBAR -->
			<div class="col-lg-3 order-2 order-lg-2 mb-5">
				@include('frontend.gemstone.sidebar.sidebar')
			</div>
			<!-- / SIDEBAR -->

		</div>

	</div>

</section>


@endsection
<!-- End Section -->



