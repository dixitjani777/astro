<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','About Planets : 12 planets in solar system - Astroduniya')
@section('description','The planets is also called as Grahas. It have their own significance to affect the human life. It have the excellent power upon the entire world.')
@section('keywords','about planets, planets information, planets in astrology,  planets names, what are the 12 planets, what are the 9 planets, solar system planets, sun planet, mars planet, mercury planet,  rahu ketu')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="The Planets"; 
	$toolbar_title="About Planets";
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
					<img class="img-fluid" src="{{ asset('images/other/learn_planets.jpg') }}" width="840" height="500" alt="about astrology"><br/><br/>

					<div class="article-format">
						<p>
							The solar system consists of nine planets which rotate around the Sun. Planets have their own significance to affect the human life. It have the excellent power upon the entire world. The planets is also called as Grahas. Grahas were formed to destroy the devils and to establish belief in god. Planets act as "characters" in our soul, a demand that enforce human to act in a specific way. Position of the Sun and the Moon in twelve houses is definitive.
						</p>
						<p>
							Each planet has its specific role in the natal chart, and perform a specific power. <span class="styleColor font-weight-normal badge badge-pill badge-primary badge-soft fs--15">choose planet to explore.</span>
						</p>
					</div>
					
					<div>
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#sun') }}" rel="noopener">Sun</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#moon') }}" rel="noopener">Moon</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#mars') }}" rel="noopener">Mars</a>
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#mercury') }}" rel="noopener">Mercury</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#jupiter') }}" rel="noopener">Jupiter</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#venus') }}" rel="noopener">Venus</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#saturn') }}" rel="noopener">Saturn</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#uranus') }}" rel="noopener">Uranus</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#neptune') }}" rel="noopener">Neptune</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#pluto') }}" rel="noopener">Pluto</a>
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#rahu') }}" rel="noopener">Rahu</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#ketu') }}" rel="noopener">Ketu</a> 
				    </div>

				    
					<!-- Planet Shadow class = "planet_shadow" -->
					<br id="sun" ><br><br>
					<div>

						<h3>Sun<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_sun" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_sun" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_sun" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_sun" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/sun.png') }}" alt="sun">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Various Names of Sun : Aditya, Aruna, Bhanu, Dhinakara, Hell, Pusha, Ravi, Surya. <br/>The Sun is a “king of planets” as it rules royalty and the higher positions and It is largest among all planets.
											</p>
											
										</div>
									</div>
										<p>
											 It represents the actual core of a person, life force, pride, the father, male children and authority character. A strong Sun in horoscope indicates courage and the ability to motivate others. If Sun is weak in horoscope indicates the person lacks encouragement and the energy level is weak. <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Sun in your horoscope.
										</p>
								</div>

								<div id="spec_sun" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Sun : <a href="{{ url('/astrology/houses#fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a></li>
									<li>The Sun Rules over :<a href="{{ url('/astrology/signs#leo') }}" target="_blank" rel="noopener" title="know more about Leo"> Leo</a></li>
									<li>Ruling Numbers of the Sun : 1, 10, 19, 28</li>
									<li>Ruling Color of the Sun : Gold, yellow, copper, pink</li>
									<li>Ruling Day of the Sun : Sunday</li>
									<li>It stays in each zodiac for : One month</li>
										
								</div>

								<div id="more_sun" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Ruby" />
												<h6 class="mb-2 my-2">
													Ruby
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Ruby" />
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

					<br id="moon" ><br><br>
					<div>

						<h3>Moon<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_moon" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_moon" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_moon" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_moon" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/moon.png') }}" alt="moon">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Various Names of Moon : Amalendu, Chandra, Himanshu, Mayank, Shashi. <br/>The Moon is a “Queen of planets” as it is the second dignitary after Sun. It is the only planet rotate around Earth.
											</p>
											
										</div>
									</div>
										<p>
											 It represents the life patterns, minds and emotions, love, beauty, uncertainty, social sensibility. A strong Moon in horoscope indicates comfort and peace of mind in life. If Moon is weak in horoscope indicates the stress, depression, suicidal tendency and sad attitude.<a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Moon in your horoscope.
										</p>
								</div>

								<div id="spec_moon" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Moon : <a href="{{ url('/astrology/houses#fourth') }}" target="_blank" rel="noopener" title="know more about fourth house"> Fourth House</a></li>
									<li>The Moon Rules over :<a href="{{ url('/astrology/signs#cancer') }}" target="_blank" rel="noopener" title="know more about Cancer"> Cancer</a></li>
									<li>Ruling Numbers of the Moon : 2, 11, 20, 29</li>
									<li>Ruling Color of the Moon : White, silvery.</li>
									<li>Ruling Day of the Moon : Monday</li>
									<li>It stays in each zodiac for :  two and a half days</li>
										
								</div>

								<div id="more_moon" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Pearl" />
												<h6 class="mb-2 my-2">
													Pearl
												</h6>
												
												<a href="{{ url('/gemstones/order#pearl') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Chandra" />
												<h6 class="mb-2 my-2">
													Chandra Puja
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>
					
					<br id="mars" ><br><br>
					<div>

						<h3>Mars<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_mars" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_mars" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_mars" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_mars" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/mars.png') }}" alt="mars">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Various Names of Mars : Angaraka, Mangal, Sevvai, Kuja.<br/>The Mars plays very important role in marriage of a girl and boy to find Manglik Dosha. The horoscopes of both boy and girl are matched before finalizing the marriage.
											</p>
											
										</div>
									</div>
										<p>
											 It represents the power, aggression, technical abilities, sex organs, muscular system. A strong Mars in horoscope indicates independence, courage and confidence. If Mars is weak in horoscope indicates the lack of energy, the inability to work regularly.<a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Mars in your horoscope.
										</p>
								</div>

								<div id="spec_mars" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Mars : <a href="{{ url('/astrology/houses#first') }}" target="_blank" rel="noopener" title="know more about first house"> First House</a></li>
									<li>The Mars Rules over :<a href="{{ url('/astrology/signs#aries') }}" target="_blank" rel="noopener" title="know more about aries"> Aries</a></li>
									<li>Ruling Numbers of the Mars : 9, 18, 27, 36</li>
									<li>Ruling Color of the Mars : Red</li>
									<li>Ruling Day of the Mars : Tuesday</li>
									<li>It stays in each zodiac for :  fourty five days</li>
										
								</div>

								<div id="more_mars" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Red Coral" />
												<h6 class="mb-2 my-2">
													Red Coral
												</h6>
												
												<a href="{{ url('/gemstones/order#red_coral') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Mars" />
												<h6 class="mb-2 my-2">
													Mars Puja
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>

					<br id="mercury" ><br><br>
					<div>

						<h3>Mercury<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_mercury" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_mercury" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_mercury" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_mercury" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/mercury.png') }}" alt="mercury">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Various Names of Mercury : Budha, Hermes.<br/>The Mercury is the closest to the Sun. It is the messenger and associated with the power of words. 
											</p>
											
										</div>
									</div>
										<p>
											 It represents the good health, wealth, communication skill, sanity, business, sharp thinking and level of focus. A strong Mercury in horoscope indicates sharp thinking and success in professional life. If Mercury is weak in horoscope indicates the problems and struggling.<a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Mercury in your horoscope.
										</p>
								</div>

								<div id="spec_mercury" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Mercury : <a href="{{ url('/astrology/houses#third') }}" target="_blank" rel="noopener" title="know more about third house"> Third House</a> , <a href="{{ url('/astrology/houses#sixth') }}" target="_blank" rel="noopener" title="know more about sixth house"> Sixth House</a></li>
									<li>The Mercury Rules over :<a href="{{ url('/astrology/signs#gemini') }}" target="_blank" rel="noopener" title="know more about gemini"> Gemini</a> ,<a href="{{ url('/astrology/signs#virgo') }}" target="_blank" rel="noopener" title="know more about virgo"> Virgo</a></li>
									<li>Ruling Numbers of the Mercury : 5, 14, 23, 32</li>
									<li>Ruling Color of the Mercury : Green</li>
									<li>Ruling Day of the Mercury : Wednesday</li>
									<li>It stays in each zodiac for :  twenty five days</li>
										
								</div>

								<div id="more_mercury" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Emerald" />
												<h6 class="mb-2 my-2">
													Emerald
												</h6>
												
												<a href="{{ url('/gemstones/order#emerald') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Budha" />
												<h6 class="mb-2 my-2">
													Budha Puja
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>

					<br id="jupiter" ><br><br>
					<div>

						<h3>Jupiter<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_jupiter" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_jupiter" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_jupiter" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_jupiter" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/jupiter.png') }}" alt="jupiter">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Various Names of Jupiter : Guru, Brihaspati, Devaguru.<br/>The Jupiter is referred as the Planet of royalty. It is basically a kind and caring planet.
											</p>
											
										</div>
									</div>
										<p>
											 It represents the hope, faith, growth, wisdom, knowledge, broad mind, handsome personality, expansion and good fortune. A strong Jupiter in horoscope indicates happy married life. If Jupiter is weak in horoscope indicates the problematic married life.<a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Jupiter in your horoscope.
										</p>
								</div>

								<div id="spec_jupiter" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Jupiter : <a href="{{ url('/astrology/houses#ninth') }}" target="_blank" rel="noopener" title="know more about ninth house"> Ninth House</a></li>
									<li>The Jupiter Rules over :<a href="{{ url('/astrology/signs#sagittarius') }}" target="_blank" rel="noopener" title="know more about sagittarius"> Sagittarius</a></li>
									<li>Ruling Numbers of the Jupiter : 3, 12, 21, 30</li>
									<li>Ruling Color of the Jupiter : Yellow</li>
									<li>Ruling Day of the Jupiter : Thursday</li>
									<li>It stays in each zodiac for :  One year</li>
										
								</div>

								<div id="more_jupiter" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Yellow Sapphire" />
												<h6 class="mb-2 my-2">
													Yellow Sapphire
												</h6>
												
												<a href="{{ url('/gemstones/order#yellow_sapphire') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Guru" />
												<h6 class="mb-2 my-2">
													Guru Puja
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>

					<br id="venus" ><br><br>
					<div>

						<h3>Venus<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_venus" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_venus" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_venus" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_venus" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/venus.png') }}" alt="venus">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Various Names of Venus : Shukra, Lucifer, Hesperus.<br/>The Venus is the second farthest planet from the Sun. It is the brightest thing in the sky besides the Sun and Moon.
											</p>
											
										</div>
									</div>
										<p>
											 It represents the love, romance, sex, vehicles, luxuries, significator of art, vulgar character. A strong Venus in horoscope indicates romantic married life. If Venus is weak in horoscope indicates the failure in married life.<a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Venus in your horoscope.
										</p>
								</div>

								<div id="spec_venus" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Venus : <a href="{{ url('/astrology/houses#second') }}" target="_blank" rel="noopener" title="know more about second house"> Second House</a> , <a href="{{ url('/astrology/houses#seventh') }}" target="_blank" rel="noopener" title="know more about seventh house"> Seventh House</a></li>
									<li>The Venus Rules over :<a href="{{ url('/astrology/signs#taurus') }}" target="_blank" rel="noopener" title="know more about taurus"> Taurus</a> , <a href="{{ url('/astrology/signs#libra') }}" target="_blank" rel="noopener" title="know more about libra"> Libra</a></li>
									<li>Ruling Numbers of the Venus : 6, 15, 24, 33</li>
									<li>Ruling Color of the Venus : White</li>
									<li>Ruling Day of the Venus : Friday</li>
									<li>It stays in each zodiac for :  Twenty eight days</li>
										
								</div>

								<div id="more_venus" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Diamond" />
												<h6 class="mb-2 my-2">
													Diamond
												</h6>
												
												<a href="{{ url('/gemstones/order#yellow_sapphire') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Shukra" />
												<h6 class="mb-2 my-2">
													Shukra Puja
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>

					<br id="saturn" ><br><br>
					<div>

						<h3>Saturn<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_saturn" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_saturn" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_saturn" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_saturn" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/saturn.png') }}" alt="saturn">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Various Names of Saturn : Shani, Sanaischara, Yama.<br/>The Saturn is the second largest planet. In Astrology it is a planet of Justice. It gives you marks as per your Karma. 
											</p>
											
										</div>
									</div>
										<p>
											 It represents the disease, frustrations and delays, sorrow, destruction, poverty, death. A strong Saturn in horoscope indicates patience, hope and dedication. If Saturn is weak in horoscope indicates the hardship and poblems in life.<a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Saturn in your horoscope.
										</p>
								</div>

								<div id="spec_saturn" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Saturn : <a href="{{ url('/astrology/houses#tenth') }}" target="_blank" rel="noopener" title="know more about tenth house"> Tenth House</a>
									</li>
									<li>The Saturn Rules over :<a href="{{ url('/astrology/signs#capricorn') }}" target="_blank" rel="noopener" title="know more about capricorn"> Capricorn</a></li>
									<li>Ruling Numbers of the Saturn : 8, 17, 26, 35</li>
									<li>Ruling Color of the Saturn : Blue</li>
									<li>Ruling Day of the Saturn : Saturday</li>
									<li>It stays in each zodiac for :  Two and half years</li>
										
								</div>

								<div id="more_saturn" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Blue Sapphire" />
												<h6 class="mb-2 my-2">
													Blue Sapphire
												</h6>
												
												<a href="{{ url('/gemstones/order#blue_sapphire') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Shani" />
												<h6 class="mb-2 my-2">
													Shani Puja
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>

					<br id="uranus" ><br><br>
					<div>

						<h3>Uranus<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_uranus" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_uranus" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_uranus" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_uranus" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/uranus.png') }}" alt="uranus">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Various Names of Uranus : Dao Yurenat , Dao Maritayu, Georgium Sidus, Herschel.<br/>The Uranus is sometimes just barely visible with the unaided eye on a very clear night. It is fairly easy to spot with binoculars. It is the warring planet of awakening, change, and surprise.
											</p>
											
										</div>
									</div>
										<p>
											 It represents the revolution, openness, sudden changes, abnormal life patterns. A strong Uranus in horoscope indicates sudden change in life for the good. If Uranus is weak in horoscope indicates the sudden changes of residence, sudden change of finances for the bad.<a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Uranus in your horoscope.
										</p>
								</div>

								<div id="spec_uranus" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Uranus : <a href="{{ url('/astrology/houses#eleventh') }}" target="_blank" rel="noopener" title="know more about eleventh house"> Eleventh House</a>
									</li>
									<li>The Uranus Rules over :<a href="{{ url('/astrology/signs#aquarius') }}" target="_blank" rel="noopener" title="know more about aquarius"> Aquarius</a></li>
									<li>Ruling Numbers of the Uranus : 10, 19, 28, 37</li>
									<li>Ruling Color of the Uranus : Purple</li>
									<li>Ruling Day of the Uranus : Wednesday</li>
									<li>It stays in each zodiac for :  Six to seven years</li>
										
								</div>

								<div id="more_uranus" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Chrysocolla" />
												<h6 class="mb-2 my-2">
													Chrysocolla
												</h6>
												
												<a href="{{ url('/gemstones/order#chrysocolla') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Graha Shani" />
												<h6 class="mb-2 my-2">
													Graha Shani
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>

					<br id="neptune" ><br><br>
					<div>

						<h3>Neptune<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_neptune" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_neptune" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_neptune" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_neptune" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/neptune.png') }}" alt="neptune">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Various Names of Neptune : Poseidon, Janus, Oceanus.<br/>The Neptune is the eighth and farthest known planet from the Sun in the Solar System. It is dark, cold, and very windy.
											</p>
											
										</div>
									</div>
										<p>
											 It represents the Geniusity, dreams, hopes, beliefs, confusion. A strong Neptune in horoscope indicates kindness, something greater. If Neptune is weak in horoscope indicates the untruth events in life, associated with drugs and other mind-altering stuff.<a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Neptune in your horoscope.
										</p>
								</div>

								<div id="spec_neptune" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Neptune : <a href="{{ url('/astrology/houses#twelfth') }}" target="_blank" rel="noopener" title="know more about twelfth house"> 
									Twelfth House</a>
									</li>
									<li>The Neptune Rules over :<a href="{{ url('/astrology/signs#pisces') }}" target="_blank" rel="noopener" title="know more about pisces"> Pisces</a></li>
									<li>Ruling Numbers of the Neptune : 7, 16, 25</li>
									<li>Ruling Color of the Neptune : Green, white</li>
									<li>Ruling Day of the Neptune : Friday</li>
									<li>It stays in each zodiac for :  About fourteen years</li>
										
								</div>

								<div id="more_neptune" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Aquamarine" />
												<h6 class="mb-2 my-2">
													Aquamarine
												</h6>
												
												<a href="{{ url('/gemstones/order#chrysocolla') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Graha Shani" />
												<h6 class="mb-2 my-2">
													Graha Shani
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>

					<br id="pluto" ><br><br>
					<div>

						<h3>Pluto<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_pluto" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_pluto" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_pluto" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_pluto" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/pluto.png') }}" alt="pluto">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Pluto is also known as Number 134340.<br/>The pluto is extremely slow and odd. It is the furthest and tiniest planet of all.
											</p>
											
										</div>
									</div>
										<p>
											 It represents the control, confusion, abuse, death, destruction, wealth, sex, terrorism, danger, regeneration. A strong Pluto in horoscope indicates humility in life. If Pluto is weak in horoscope indicates the difficulty in life.<a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Pluto in your horoscope.
										</p>
								</div>

								<div id="spec_pluto" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Pluto : <a href="{{ url('/astrology/houses#eight') }}" target="_blank" rel="noopener" title="know more about eight house"> Eight House</a>
									</li>
									<li>The Pluto Rules over :<a href="{{ url('/astrology/signs#scorpio') }}" target="_blank" rel="noopener" title="know more about scorpio"> Scorpio</a></li>
									<li>Ruling Numbers of the Pluto : 10, 19, 28, 37</li>
									<li>Ruling Color of the Pluto : Dark Red, Metallic Black</li>
									<!-- <li>Ruling Day of the Pluto : Saturday</li> -->
									<li>It stays in each zodiac for :  about 15-25 years</li>
										
								</div>

								<div id="more_pluto" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Black Onyx" />
												<h6 class="mb-2 my-2">
													Black Onyx
												</h6>
												
												<a href="{{ url('/gemstones/order#black_onyx') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Graha Shani" />
												<h6 class="mb-2 my-2">
													Graha Shani
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>

					<br id="rahu" ><br><br>
					<div>

						<h3>Rahu<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_rahu" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_rahu" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_rahu" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_rahu" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/north-node.png') }}" alt="rahu">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Various Names of Rahu : North Node, Lunar node, Ascending Node, Chayagrahas.<br/>The Rahu have no physical shape. It is imaginary points in the sky. It is considered most powerful planet by our Rishis.
											</p>
											
										</div>
									</div>
										<p>
											 It represents the ambition, laziness, complication, uncultured behavior, gains, riches, strength. A strong Rahu in horoscope indicates victory over opposition. If Rahu is weak in horoscope indicates the dissatisfaction and imbalances in life.<a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Rahu in your horoscope.
										</p>
								</div>

								<div id="spec_rahu" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Rahu : <a href="{{ url('/astrology/houses#sixth') }}" target="_blank" rel="noopener" title="know more about sixth house"> 
									Sixth House</a>, <a href="{{ url('/astrology/houses#eleventh') }}" target="_blank" rel="noopener" title="know more about eleventh house"> 
									Eleventh House</a>
									</li>
									<li>The Rahu Rules over :<a href="{{ url('/astrology/signs#cancer') }}" target="_blank" rel="noopener" title="know more about cancer"> Cancer</a></li>
									
									<li>Ruling Color of the Rahu : Grey, black</li>
									<li>Ruling Day of the Rahu : Wednesday, Saturday</li>
									<li>It stays in each zodiac for :  About Eighteen years</li>
										
								</div>

								<div id="more_rahu" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Hessonite" />
												<h6 class="mb-2 my-2">
													Hessonite
												</h6>
												
												<a href="{{ url('/gemstones/order#hessonite') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Rahu Puja" />
												<h6 class="mb-2 my-2">
													Rahu Puja
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
										</div>																		
									</div>
								</div>

							</div>
						</div>
					</div>

					<br id="ketu" ><br><br>
					<div>

						<h3>Ketu<span class="text-muted"></span></h3>
						
						<div class="tabs nomargin-top">
							

							<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
								<li class="nav-item">
									<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_ketu" role="tab" aria-controls="home" aria-selected="true">
										About
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_ketu" role="tab" aria-controls="profile" aria-selected="false">
										Note
									</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_ketu" role="tab" aria-controls="contact" aria-selected="false">
										More
									</a>
								</li>
							</ul>
							<br>
							<div class="tab-content" id="myTabBorderedContent">
								<div id="about_ketu" class="tab-pane active">
									<div class="d-flex">
										<div class="text-primary">
											<img width="57" height="57" src="{{ asset('images/planets/south-node.png') }}" alt="rahu">
										</div>

										<div class="ml-4 mr-4">
											<p>
												Various Names of Ketu : South Node, Lunar node, Descending Node, Chayagrahas.<br/>The Ketu have no physical shape. It is imaginary points in the sky. It is considered most powerful planet by our Rishis.
											
										</div>
									</div>
										<p>
											 It represents the spiritual forces, wisdom, liberation, past life. A strong Southnode in horoscope indicates good spiritual powers. If Ketu is weak in horoscope indicates the doubts and critical vision in life.<a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now"> Observe</a> the conditions of Ketu in your horoscope.
										</p>
								</div>

								<div id="spec_ketu" class="tab-pane">
									<h5>Facts </h5>
									
									<li>Rulling House of the Ketu : <a href="{{ url('/astrology/houses#seventh') }}" target="_blank" rel="noopener" title="know more about seventh house"> 
									Seventh House</a>
									</li>
									<li>The Ketu Rules over :<a href="{{ url('/astrology/signs#scorpio') }}" target="_blank" rel="noopener" title="know more about scorpio"> Scorpio</a></li>
									
									<li>Ruling Color of the Ketu : Smokey Grey</li>
									<li>Ruling Day of the Ketu : Tuesday, Saturday</li>
									<li>It stays in each zodiac for :  one and half years</li>
										
								</div>

								<div id="more_ketu" class="tab-pane">
									<h5>Suggestion </h5>
									<div class="row">

										<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="cat’s eye" />
												<h6 class="mb-2 my-2">
													Cat’s Eye
												</h6>
												
												<a href="{{ url('/gemstones/order#cats_eye') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
											</div>
										</div>

										<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
											<div class="card-body bg-btlight"><br/>
												<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Ketu Puja" />
												<h6 class="mb-2 my-2">
													Ketu Puja
												</h6>
												
												<a href="{{ url('/gemstones/order#ruby') }}" class="btn btn-sm btn-red btn-soft fs--16">Book Puja</a><br/><br/>
											</div>
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

@endsection
<!-- End Section -->