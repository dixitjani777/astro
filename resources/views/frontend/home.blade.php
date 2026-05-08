<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Free Astrology, Daily Horoscope, Book Panditji - Astroduniya')
@section('description','Astroduniya provide services of free astrology, daily horoscope, book astrologer, book Panditji, buy gemstones. Top quality astrologer, Panditji')
@section('keywords','free astrology, astrologer, astrology today, book astrologer, astrology online, daily horoscope, horoscope today, horoscope 2020, horoscope matching, book panditji, buy gemstones, gemstones online, astrologer near me')
<!-- End of layout, title, description, keywords -->

<!-- Start Section -->
@section('content')

@include('frontend.layouts.slider')

<!-- info ba r-->
<section id="infbr" class="p-0 info-bar info-bar-clean">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="{{ asset('images/infobar/checked.png')}}" class="info_img" alt="expert astrologer">
				<h1 class="letter-spacing-03 font-weight-medium fs--20"><b>BEST ASTROLOGERS</b></h1>
				<p class="letter-spacing-1 m-0"><b class="info_sub_clr">Highly experience</b></p>
			</div>

			<div class="col-md-3">
				<img src="{{ asset('images/infobar/checked.png')}}" class="info_img" alt="panditji">
				<h1 class="letter-spacing-03 font-weight-medium fs--20"><b>SKILLFUL PANDITJI</b></h1>
				<p class="letter-spacing-1 m-0"><b class="info_sub_clr">Quality bhudev</b></p>
			</div>

			<div class="col-md-3">
				<img src="{{ asset('images/infobar/checked.png')}}" class="info_img" alt="online support">
				<h1 class="letter-spacing-03 font-weight-medium fs--20"><b>ONLINE SUPPORT</b></h1>
				<p class="letter-spacing-1 m-0"><b class="info_sub_clr">Professional team</b></p>
			</div>

			<div class="col-md-3">
				<img src="{{ asset('images/infobar/checked.png')}}" class="info_img" alt="secure payment">
				<h1 class="letter-spacing-03 font-weight-medium fs--20"><b>SECURE PAYMENTS</b></h1>
				<p class="letter-spacing-1 m-0"><b class="info_sub_clr">Advance security</b></p>
			</div>
		</div>
	</div>

</section>
<!-- /info bar -->

<!-- about astrology  style="background-image: url(../images/other/bgvb.png);"-->
<section id="section_about" class="bg-elight">
	<div class="container">

		<!-- Baremetal -->
		<div class="row d-flex flex-wrap align-items-center">

			<div class="order-1 order-md-1 col-12 col-md-6 mb-5">
				<div class="max-w-600 mx-auto mb-4">
					<!-- <hr class="h--1 bg-primary w--50"> -->

					<h2 class="h1 font-weight-medium clrvb">
						About Astrology
					</h2>
					<span class="sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft font-weight-normal pl-2 pr-2 pt--6 pb--6 mb-2">
						It is a finger pointing at reality.
					</span>
						<!-- <p class="sub_heading letter-spacing-1">It is a finger pointing at reality.</p> -->
				</div>



				<p>
					Astrology is an spiritual science and early culture which says that the quality and fortune of human depend on the situation of the planets at the time of birth. It is guiding thread which help you to upgrade the quality of life. It helps you to make best decisions in life and allows logical changes of every individual in order to upgrade the quality of life. It helps you to analyze what expects us in the future and what is best time to take action to achieve your target.
				</p>
				<a href="{{ url('astrology/about')}}">Read more</a>
				<hr class="cus">

				<ul class="list-group list-group-flush rounded overflow-hidden text-muted">
					<li><i class="styleColor fi fi-arrow-right-full"></i> &nbsp;It makes you better person.</li>
					<li><i class="styleColor fi fi-arrow-right-full"></i> &nbsp;It help you to make a happy work life.</li>
					<li><i class="styleColor fi fi-arrow-right-full"></i> &nbsp;It tell you to move with changing of times.</li>
					<li><i class="styleColor fi fi-arrow-right-full"></i> &nbsp;It tell your real strength and weaknesse.</li>
					<li><i class="styleColor fi fi-arrow-right-full"></i> &nbsp;It is not superstition, it is mathematicsand.</li>
					<br/>
				</ul>

				<!-- <a href="{{ url('astrology/about')}}" class="btn btn-sm btn-warning">
					Read more
				</a> -->

			</div>

			<div class="order-2 order-md-2 col-12 col-md-6 mb-5">
				<br/>
				<div class="stretch-end py-5 rounded-xl bg-light bg-cover lazy" style="background-image:url('images/other/find.jpg')">
					<img class="w-100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAKCAQAAADxnt1TAAAAEUlEQVR42mNkIBowjiodaKUACusAC4zze1kAAAAASUVORK5CYII=" alt="...">
				</div>	<br/>
				<div class="row stretch-end">
		            <div class="col-12 col-md-7">
		                <h4 class="m-0 font-weight-medium clrvb"><b>Find Right Path of Life.</b></h4>
		                <p class="m-0 letter-spacing-1">Our astrologer are here for you.</p>
		            </div>

		            <div class="col-12 mt-4 d-block d-md-none"><!-- mobile spacer --></div>

		            <div class="col-12 col-md-3 text-align-end text-center-xs">
		                <a href="{{ url('/query')}}" class="btn btn-sm btn-warning">Ask free query</a>
		            </div>
		        </div>
			</div>



		</div>
		<!-- Baremetal -->

	</div>
	<!-- <svg class="absolute-full z-index-0" width="100%" height="100%" viewBox="0 0 1920 90" preserveAspectRatio="none">
		<path fill="rgba(0,0,0,.01)" d="M1920,0C1217,0,120.574,155.567,0,0v90h1920V0z"></path>
	</svg> -->
</section>
<!-- /about astrology -->

<!-- daily horoscope style="background-image: url(../images/other/bgpink2.jpg);" -->
<section id="daily_horoscope" class="bg-1mg">
<div>
	<div class="container mb-6">
		<div class="max-w-600 mx-auto text-center mb-5">
			<!-- <hr class="h--1 bg-primary w--50"> -->
			<h2 class="h1 font-weight-medium clrvb">
				Daily Horoscope
			</h2>
			<span class="sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft font-weight-normal pl-2 pr-2 pt--6 pb--6 mb-2">
				Choose your zodiac sign
			</span>
		</div>
		<div class="row">

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/aries.png') }}" alt="aries" />
						<h5 class="card-title">
							Aries
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>Mar 21 to Apr 20</b>
						</p><br>
						<p class="card-text">
							Energetic, Honest<br>Moody, Aggressive
						</p>
						<a href="{{ url('/horoscope/daily/aries') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/taurus.png') }}" alt="taurus" />
						<h5 class="card-title">
							Taurus
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>Apr 21 to May 21</b>
						</p><br>
						<p class="card-text">
							Trusty, Stable<br>Stubborn, Selfish
						</p>
						<a href="{{ url('/horoscope/daily/taurus') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/gemini.png') }}" alt="gemini" />
						<h5 class="card-title">
							Gemini
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>May 22 to Jun 21</b>
						</p><br>
						<p class="card-text">
							Gentle, Flexible<br>Nervous, Unstable
						</p>
						<a href="{{ url('/horoscope/daily/gemini') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/cancer.png') }}" alt="cancer" />
						<h5 class="card-title">
							Cancer
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>Jun 22 to Jul 22</b>
						</p><br>
						<p class="card-text">
							Loyal, Emotional<br>Moody, Insecure
						</p>
						<a href="{{ url('/horoscope/daily/cancer') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/leo.png') }}" alt="leo" />
						<h5 class="card-title">
							Leo
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>Jul 23 to Aug 22</b>
						</p><br>
						<p class="card-text">
							Comic, Creative<br>Arrogant, Lazy
						</p>
						<a href="{{ url('/horoscope/daily/leo') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/virgo.png') }}" alt="virgo" />
						<h5 class="card-title">
							Virgo
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>Aug 23 to Sep 23</b>
						</p><br>
						<p class="card-text">
							Kind, Dedicated<br>Shyness, Worry
						</p>
						<a href="{{ url('/horoscope/daily/virgo') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/libra.png') }}" alt="libra" />
						<h5 class="card-title">
							Libra
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>Sep 24 to Oct 23</b>
						</p><br>
						<p class="card-text">
							Social, Diplomatic<br>Unsure, Self-pity
						</p>
						<a href="{{ url('/horoscope/daily/libra') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/scorpio.png') }}" alt="scorpio" />
						<h5 class="card-title">
							Scorpio
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>Oct 24 to Nov 22</b>
						</p><br>
						<p class="card-text">
							Brave, Passionate<br>Jealous, Violent
						</p>
						<a href="{{ url('/horoscope/daily/scorpio') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/sagittarius.png') }}" alt="sagittarius" />
						<h5 class="card-title">
							Sagittarius
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>Nov 23 to Dec 21</b>
						</p><br>
						<p class="card-text">
							Helpful, Romantic<br>Impatient, Aloof
						</p>
						<a href="{{ url('/horoscope/daily/sagittarius') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/capricorn.png') }}" alt="capricorn" />
						<h5 class="card-title">
							Capricorn
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>Dec 22 to Jan 20</b>
						</p><br>
						<p class="card-text">
							Sincere, Liable<br>Unkind, Rude
						</p>
						<a href="{{ url('/horoscope/daily/capricorn') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/aquarius.png') }}" alt="aquarius" />
						<h5 class="card-title">
							Aquarius
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>Jan 21 to Feb 19</b>
						</p><br>
						<p class="card-text">
							Modern, Original<br>Aloof, Irritable
						</p>
						<a href="{{ url('/horoscope/daily/aquarius') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

			<div class="col-6m col-lg-3">

				<div class="card shadow-md shadow-lg-hover transition-hover-top h-100 bl-0 br-0 bb-0 bw--2 text-center">
					<div class="card-body">
						<img class="zodic_size" src="{{ asset('images/zodiac_signs/png/pisces.png') }}" alt="pisces" />
						<h5 class="card-title">
							Pisces
						</h5>
						<p class="card-text cus_mar styleColor">
							<b>Feb 20 to Mar 20</b>
						</p><br>
						<p class="card-text">
							Kindhearted, Wise<br>Fearful, Sad
						</p>
						<a href="{{ url('/horoscope/daily/pisces') }}" class="btn btn-sm btn-warning">Read now</a>
					</div>
				</div>

			</div>

		</div>

	</div>
</div>
</section>
<!-- /daily horoscope -->

<!-- services  style="background-image: url(../images/other/bgvb.png);"-->
<section id="services" class="bg-elight" style="background-image: url(../images/other/bgvb.png);">
	<div class="container">
		<div class="max-w-600 mx-auto text-center mb-5">
			<!-- <hr class="h--1 bg-primary w--50"> -->
			<h2 class="h1 font-weight-medium clrvb">
				Our Services
			</h2>
			<span class="sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft font-weight-normal pl-2 pr-2 pt--6 pb--6 mb-2">
				We do it for you
			</span>

		</div>
		<div class="row">

			<div class="col-12 col-lg-4 mb-5">

				<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
					<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
						<img class="img-fluid lazy rounded" src="{{ asset('images/services/question.jpg') }}" alt="...">
					</a>

					<div class="p-3">

						<h5 class="m-0">
							Ask Free Query
						</h5><br/>

						<ul class="list-inline fs--13 m-0">
							<li class="list-inline-item">
								<a href="#!" class="text-gray-500">Some quick example text Some quick example text Some quick example text</a>
							</li>


						</ul>

					</div>
				</div>

			</div>

			<div class="col-12 col-lg-4 mb-5">

				<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
					<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
						<img class="img-fluid lazy rounded" src="{{ asset('images/services/question.jpg') }}" alt="...">
					</a>

					<div class="p-3">

						<h5 class="m-0">
							Horoscope Report
						</h5><br/>

						<ul class="list-inline fs--13 m-0">
							<li class="list-inline-item">
								<a href="#!" class="text-gray-500">Some quick example text Some quick example text Some quick example text</a>
							</li>


						</ul>

					</div>
				</div>

			</div>

			<div class="col-12 col-lg-4 mb-5">

				<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
					<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
						<img class="img-fluid lazy rounded" src="{{ asset('images/services/question.jpg') }}" alt="...">
					</a>

					<div class="p-3">

						<h5 class="m-0">
							Book Astrologer
						</h5><br/>

						<ul class="list-inline fs--13 m-0">
							<li class="list-inline-item">
								<a href="#!" class="text-gray-500">Some quick example text Some quick example text Some quick example text</a>
							</li>


						</ul>

					</div>
				</div>

			</div>

			<div class="col-12 col-lg-4 mb-5">

				<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
					<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
						<img class="img-fluid lazy rounded" src="{{ asset('images/services/match_making.jpg') }}" alt="...">
					</a>

					<div class="p-3">

						<h5 class="m-0">
							Match Making Report
						</h5><br/>

						<ul class="list-inline fs--13 m-0">
							<li class="list-inline-item">
								<a href="#!" class="text-gray-500">Some quick example text Some quick example text Some quick example text</a>
							</li>


						</ul>

					</div>
				</div>

			</div>

			<div class="col-12 col-lg-4 mb-5">

				<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
					<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
						<img class="img-fluid lazy rounded" src="{{ asset('images/services/gems.png') }}" alt="...">
					</a>

					<div class="p-3">

						<h5 class="m-0">
							Order Gemstones
						</h5><br/>

						<ul class="list-inline fs--13 m-0">
							<li class="list-inline-item">
								<a href="#!" class="text-gray-500">Some quick example text Some quick example text Some quick example text</a>
							</li>


						</ul>

					</div>
				</div>

			</div>

			<div class="col-12 col-lg-4 mb-5">

				<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
					<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
						<img class="img-fluid lazy rounded" src="{{ asset('images/services/pt2.jpg') }}" alt="...">
					</a>

					<div class="p-3">

						<h5 class="m-0">
							Book Panditji
						</h5><br/>

						<ul class="list-inline fs--13 m-0">
							<li class="list-inline-item">
								<a href="#!" class="text-gray-500">Some quick example text Some quick example text Some quick example text </a>
							</li>


						</ul>

					</div>
				</div>

			</div>

			<div class="col-12 col-lg-4 mb-5">

				<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
					<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
						<img class="img-fluid lazy rounded" src="{{ asset('images/services/vastu_shastra.jpg') }}" alt="...">
					</a>

					<div class="p-3">

						<h5 class="m-0">
							Vastu Consultancy
						</h5><br/>

						<ul class="list-inline fs--13 m-0">
							<li class="list-inline-item">
								<a href="#!" class="text-gray-500">Some quick example text Some quick example text Some quick example text </a>
							</li>


						</ul>

					</div>
				</div>

			</div>

			<div class="col-12 col-lg-4 mb-5">

				<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
					<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
						<img class="img-fluid lazy rounded" src="{{ asset('images/services/vst.jpg') }}" alt="...">
					</a>

					<div class="p-3">

						<h5 class="m-0">
							Our Puja
						</h5><br/>

						<ul class="list-inline fs--13 m-0">
							<li class="list-inline-item">
								<a href="#!" class="text-gray-500">Some quick example text Some quick example text Some quick example text </a>
							</li>


						</ul>

					</div>
				</div>

			</div>

			<div class="col-12 col-lg-4 mb-5">

				<div class="bg-white p-2 shadow-primary-xs transition-hover-top transition-all-ease-250">
					<a href="portfolio-single-1.html" class="d-block overflow-hidden overlay-dark-hover overlay-opacity-2 text-decoration-none text-dark">
						<img class="img-fluid lazy rounded" src="{{ asset('images/services/team_activity.jpg') }}" alt="...">
					</a>

					<div class="p-3">

						<h5 class="m-0">
							Team Activity
						</h5><br/>

						<ul class="list-inline fs--13 m-0">
							<li class="list-inline-item">
								<a href="#!" class="text-gray-500">Some quick example text Some quick example text Some quick example text </a>
							</li>


						</ul>

					</div>
				</div>

			</div>

		</div>
	</div>
</section>
<!-- /services -->


<!-- block : about us -->
<section id="section_about" class="overflow-hidden bg-1mg">
	<div class="container">

		<div class="row d-flex flex-wrap align-items-center">


			<div class="order-2 col-12 col-md-6 offset-md-1 mb-5">

				<h2 class="h1 font-weight-medium clrvb">
					Who we are?
				</h2>
				<span class="sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft font-weight-normal pl-2 pr-2 pt--6 pb--6 mb-2">
					We do it for you
				</span>


				<br/><br/>
				<p class="mb-3 lead">
					Answering those questions and more is a tall order, but one you should approach with enthusiasm. After all, this is the one place you can and should sing your own praises.
				</p>

				<p class="mb-5">
					Answering those questions and more is a tall order, but one you should approach with enthusiasm. After all, this is the one place you can and should sing your own praises.
				</p>

				<!-- play -->
				<div class="clearfix d-flex align-items-center">

					<!-- play button : based on SOW : Ajax Modal -->
					<span class="d-inline-block rounded-circle border border-light bw--3 p-1 transition-hover-zoom transition-all-ease-150 shadow-primary-lg">
						<a aria-label="See our video" href="https://www.youtube.com/watch?v=I_fQh_HmF6s" class="js-ajax-modal d-inline-flex bg-primary text-white rounded-circle w--60 h--60 align-items-center justify-content-center text-decoration-none"
							data-ajax-modal-type="video"
							data-ajax-modal-size="modal-xl"
							data-ajax-modal-centered="true">
							<i class="fi fi-arrow-end-full fs--25 mt--3"></i>
						</a>
					</span>

					<span class="d-inline-block px-3 text-primary">
						<b>SEE OUR VIDEO</b>
					</span>

				</div>
				<!-- /play -->

			</div>


			<div class="order-1 col-12 col-md-5 mb-5">

				<!--
					Image set as cover, loaded via lazyload - better for height custom calibration via py-*
					Base64 image is an empty landscape png for better autoresize
					Classes: rounded, rounded-xl, py-*
				-->
				<div class="stretch-start py-5 rounded-xl bg-light bg-cover lazy" style="background-image:url('images/other/tm.jpg')">
					<img class="w-100" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAKCAQAAADxnt1TAAAAEUlEQVR42mNkIBowjiodaKUACusAC4zze1kAAAAASUVORK5CYII=" alt="...">
				</div>

			</div>

		</div>

	</div>
</section>
<!-- /block : about us -->

@endsection
<!-- End Section -->
