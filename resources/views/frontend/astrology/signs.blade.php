<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','About Zodiac : 12 signs of zodiac - Astroduniya')
@section('description','The position of the Sun at the time you were born, determines your zodiac sign. Zodiac sign is the biggest influence on human life.')
@section('keywords','about zodiac, about zodiac signs, 12 signs of zodiac, Aries, Taurus, Gemini, Cancer, Leo, Virgo, Libra, Scorpio, Sagittarius, Capricorn, Aquarius, Pisces')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Sign of Zodiac"; 
	$toolbar_title="About Zodiac";
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
						The position of the Sun at the time you were born, determines your astrology sign, also known as your zodiac sign. Your zodiac sign impacts everything about you.
						In astrology, zodiac sign is the biggest influence on human life. Each zodiac sign represent its own set of strengths, challenges, relationships.     <span class="font-weight-normal badge badge-pill badge-primary badge-soft fs--15 styleColor">Choose your zodiac to explore.</span>
					</p> <br/>
				
					<div class="row">
						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#aries') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/aries.png') }}" alt="aries" /><br/>
									<h5 class="text-muted card-title">
										Aries
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>Mar 21 to Apr 20</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#taurus') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/taurus.png') }}" alt="Taurus" /><br/>
									<h5 class="text-muted card-title">
										Taurus
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>Apr 21 to May 21</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#gemini') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/gemini.png') }}" alt="Gemini" /><br/>
									<h5 class="text-muted card-title">
										Gemini
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>May 22 to Jun 21</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#cancer') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/cancer.png') }}" alt="Cancer" /><br/>
									<h5 class="text-muted card-title">
										Cancer
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>Jun 22 to Jul 22</span>
									</p>
									</a>
								</div>
							</div>

						</div>

					</div>
					
					<div class="row">

						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#leo') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/leo.png') }}" alt="Leo" /><br/>
									<h5 class="text-muted card-title">
										Leo
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>Jul 23 to Aug 22</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#virgo') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/virgo.png') }}" alt="Virgo" /><br/>
									<h5 class="text-muted card-title">
										Virgo
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>Aug 23 to Sep 23</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#libra') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/libra.png') }}" alt="Libra" /><br/>
									<h5 class="text-muted card-title">
										Libra
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>Sep 24 to Oct 23</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#scorpio') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/scorpio.png') }}" alt="Scorpio" /><br/>
									<h5 class="text-muted card-title">
										Scorpio
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>Oct 24 to Nov 22</span>
									</p>
									</a>
								</div>
							</div>

						</div>
						
					</div>
					
					<div class="row">

						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#sagittarius') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/sagittarius.png') }}" alt="sagittarius" /><br/>
									<h5 class="text-muted card-title">
										Sagittarius
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>Nov 23 to Dec 21</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#capricorn') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/capricorn.png') }}" alt="Capricorn" /><br/>
									<h5 class="text-muted card-title">
										Capricorn
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>Dec 22 to Jan 20</span>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#aquarius') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/aquarius.png') }}" alt="Aquarius" /><br/>
									<h5 class="text-muted card-title">
										Aquarius
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>Jan 21 to Feb 19</span>
									</p>
									</a>
								</div>
							</div>

						</div>
						
						<div class="col-6m col-lg-3">

							<div class="card bg-btlight bw--2 text-center">
								<div class="card-body my-2 mb-2">
									<a href="{{ url('/astrology/signs#pisces') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/pisces.png') }}" alt="Pisces" /><br/>
									<h5 class="text-muted card-title">
										Pisces
									</h5>
									<p class="card-text cus_mar font-weight-normal">
										<span>Feb 20 to Mar 20</span>
									</p>
									</a>
								</div>
							</div>

						</div>
											
					</div>
					
				</div>

				
				<br id="aries" ><br><br>
				<div>

					<h3>Aries (Mesh)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_aries" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_aries" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_aries" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_aries" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/aries.png') }}" alt="ariess">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Aries is indicated by a Ram.
										</p>
										
									</div>
								</div>
									<p>
										 Aries born people believe in action. They are full of energetic with fighting spirit to accept the challenges in life. This types of people find difficulty to be employee. They are natural-born leaders and their natural instinct is to be the employer. They see life as a contest, a contest they are determined to win. They are usually short tempered and impatient in nature. Extra positive or negative conclusions can be classify after  <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Mars, Sun and Jupiter in the chart.
									</p>
							</div>

							<div id="spec_aries" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Aries Date :  March 21 - April 20</li>
								<li>Positive character of Aries : Energetic, Honest, Confident, Enterprising</li>
								<li>Negative character of Aries : Moody, Aggressive, Selfish, Impatient</li>
								<li>Rulling House of the Aries : <a href="{{ url('/astrology/houses#first') }}" target="_blank" rel="noopener" title="know more about first house"> First House</a>
								</li>
								<li>The Aries Ruling planet :<a href="{{ url('/astrology/planets#mars') }}" target="_blank" rel="noopener" title="know more about mars"> Mars</a></li>
								<li>Lucky Numbers of the Aries : 1, 6, 7, 9</li>
								<li>Lucky Color of the Aries : Red</li>
								<li>Lucky Day of the Aries : Tuesday</li>
									
							</div>

							<div id="more_aries" class="tab-pane">
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
											<img src="{{ asset('images/zodiac_signs/png/aries.png') }}" width="80px" height="80px" alt="aries" />
											<h6 class="mb-2 my-2">
												Aries - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#aries') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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

				<br id="taurus" ><br><br>
				<div>

					<h3>Taurus (Vrishabha)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_taurus" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_taurus" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_taurus" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_taurus" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/taurus.png') }}" alt="taurus">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Taurus is indicated by a Bull.
										</p>
										
									</div>
								</div>
									<p>
										 Taurus born people are sensible and successful. They are straight forward, reliable, honest that make them stand out as one charming integrity. Taurus is also known for being stubborn. This types of people never gives up and always holds their topic even when they're wrong. Extra positive or negative conclusions can be classify after  <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Venus and Mercury in the chart.
									</p>
							</div>

							<div id="spec_taurus" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Taurus Date : April 21 - May 21</li>
								<li>Positive character of Taurus : Trusty, Stable, Patient, Warm-hearted</li>
								<li>Negative character of Taurus : Stubborn, Selfish, Greedy, Inflexible </li>
								<li>Rulling House of the Taurus : <a href="{{ url('/astrology/houses#second') }}" target="_blank" rel="noopener" title="know more about second house"> Second House</a>
								</li>
								<li>The Taurus Ruling planet :<a href="{{ url('/astrology/planets#venus') }}" target="_blank" rel="noopener" title="know more about Venus"> Venus</a></li>
								<li>Lucky Numbers of the Taurus : 1, 6, 9</li>
								<li>Lucky Color of the Taurus : Green, Blue</li>
								<li>Lucky Day of the Taurus : Friday</li>
									
							</div>

							<div id="more_taurus" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Diamond" />
											<h6 class="mb-2 my-2">
												Diamond
											</h6>
											
											<a href="{{ url('/gemstones/order#diamond') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
										</div>
									</div>

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/taurus.png') }}" width="80px" height="80px" alt="taurus" />
											<h6 class="mb-2 my-2">
												Taurus - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#taurus') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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

				<br id="gemini" ><br><br>
				<div>

					<h3>Gemini (Mithun)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_gemini" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_gemini" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_gemini" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_gemini" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/gemini.png') }}" alt="gemini">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Gemini is indicated by a Twins.
										</p>
										
									</div>
								</div>
									<p>
										 Gemini born people are Mentally strong. They are natural communicators, flexible, adaptable, entertaining. Gemini is also known for being stubborn. These types of people can be found to be doing two things at once. These types of people enjoy work with variety. Their desire is to get respect from others. Extra positive or negative conclusions can be classify after  <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Venus, Mercury and Saturn in the chart.
									</p>
							</div>

							<div id="spec_gemini" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Gemini Date : May 22 - June 21</li>
								<li>Positive character of Gemini : gentle, flexible, polite, energetic</li>
								<li>Negative character of Gemini : nervous, unstable, inconsistent, cunning</li>
								<li>Rulling House of the Gemini : <a href="{{ url('/astrology/houses#third') }}" target="_blank" rel="noopener" title="know more about third house"> Third House</a>
								</li>
								<li>The Gemini Ruling planet :<a href="{{ url('/astrology/planets#mercury') }}" target="_blank" rel="noopener" title="know more about mercury"> Mercury</a></li>
								<li>Lucky Numbers of the Gemini : 3, 4, 5</li>
								<li>Lucky Color of the Gemini : gray, silver, black, white</li>
								<li>Lucky Day of the Gemini : wednesday</li>
									
							</div>

							<div id="more_gemini" class="tab-pane">
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
											<img src="{{ asset('images/zodiac_signs/png/gemini.png') }}" width="80px" height="80px" alt="gemini" />
											<h6 class="mb-2 my-2">
												Gemini - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#gemini') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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

				<br id="cancer" ><br><br>
				<div>

					<h3>Cancer (Kark)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_cancer" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_cancer" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_cancer" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_cancer" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/cancer.png') }}" alt="cancer">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Cancer is indicated by a Crab.
										</p>
										
									</div>
								</div>
									<p>
										 Cancer born people are a very kind and delicate heart. They are sensitive, conservative, imaginative and slow workers. They respond to life through their emotions rather than their mind. These types of people are water lovers and they love natural scenery. These types of people suffer from mood swinging and take help from some one to take decisions in life. Extra positive or negative conclusions can be classify after  <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Mars and Jupiter in the chart.
									</p>
							</div>

							<div id="spec_cancer" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Cancer Date : June 22 - July 22</li>
								<li>Positive character of Cancer : Loyal, emotional, imaginative, forceful</li>
								<li>Negative character of Cancer : Moody, insecure, sentimental, over emotional</li>
								<li>Rulling House of the Cancer : <a href="{{ url('/astrology/houses#fourth') }}" target="_blank" rel="noopener" title="know more about fourth house"> Fourth House</a>
								</li>
								<li>The Cancer Ruling planet :<a href="{{ url('/astrology/planets#moon') }}" target="_blank" rel="noopener" title="know more about moon"> Moon</a></li>
								<li>Lucky Numbers of the Cancer : 2, 3, 8</li>
								<li>Lucky Color of the Cancer : Silver and White</li>
								<li>Lucky Day of the Cancer : Friday</li>
									
							</div>

							<div id="more_cancer" class="tab-pane">
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
											<img src="{{ asset('images/zodiac_signs/png/cancer.png') }}" width="80px" height="80px" alt="cancer" />
											<h6 class="mb-2 my-2">
												Cancer - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#cancer') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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

				<br id="leo" ><br><br>
				<div>

					<h3>Leo (Simha)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_leo" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_leo" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_leo" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_leo" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/leo.png') }}" alt="leo">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Leo is indicated by a Lion.
										</p>
										
									</div>
								</div>
									<p>
										 Leo born people are a very courageous. They are born with leadership qualities and have magnetic power of attraction. They are Full of confidence, hard worker, helpful and loyal.  These types of people may not admit their mistakes easily. Extra positive or negative conclusions can be classify after  <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Mars and Jupiter in the chart.
									</p>
							</div>

							<div id="spec_leo" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Leo Date : July 23 - August 22</li>
								<li>Positive character of Leo : Comic, creative, Leadership, Enthusiasm </li>
								<li>Negative character of Leo : Arrogant, lazy, False pride, Overbearing</li>
								<li>Rulling House of the Leo : <a href="{{ url('/astrology/houses#Fifth') }}" target="_blank" rel="noopener" title="know more about fifth house"> Fifth House</a>
								</li>
								<li>The Leo Ruling planet :<a href="{{ url('/astrology/planets#sun') }}" target="_blank" rel="noopener" title="know more about sun"> Sun</a></li>
								<li>Lucky Numbers of the Leo : 1, 5, 9</li>
								<li>Lucky Color of the Leo : Golden and yellow</li>
								<li>Lucky Day of the Leo : Sunday</li>
									
							</div>

							<div id="more_leo" class="tab-pane">
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
											<img src="{{ asset('images/zodiac_signs/png/leo.png') }}" width="80px" height="80px" alt="leo" />
											<h6 class="mb-2 my-2">
												Leo - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#leo') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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
				
				<br id="virgo" ><br><br>
				<div>

					<h3>Virgo (Kanya)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_virgo" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_virgo" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_virgo" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_virgo" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/virgo.png') }}" alt="virgo">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Virgo is indicated by a Virgin.
										</p>
										
									</div>
								</div>
									<p>
										 Virgo born people are active, strong minded. Smiling is a peculiar sign of their nature. They are diplomatic, practical, intelligent, talkative. They are lazy and lethargic by nature. Virgo can be one of the most difficult mates to "land". Virgo's perfectionism can sometimes be negative, and it can lead them to become too critical of others. Extra positive or negative conclusions can be classify after <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Mars and Jupiter in the chart.
									</p>
							</div>

							<div id="spec_virgo" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Virgo Date : August 23 - September 23</li>
								<li>Positive character of Virgo : Kind, dedicated, modest, analytical</li>
								<li>Negative character of Virgo : Shyness, worry, fussy, over-Critical</li>
								<li>Rulling House of the Virgo : <a href="{{ url('/astrology/houses#sixth') }}" target="_blank" rel="noopener" title="know more about sixth house"> Sixth House</a>
								</li>
								<li>The Virgo Ruling planet :<a href="{{ url('/astrology/planets#mercury') }}" target="_blank" rel="noopener" title="know more about mercury"> Mercury</a></li>
								<li>Lucky Numbers of the Virgo : 4, 5, 8</li>
								<li>Lucky Color of the Virgo : Blue, Gray, Brown, Green</li>
								<li>Lucky Day of the Virgo : Wednesday</li>
									
							</div>

							<div id="more_virgo" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="sapphire" />
											<h6 class="mb-2 my-2">
												Sapphire
											</h6>
											
											<a href="{{ url('/gemstones/order#sapphire') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
										</div>
									</div>

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/virgo.png') }}" width="80px" height="80px" alt="virgo" />
											<h6 class="mb-2 my-2">
												Virgo - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#virgo') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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

				<br id="libra" ><br><br>
				<div>

					<h3>Libra (Tula)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_libra" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_libra" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_libra" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_libra" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/libra.png') }}" alt="libra">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Libra is indicated by a Scales.
										</p>
										
									</div>
								</div>
									<p>
										Libra born people are logical with their nature and are dominated by balance. They are sensitive, curious, gentle, critical, good in concept. These types of people speak less but believe more in action. Librans dislike injustice but many times fail to apply these feelings to themselves. They may not get help of their friends at the time of need. Extra positive or negative conclusions can be classify after  <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Saturn and Mercury in the chart.
									</p>
							</div>

							<div id="spec_libra" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Libra Date : September 24 - October 23</li>
								<li>Positive character of Libra : Social, diplomatic, balanced, justice lover</li>
								<li>Negative character of Libra : Unsure, self-pity, indecisive, changeable</li>
								<li>Rulling House of the Libra : <a href="{{ url('/astrology/houses#seventh') }}" target="_blank" rel="noopener" title="know more about seventh house"> Seventh House</a>
								</li>
								<li>The Libra Ruling planet :<a href="{{ url('/astrology/planets#venus') }}" target="_blank" rel="noopener" title="know more about venus"> Venus</a></li>
								<li>Lucky Numbers of the Libra : 6, 9</li>
								<li>Lucky Color of the Libra : Blue</li>
								<li>Lucky Day of the Libra : Friday</li>
									
							</div>

							<div id="more_libra" class="tab-pane">
								<h5>Suggestion </h5>
								<div class="row">

									<div class="col-md-4 card  h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/planets/sun.png') }}" width="80px" height="80px" alt="Sapphire" />
											<h6 class="mb-2 my-2">
												Sapphire
											</h6>
											
											<a href="{{ url('/gemstones/order#sapphire') }}" class="btn btn-sm btn-red btn-soft fs--16">Buy Gemstone</a><br/><br/>
										</div>
									</div>

									<div class="col-md-4 card h-100 bl-0 br-0 bb-0 bw--2 text-center">
										<div class="card-body bg-btlight"><br/>
											<img src="{{ asset('images/zodiac_signs/png/libra.png') }}" width="80px" height="80px" alt="libra" />
											<h6 class="mb-2 my-2">
												Libra - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#libra') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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

				<br id="scorpio" ><br><br>
				<div>

					<h3>Scorpio (Vrishchik)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_scorpio" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_scorpio" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_scorpio" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_scorpio" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/scorpio.png') }}" alt="scorpio">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Scorpio is indicated by a Scorpion.
										</p>
										
									</div>
								</div>
									<p>
										Scorpio born people are quite serious in nature mixed with a combination of jealousy. They are honest, trustworthy, truthful, sincere, self-confident and courageous. They are also successful in business. They sometimes harm their health by addictions. The more sensitive Scorpio may have a tendency to lose their composure. Extra positive or negative conclusions can be classify after  <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Mars and Pluto in the chart.
									</p>
							</div>

							<div id="spec_scorpio" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Scorpio Date : October 24 - November 22</li>
								<li>Positive character of Scorpio : Brave, passionate, magnetic, determined</li>
								<li>Negative character of Scorpio : Jealous, violent, secretive, possessiveness </li>
								<li>Rulling House of the Scorpio : <a href="{{ url('/astrology/houses#eight') }}" target="_blank" rel="noopener" title="know more about eight house"> Eight House</a>
								</li>
								<li>The Scorpio Ruling planet :<a href="{{ url('/astrology/planets#pluto') }}" target="_blank" rel="noopener" title="know more about pluto"> Pluto</a></li>
								<li>Lucky Numbers of the Scorpio : 3, 5, 9</li>
								<li>Lucky Color of the Scorpio : Red</li>
								<li>Lucky Day of the Scorpio : Tuesday</li>
									
							</div>

							<div id="more_scorpio" class="tab-pane">
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
											<img src="{{ asset('images/zodiac_signs/png/scorpio.png') }}" width="80px" height="80px" alt="scorpio" />
											<h6 class="mb-2 my-2">
												Scorpio - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#scorpio') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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

				<br id="sagittarius" ><br><br>
				<div>

					<h3>Sagittarius (Dhanu)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_sagittarius" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_sagittarius" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_sagittarius" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_sagittarius" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/sagitarius.png') }}" alt="sagittarius">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Sagittarius is indicated by an arrow.
										</p>
										
									</div>
								</div>
									<p>
										Sagittarius born people are men of principle, following their religion. They are  enterprising, logical, leaders, modest, independent. These types of people obtain their goals in life.They are forward looking even in difficult days. Extra positive or negative conclusions can be classify after  <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Jupiter and Pluto in the chart.
									</p>
							</div>

							<div id="spec_sagittarius" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Sagittarius Date : November 23 - December 21</li>
								<li>Positive character of Sagittarius : Helpful, romantic, generous, straightforward</li>
								<li>Negative character of Sagittarius : Impatient, aloof, restless, over confidence </li>
								<li>Rulling House of the Sagittarius : <a href="{{ url('/astrology/houses#ninth') }}" target="_blank" rel="noopener" title="know more about ninth house"> Ninth House</a>
								</li>
								<li>The Sagittarius Ruling planet :<a href="{{ url('/astrology/planets#jupiter') }}" target="_blank" rel="noopener" title="know more about jupiter"> Jupiter</a></li>
								<li>Lucky Numbers of the Sagittarius : 3, 9</li>
								<li>Lucky Color of the Sagittarius : Purple, royal blue</li>
								<li>Lucky Day of the Sagittarius : Thursday</li>
									
							</div>

							<div id="more_sagittarius" class="tab-pane">
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
											<img src="{{ asset('images/zodiac_signs/png/sagittarius.png') }}" width="80px" height="80px" alt="sagittarius" />
											<h6 class="mb-2 my-2">
												Sagittarius - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#sagittarius') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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

				<br id="capricorn" ><br><br>
				<div>

					<h3>Capricorn (Makar)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_capricorn" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_capricorn" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_capricorn" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_capricorn" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/capricorn.png') }}" alt="capricorn">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Capricorn is indicated by a Goat.
										</p>
										
									</div>
								</div>
									<p>
										Capricorn is one of the strongest and most enduring of all the Signs. Capricorn born people are  are stable and serious in nature. They are  resourceful , disciplined and very calm. These types of people have an ordinary childhood but achieved success in later part of life. They are always remain worried and tense. Extra positive or negative conclusions can be classify after  <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Venus and Mercury in the chart.
									</p>
							</div>

							<div id="spec_capricorn" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Capricorn Date :  December 22 - January 20</li>
								<li>Positive character of Capricorn : Sincere, liable, economy, justice </li>
								<li>Negative character of Capricorn : Unkind, rude, pride, unforgiveness</li>
								<li>Rulling House of the Capricorn : <a href="{{ url('/astrology/houses#tenth') }}" target="_blank" rel="noopener" title="know more about tenth house"> Tenth House</a>
								</li>
								<li>The Capricorn Ruling planet :<a href="{{ url('/astrology/planets#saturn') }}" target="_blank" rel="noopener" title="know more about saturn"> Saturn</a></li>
								<li>Lucky Numbers of the Capricorn : 3, 7, 8</li>
								<li>Lucky Color of the Capricorn : Dark green and blue</li>
								<li>Lucky Day of the Capricorn : Saturday</li>
									
							</div>

							<div id="more_capricorn" class="tab-pane">
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
											<img src="{{ asset('images/zodiac_signs/png/capricorn.png') }}" width="80px" height="80px" alt="capricorn" />
											<h6 class="mb-2 my-2">
												Capricorn - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#capricorn') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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

				<br id="aquarius" ><br><br>
				<div>

					<h3>Aquarius (Kumbh)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_aquarius" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_aquarius" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_aquarius" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_aquarius" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/aquarius.png') }}" alt="aquarius">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Aquarius is indicated by a Water Bearers.
										</p>
										
									</div>
								</div>
									<p>
										Aquarius born people are hard to define in personality as it frequently changes. They are peace loving and intelligent and have independent creative viewpoints. These types of people are over reactive regarding temperament. They are able to learn things easily. Hard days in the life may not be ruled out. Extra positive or negative conclusions can be classify after  <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Venus and Saturn in the chart.
									</p>
							</div>

							<div id="spec_aquarius" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Aquarius Date : January 21 - February 19</li>
								<li>Positive character of Aquarius : Modern, original, idealism, progressiveness</li>
								<li>Negative character of Aquarius : Impractical, aloof, irritable, stubborn</li>
								<li>Rulling House of the Aquarius : <a href="{{ url('/astrology/houses#eleventh') }}" target="_blank" rel="noopener" title="know more about eleventh house"> Eleventh House</a>
								</li>
								<li>The Aquarius Ruling planet :<a href="{{ url('/astrology/planets#uranus') }}" target="_blank" rel="noopener" title="know more about uranus"> Uranus</a></li>
								<li>Lucky Numbers of the Aquarius : 4, 8</li>
								<li>Lucky Color of the Aquarius : Red and blue</li>
								<li>Lucky Day of the Aquarius : Wednesday</li>
									
							</div>

							<div id="more_aquarius" class="tab-pane">
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
											<img src="{{ asset('images/zodiac_signs/png/aquarius.png') }}" width="80px" height="80px" alt="aquarius" />
											<h6 class="mb-2 my-2">
												Aquarius - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#aquarius') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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

				<br id="pisces" ><br><br>
				<div>

					<h3>Pisces (Meen)<span class="text-muted"></span></h3>
					
					<div class="tabs nomargin-top">
						

						<ul class="nav nav-tabs nav-tabs-border-bottom" id="myTabBordered" role="tablist">
							<li class="nav-item">
								<a class="nav-link font-weight-medium active" id="home-btab" data-toggle="tab" href="#about_pisces" role="tab" aria-controls="home" aria-selected="true">
									About
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="profile-btab" data-toggle="tab" href="#spec_pisces" role="tab" aria-controls="profile" aria-selected="false">
									Note
								</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link font-weight-medium" id="contact-btab" data-toggle="tab" href="#more_pisces" role="tab" aria-controls="contact" aria-selected="false">
									More
								</a>
							</li>
						</ul>
						<br>
						<div class="tab-content" id="myTabBorderedContent">
							<div id="about_pisces" class="tab-pane active">
								<div class="d-flex">
									<div class="text-primary">
										<img src="{{ asset('images/zodiac_signs/2/pisces.png') }}" alt="pisces">
									</div>

									<div class="ml-4 mr-4">
										<p>
											Pisces is indicated by a Fish.
										</p>
										
									</div>
								</div>
									<p>
										Pisces born people are the gentle souls of the cosmos, who share a deep spiritual connection to the universe. They face dangers in early life. They are emotional, calm and cool by nature, practical, franktruthfulness, innocence, logical. They commonly become popular because of their easygoing nature. These types of people will be one of the first to help you when you are down. They are active in charities that help those in need. Extra positive or negative conclusions can be classify after  <a href="{{ url('/astrologer/callbooking') }}" target="_blank" rel="noopener" title="observe now">observing</a> the placement of other planets like Moon and Neptune in the chart.
									</p>
							</div>

							<div id="spec_pisces" class="tab-pane">
								<h5>Facts </h5>
								
								<li>Pisces Date : February 20 - March 20</li>
								<li>Positive character of Pisces : Kindhearted, wise, inspiration, universal lover </li>
								<li>Negative character of Pisces : Fearful, sad, confusion, secretiveness </li>
								<li>Rulling House of the Pisces : <a href="{{ url('/astrology/houses#twelfth') }}" target="_blank" rel="noopener" title="know more about twelfth house"> Twelfth House</a>
								</li>
								<li>The Pisces Ruling planet :<a href="{{ url('/astrology/planets#neptune') }}" target="_blank" rel="noopener" title="know more about neptune"> Neptune</a></li>
								<li>Lucky Numbers of the Pisces : 5, 7, 8</li>
								<li>Lucky Color of the Pisces : Green</li>
								<li>Lucky Day of the Pisces : Friday</li>
									
							</div>

							<div id="more_pisces" class="tab-pane">
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
											<img src="{{ asset('images/zodiac_signs/png/pisces.png') }}" width="80px" height="80px" alt="pisces" />
											<h6 class="mb-2 my-2">
												Pisces - Daily Horoscope
											</h6>
											
											<a href="{{ url('/horoscope/daily#pisces') }}" class="btn btn-sm btn-red btn-soft fs--16">Read Now</a><br/><br/>
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
			</div>
			

			<!-- SIDEBAR -->
			<div class="col-lg-3 order-2 order-lg-2 mb-5">
				@include('frontend.astrology.sidebar.sidebar')
			</div>
			<!-- (SIDEBAR -->

		</div>
	</div>
</section>

<!-- /CONTENT -->

@endsection
<!-- End Section -->