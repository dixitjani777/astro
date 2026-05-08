<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Houses of zodiac : 12 house in astrology - Astroduniya')
@section('description','The birth chart is divided into twelve equal sections, which contain the Houses. Each house is associated with a set of qualities.')
@section('keywords','house of zodiac, house of zodiac signs, 12 house of zodiac, 12 houses in vedic astrology, 12 houses in kundli, elements of the house, second house astrology, 3rd house astrology,  4rd house astrology')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="The Astrological Houses"; 
	$toolbar_title="About Houses";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-9 order-1 order-lg-1">	
				<div>
					<p>
					 	The birth chart is divided into twelve equal sections, which contain the Houses. The twelve houses of astrology are powerful of the all the departments that make up human life. Each house is associated with a set of qualities.
					 </p>
					 <p> 
					  	Houses make you unique. At the stage you were born, the planets were all in specific signs and houses. The first six houses are known as the “personal houses,” while the last six houses are known as the “interpersonal houses.”
					</p>
					<p>
						The Houses are a roadmap for understanding your past, present, and future.<span class="font-weight-medium badge badge-pill badge-primary badge-soft fs--15 styleColor">Choose house to explore.</span>
					</p><br/>

					<div class="row">
						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body mb-2 my-2 ">
									<a href="{{ url('/astrology/houses#first') }}">
									<img src="{{ asset('images/12_houses/1.png') }}" width="60px" height="60px" alt="First house" /><br/><br/>
									<h5 class="text-muted card-title">
										First
									</h5>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/houses#second') }}">
									<img src="{{ asset('images/12_houses/2.png') }}" width="60px" height="60px" alt="Second house" /><br/><br/>
									<h5 class="text-muted card-title">
										Second
									</h5>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/houses#third') }}">
									<img src="{{ asset('images/12_houses/3.png') }}" width="60px" height="60px" alt="Third house" /><br/><br/>
									<h5 class="text-muted card-title">
										Third
									</h5>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/houses#fourth') }}">
									<img src="{{ asset('images/12_houses/4.png') }}" width="60px" height="60px" alt="Fourth house" /><br/><br/>
									<h5 class="text-muted card-title">
										Fourth
									</h5>
									</a>
								</div>
							</div>

						</div>
					</div>
					
					<div class="row">

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/houses#fifth') }}">
									<img src="{{ asset('images/12_houses/5.png') }}" width="60px" height="60px" alt="Fifth house" /><br/><br/>
									<h5 class="text-muted card-title">
										Fifth
									</h5>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/houses#sixth') }}">
									<img src="{{ asset('images/12_houses/6.png') }}" width="60px" height="60px" alt="Sixth house" /><br/><br/>
									<h5 class="text-muted card-title">
										Sixth
									</h5>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/houses#seventh') }}">
									<img src="{{ asset('images/12_houses/7.png') }}" width="60px" height="60px" alt="Seventh house" /><br/><br/>
									<h5 class="text-muted card-title">
										Seventh
									</h5>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/houses#eight') }}">
									<img src="{{ asset('images/12_houses/8.png') }}" width="60px" height="60px" alt="Eight house" /><br/><br/>
									<h5 class="text-muted card-title">
										Eight
									</h5>
									</a>
								</div>
							</div>

						</div>
					</div>
					
					<div class="row">

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/houses#ninth') }}">
									<img src="{{ asset('images/12_houses/9.png') }}" width="60px" height="60px" alt="Ninth house" /><br/><br/>
									<h5 class="text-muted card-title">
										Ninth
									</h5>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/houses#tenth') }}">
									<img src="{{ asset('images/12_houses/10.png') }}" width="60px" height="60px" alt="Tenth house" /><br/><br/>
									<h5 class="text-muted card-title">
										Tenth
									</h5>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/houses#eleventh') }}">
									<img src="{{ asset('images/12_houses/11.png') }}" width="60px" height="60px" alt="Eleventh house" /><br/><br/>
									<h5 class="text-muted card-title">
										Eleventh
									</h5>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 bw--2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/houses#twelfth') }}">
									<img src="{{ asset('images/12_houses/12.png') }}" width="60px" height="60px" alt="Twelfth house" /><br/><br/>
									<h5 class="text-muted card-title">
										Twelfth
									</h5>
									</a>
								</div>
							</div>

						</div>					
					</div>
					
				</div>

				
				<br id="first" ><br><br>
				<div>

					<h3>First House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_first" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_first" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_first" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_first" class="tab-pane active">
									<h4 class="text-muted">First House is known as the Ascendant or Lagna.</h4>
									<p>
										First house is related to your character, your personality, your physical presentation, and the first impression you make on people. It represents the self, the way you are viewed in the world. The ruling planet reflects our basic growth. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_first" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by : Lagan, face, head , mind. </li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#mars') }}" target="_blank" rel="noopener" title="know more about mars"> Mars</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#aries') }}" target="_blank" rel="noopener" title="know more about aries"> Aries</a>
								</li>
									
							</div>

							<div id="more_first" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" height="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" height="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
										</div>
									</div>	

								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="second" ><br><br>
				<div>

					<h3>Second House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_second" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_second" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_second" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_second" class="tab-pane active">
									<h4 class="text-muted">Second House is known as the  “Kutumb Bhava” or “Dhan Bhava”.</h4>
									<p>
										Second house is related to your Wealth and Family. It represents the financial circumstances, fortune, profit, loss. The ruling planet reflects our resources. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_second" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by : Eye, speech, neck, teeth, food, finances.</li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#venus') }}" target="_blank" rel="noopener" title="know more about venus"> Venus</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#taurus') }}" target="_blank" rel="noopener" title="know more about taurus"> Taurus</a>
								</li>
									
							</div>

							<div id="more_second" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" height="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" height="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
										</div>
									</div>	

								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="third" ><br><br>
				<div>

					<h3>Third House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_third" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_third" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_third" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_third" class="tab-pane active">
									<h4 class="text-muted">Third House is known as the  “Bhrathrusthana”.</h4>
									<p>
										Third house is related to communication skills. It represents the siblinga, close relations, education, courage. The ruling planet reflects our energy and memory. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_third" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by : Ears, hands, arms and fingers.</li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#Mercury') }}" target="_blank" rel="noopener" title="know more about mercury"> Mercury</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#gemini') }}" target="_blank" rel="noopener" title="know more about gemini"> Gemini</a>
								</li>
									
							</div>

							<div id="more_third" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" height="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" height="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
										</div>
									</div>	

								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="fourth" ><br><br>
				<div>

					<h3>Fourth House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_fourth" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_fourth" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_fourth" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_fourth" class="tab-pane active">
									<h4 class="text-muted">Fourth House is known as the  “Sukhsthana”.</h4>
									<p>
										Fourth house is related to your Home and Family. It represents the unconditional love, property, lifestyle, home life, daily habits. The ruling planet reflects our early childhood and emotional capacity. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_fourth" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by : Chest, breasts and lungs.</li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#moon') }}" target="_blank" rel="noopener" title="know more about moon"> Moon</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#cancer') }}" target="_blank" rel="noopener" title="know more about cancer"> Cancer</a>
								</li>
									
							</div>

							<div id="more_fourth" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" height="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" height="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
										</div>
									</div>	

								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="fifth" ><br><br>
				<div>

					<h3>Fifth House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_fifth" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_fifth" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_fifth" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_fifth" class="tab-pane active">
									<h4 class="text-muted">Fifth House is known as the  “Rishi Parashara”.</h4>
									<p>
										Fifth house is related to creativity and comfort. It represents our desires, self expression, social capability, romance, personal pleasure. The ruling planet reflects love affairs. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_fifth" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by : Heart, belly, spine.</li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#sun') }}" target="_blank" rel="noopener" title="know more about sun"> Sun</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#leo') }}" target="_blank" rel="noopener" title="know more about leo"> Leo</a>
								</li>
									
							</div>

							<div id="more_fifth" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" height="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" height="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
										</div>
									</div>	

								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="sixth" ><br><br>
				<div>

					<h3>Sixth House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_sixth" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_sixth" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_sixth" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_sixth" class="tab-pane active">
									<h4 class="text-muted">Sixth House is known as the  “Tapasya”.</h4>
									<p>
										Sixth house is related to your Health, debts, enemies. It represents the employment, responsibility, hard work, health, wellness. The ruling planet reflects our personal development. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_sixth" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by : Stomach, Kidney and the digestion process.</li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#mercury') }}" target="_blank" rel="noopener" title="know more about mercury"> Mercury</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#virgo') }}" target="_blank" rel="noopener" title="know more about virgo"> Virgo</a>
								</li>
									
							</div>

							<div id="more_sixth" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" height="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" height="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
										</div>
									</div>	

								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="seventh" ><br><br>
				<div>

					<h3>Seventh House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_seventh" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_seventh" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_seventh" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_seventh" class="tab-pane active">
									<h4 class="text-muted">Seventh House is known as the  “Earthy Ties”.</h4>
									<p>
										Seventh house is related to relationships, partnerships, opposition. It represents the marriage, wife or husband, lawsuits, divorce, open enemies. The ruling planet reflects relationships. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_seventh" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by : Private parts, lower back, renal system.</li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#venus') }}" target="_blank" rel="noopener" title="know more about venus"> Venus</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#libra') }}" target="_blank" rel="noopener" title="know more about libra"> Libra</a>
								</li>
									
							</div>

							<div id="more_seventh" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" height="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" height="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
										</div>
									</div>	

								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="eight" ><br><br>
				<div>

					<h3>Eight House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_eight" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_eight" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_eight" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_eight" class="tab-pane active">
									<h4 class="text-muted">Eight House is known as the  “Ayu Bhava”.</h4>
									<p>
										Eight house is related to rebirth, shared resources, business. It represents the defeat, insult, sorrow, scandal, transformation, regeneration, sexuality, death. The ruling planet reflects our commitments. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_eight" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by : Colon, sex organs, venereal diseases.</li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#mars') }}" target="_blank" rel="noopener" title="know more about mars"> Mars</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#scorpio') }}" target="_blank" rel="noopener" title="know more about scorpio"> Scorpio</a>
								</li>
									
							</div>

							<div id="more_eight" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" height="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" height="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
										</div>
									</div>	

								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="ninth" ><br><br>
				<div>

					<h3>Ninth House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-wninth-medium active" id="home-btab" data-toggle="tab" href="#about_ninth" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-wninth-medium" id="profile-btab" data-toggle="tab" href="#spec_ninth" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-wninth-medium" id="contact-btab" data-toggle="tab" href="#more_ninth" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_ninth" class="tab-pane active">
									<h4 class="text-muted">Ninth House is known as the  “Bhagya Bhava”.</h4>
									<p>
										Ninth house is related to philosophy and travel. It represents education, knowledge, journeys, luck, fortune. The ruling planet reflects our travel. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_ninth" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by : Thighs, hip, buttocks, bones, hairs and back.</li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#jupiter') }}" target="_blank" rel="noopener" title="know more about jupiter"> Jupiter</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#sagittarius') }}" target="_blank" rel="noopener" title="know more about sagittarius"> Sagittarius</a>
								</li>
									
							</div>

							<div id="more_ninth" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" hninth="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" hninth="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
										</div>
									</div>	

								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="tenth" ><br><br>
				<div>

					<h3>Tenth House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-wtenth-medium active" id="home-btab" data-toggle="tab" href="#about_tenth" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-wtenth-medium" id="profile-btab" data-toggle="tab" href="#spec_tenth" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-wtenth-medium" id="contact-btab" data-toggle="tab" href="#more_tenth" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_tenth" class="tab-pane active">
									<h4 class="text-muted">Tenth House is known as the  “Karma Bhava”.</h4>
									<p>
										Tenth house is related to social status and Career . It represents the work, commerce, trade, business, success, fame, position in outer world. The ruling planet reflects career. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_tenth" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by : Gallbladder and the knees.</li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#saturn') }}" target="_blank" rel="noopener" title="know more about saturn"> Saturn</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#capricorn') }}" target="_blank" rel="noopener" title="know more about capricorn"> Capricorn</a>
								</li>
									
							</div>

							<div id="more_tenth" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" htenth="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" htenth="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
										</div>
									</div>	

								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="eleventh" ><br><br>
				<div>

					<h3>Eleventh House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weleventh-medium active" id="home-btab" data-toggle="tab" href="#about_eleventh" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weleventh-medium" id="profile-btab" data-toggle="tab" href="#spec_eleventh" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weleventh-medium" id="contact-btab" data-toggle="tab" href="#more_eleventh" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_eleventh" class="tab-pane active">
									<h4 class="text-muted">Eleventh House is known as the “Siddhi Bhava”.</h4>
									<p>
										Eleventh house is related to friendship and groups. It represents the friends, social circle, profit, gain and wish fulfillment. The ruling planet reflects organisations. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_eleventh" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by : Calves, circulation, legs, ankle.</li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#saturn') }}" target="_blank" rel="noopener" title="know more about saturn"> Saturn</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#aquarius') }}" target="_blank" rel="noopener" title="know more about Aquarius"> Aquarius</a>
								</li>
									
							</div>

							<div id="more_eleventh" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" heleventh="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" heleventh="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
										</div>
									</div>	

								</div>
							</div>

						</div>
					</div>
				</div>

				<br id="twelfth" ><br><br>
				<div>

					<h3>Twelfth House<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-wtwelfth-medium active" id="home-btab" data-toggle="tab" href="#about_twelfth" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-wtwelfth-medium" id="profile-btab" data-toggle="tab" href="#spec_twelfth" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-wtwelfth-medium" id="contact-btab" data-toggle="tab" href="#more_twelfth" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_twelfth" class="tab-pane active">
									<h4 class="text-muted">Twelfth House is known as the  “lopasthana”.</h4>
									<p>
										Twelfth house is related to guilt, waiting, end of a cycle. It represents the expenses, loss, poverty, discomfort, staying abroad. The ruling planet reflects our mind. The rising sign or Lagana <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="determines now">determines</a> the condition of persone and this is based upon horoscope.
									</p>
							</div>

							<div id="spec_twelfth" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Governed by :Eye, lymphatic system, feet.</li>
								<li>Rulling Planet : <a href="{{ url('/astrology/planets#jupiter') }}" target="_blank" rel="noopener" title="know more about jupiter"> Jupiter</a> </li>
								<li>Rulling Zodiac : <a href="{{ url('/astrology/signs#pisces') }}" target="_blank" rel="noopener" title="know more about pisces"> Pisces </a>
								</li>
									
							</div>

							<div id="more_twelfth" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" htwelfth="80px" alt="Daily Horoscope" />
											<h6 class="mb-2 my-2">
												Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
										</div>
									</div>	

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/other/icon.png') }}" width="80px" htwelfth="80px" alt="Book Astrologer" />
											<h6 class="mb-2 my-2">
												Explore your life
											</h6>
											
											<a href="{{ url('/astrologer/callbooking') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Astrologer</a><br/><br/>
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
				@include('frontend.astrology.sidebar.sidebar')
			</div>
			<!-- / SIDEBAR -->
		</div>
	</div>
</section>
<!-- /CONTENT -->

<!-- /CONTENT -->

@endsection
<!-- End Section -->