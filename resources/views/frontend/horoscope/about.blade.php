<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','About Horoscope : What is Horoscope - Astroduniya')
@section('description','Predictions of Horoscope help you to explore your upcoming event. It always help you to identify actual reasons of your troubles in life.')
@section('keywords','About Horoscope, Zodiac Sign, Daily Horoscope, Predictions of Horoscope, all the zodiac signs, horoscope dates, horoscope by date of birth')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="About Horoscope"; 
	$toolbar_title="About Horoscope";
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
					<img class="img-fluid" src="{{ asset('images/other/about_horoscope.jpg') }}" width="840" alt="about astrology"><br/><br/>										
					<p>
						Horoscope is the prediction of your <a href="{{ url('/astrology/signs') }}" target="_blank" rel="noopener" title="about zodiac sign">zodiac sign</a>. Horoscope and Astrology is co-supportive to each other. In other words, horoscope prediction expresses about bad or good planet, but remedies for reducing influence of malefic planet are mentioned in astrology. Process to analyse native's horoscope is taken from astrology. Predictions of Horoscope help you to explore your upcoming event. It always help you to identify actual reasons of your troubles in life.
					</p>
				</div><br/>

				
				<div>	
					<h2>Horoscope Sign</h2><br/>
					<p>
						The position of the Sun at the time you were born, determines your Horoscope sign, also known as your <a href="{{ url('/astrology/signs') }}" target="_blank" rel="noopener" title="know more about signs"> zodiac sign</a>. Your zodiac sign impacts everything about you.
						In astrology, zodiac sign is the biggest influence on human life. Each zodiac sign represent its own set of strengths, challenges, relationships. <span class="font-weight-normal badge badge-pill badge-primary badge-soft fs--15 styleColor">choose zodiac to explore</span>.
					</p>
					
					<div class="row">
						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#aries') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/aries.png') }}" alt="aries" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Aries
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>Mar 21 to Apr 20</b>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#taurus') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/taurus.png') }}" alt="Taurus" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Taurus
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>Apr 21 to May 21</b>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#gemini') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/gemini.png') }}" alt="Gemini" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Gemini
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>May 22 to Jun 21</b>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#cancer') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/cancer.png') }}" alt="Cancer" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Cancer
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>Jun 22 to Jul 22</b>
									</p>
									</a>
								</div>
							</div>

						</div>

					</div>
					
					<div class="row">

						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#leo') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/leo.png') }}" alt="Leo" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Leo
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>Jul 23 to Aug 22</b>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#virgo') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/virgo.png') }}" alt="Virgo" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Virgo
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>Aug 23 to Sep 23</b>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#libra') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/libra.png') }}" alt="Libra" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Libra
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>Sep 24 to Oct 23</b>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#scorpio') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/scorpio.png') }}" alt="Scorpio" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Scorpio
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>Oct 24 to Nov 22</b>
									</p>
									</a>
								</div>
							</div>

						</div>
						
					</div>
					
					<div class="row">

						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#sagittarius') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/sagittarius.png') }}" alt="sagittarius" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Sagittarius
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>Nov 23 to Dec 21</b>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#capricorn') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/capricorn.png') }}" alt="Capricorn" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Capricorn
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>Dec 22 to Jan 20</b>
									</p>
									</a>
								</div>
							</div>

						</div>

						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#aquarius') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/aquarius.png') }}" alt="Aquarius" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Aquarius
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>Jan 21 to Feb 19</b>
									</p>
									</a>
								</div>
							</div>

						</div>
						
						<div class="col-6m col-lg-3">

							<div class="card h-100 mb-2 my-2 text-center bg-btlight">
								<div class="card-body">
									<a href="{{ url('/astrology/signs#pisces') }}">
									<img class="zodic_size2" src="{{ asset('images/zodiac_signs/png/pisces.png') }}" alt="Pisces" /><br/>
									<h5 class="clrlb text-muted font-weight-light">
										Pisces
									</h5>
									<p class="card-text cus_mar font-weight-light">
										<b>Feb 20 to Mar 20</b>
									</p>
									</a>
								</div>
							</div>

						</div>
											
					</div>

				</div><br/><br/>

				
				<div>	
					<h2>Read Daily Horoscope</h2><br/>
					<p>
						Horoscopes usually focus on the movements of the Moon, Mercury, Venus and Mars. Reading your daily horoscope empowers you to make the most of your cosmic blessings, while also helping you avoid any trouble.<span class="font-weight-normal badge badge-pill badge-primary badge-soft fs--15 styleColor"> choose your Sign to explore.</span>
					</p>


					<div class="row">
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#aries') }}"><i class="fa fa-caret-right"></i><span> Aries Daily Horoscope</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#taurus') }}"><i class="fa fa-caret-right"></i><span> Taurus Daily Horoscope</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#gemini') }}"><i class="fa fa-caret-right"></i><span> Gemini Daily Horoscope</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#cancer') }}"><i class="fa fa-caret-right"></i><span> Cancer Daily Horoscope</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#leo') }}"><i class="fa fa-caret-right"></i><span> Leo Daily Horoscope</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#virgo') }}"><i class="fa fa-caret-right"></i><span> Virgo Daily Horoscope</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#libra') }}"><i class="fa fa-caret-right"></i><span> Libra Daily Horoscope</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#scorpio') }}"><i class="fa fa-caret-right"></i><span> Scorpio Daily Horoscope</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#sagittarius') }}"><i class="fa fa-caret-right"></i><span> Sagittarius Daily Horoscope</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#capricorn') }}"><i class="fa fa-caret-right"></i><span> Capricorn Daily Horoscope</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#aquarius') }}"><i class="fa fa-caret-right"></i><span> Aquarius Daily Horoscope</span></a>
						</div>
						<div class="fa-hover col-md-4 col-sm-4">
							<a class="text-muted" href="{{ url('/horoscope/daily#pisces') }}"><i class="fa fa-caret-right"></i><span> Pisces Daily Horoscope</span></a>
						</div>
				    </div>

				</div><br/><br/>

				<div>	
				  <h2>More Horoscope</h2><br/>
				  <div class="row">
						
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/horoscope/minihreport') }}"><i class="fa fa-caret-right"></i><span> Horoscope Report</span></a>
					</div>
					
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/horoscope/minihreport') }}"><i class="fa fa-caret-right"></i><span> Daily Horoscope</span></a>
					</div>
					
					
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/astrologer/callbooking') }}"><i class="fa fa-caret-right"></i><span> Yearly Horoscope</span></a>
					</div>
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/horoscope/minimreport') }}"><i class="fa fa-caret-right"></i><span> Match-Making Report</span></a>
					</div>
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/horoscope/minimreport') }}"><i class="fa fa-caret-right"></i><span> Monthly Horoscope</span></a>
					</div>
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/astrologer/callbooking') }}"><i class="fa fa-caret-right"></i><span> Book Astrologer</span></a>
					</div>
				  </div>
				</div><br><br>

			</div>
			
			<!-- SIDEBAR -->
			<div class="col-lg-3 order-2 order-lg-2 mb-5">
				@include('frontend.horoscope.sidebar.sidebar')
			</div>
			<!-- / SIDEBAR -->

		</div>
	</div>
</section>

@endsection
<!-- End Section -->