<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','About Astrology : Learn how astrology works - Astroduniya')
@section('description','Astrology is an early culture which says that the quality and fortune of human depend on the situation of the Planets at the time of birth.')
@section('keywords','Learn astrology, how astrology works, all about astrology, understand astrology, astrology 2020, free astrology, astrology online, aspects in astrology, aspects in astrology')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="About Astrology"; 
	$toolbar_title="About Astrology";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section class="cus_pd35">
	<div class="container">
		<div class="row">	
			<div class="col-lg-9 order-1 order-lg-1">
				<div class="abtas">
					<img class="img-fluid" src="{{ asset('/images/other/learn_astrology.jpg') }}" width="840" height="500" alt="about astrology">

					<br/><br/><br/>

					<div class="article-format">
						<p>
							Astrology is an early culture which says that the quality and fortune of human depend on the situation of the <a href="{{ url('/astrology/planets') }}" target="_blank" rel="noopener" title="know more about planets">Planets</a> at the time of birth. The situation of the planets at the time of birth helps us to analyze life. It is an spiritual science which allows us to look into the future.
						</p>
						<p>
							Astrology is guiding thread for a happy and successful life which helps to take best decisions in life and allows logical changes of every individual in order to upgrade the quality of life. It helps you to analyze what expects us in the future and what is best time to take action to achieve your target.
						</p>
						<p>
							Astrology supports the existence of wish and deny superstition. It is a blessing for the society.<br/>Scientists like Galileo and Newton were staunch believers in astrology.
						</p>	
					</div>

					<div>	
						<h2>Power of Universe</h2><br/>
						<p>
							People made many decision but they did not achieved desired result.<br/>
							Some people made little or no effort still become wealthy and successful.<br/>Some people have briliant brain and made best effort but they didn't succeed.<br/>
						</p>
						
						<p>
							It'is hard to accept but it is truth, <b>doen't matter what you like and what you do, result will be provided by the universe.</b><br/>
						</p>
					</div><br/>

					<div>	
						<h2>Aspects of Astrology</h2><br/>
						<p>
							In astrology terms there are four building blocks of the universe :  Water, Fire, Earth and Air.<br/>Each block represent the nature of the various signs.
						</p>
						
						<h4 class="h5 text-muted">Water -</h4>
						<ul>
							<li>It's considered as negative.</li>
							<li>Cancer, Scorpio, and Pisces comes under water element.</li>
							<li>These types tend to be emotional, creative, compassionate, forgiving, kindly.</li>
							
						</ul>

						<h4 class="h5 text-muted">Fire -</h4>
						<ul>
							<li>It's considered as positive.</li>
							<li>Aries, Leo and Sagittarius comes under fire element.</li>
							<li>These types tend to be  energetic, enthusiastic, inspirational, courageous, powerful, passionate.</li>
							
						</ul>
						
						<h4 class="h5 text-muted">Earth -</h4>
						<ul>
							<li>It's considered as negative.</li>
							<li>Taurus, Virgo, and Capricorn comes under earth element.</li>
							<li>These types tend to be responsible, ambitious, practical, focused, dependable, solid.</li>
							
						</ul>

						<h4 class="h5 text-muted">Air -</h4>
						<ul>
							<li>It's considered as positive.</li>
							<li>Gemini, Libra, and Aquarius comes under air element.</li>
							<li>These types tend to be  entertaining, curious, restless, trusting, communicative, intellectual.</li>
							
						</ul>

					</div>

					<div>
						<p>In astrology, the sky is divided into twelve sections, each representing one of the signs of the <a href="{{ url('/astrology/signs') }}" target="_blank" rel="noopener" title="know more about zodics">zodiac</a>.</p>
						<div>
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#aries') }}" target="_blank" rel="noopener">Aries</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#taurus') }}" target="_blank" rel="noopener">Taurus</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#gemini') }}" target="_blank" rel="noopener">Gemini</a>
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#cancer') }}" target="_blank" rel="noopener">Cancer</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#leo') }}" target="_blank" rel="noopener">Leo</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#virgo') }}" target="_blank" rel="noopener">Virgo</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#libra') }}" target="_blank" rel="noopener">Libra</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#scorpio') }}" target="_blank" rel="noopener">Scorpio</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#sagittarius') }}" target="_blank" rel="noopener">Sagittarius</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#capricorn') }}" target="_blank" rel="noopener">Capricorn</a>
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#aquarius') }}" target="_blank" rel="noopener">Aquarius</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/signs#pisces') }}" target="_blank" rel="noopener">Pices</a> 
						</div>
					</div>

					<div><br/>
						<p>Learn about  the <a href="{{ url('/astrology/planets') }}" target="_blank" rel="noopener" title="know more about planets">Planets</a> in Astrology and how they affect You.</p>
						<div>
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#sun') }}" target="_blank" rel="noopener">Sun</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#moon') }}" target="_blank" rel="noopener">Moon</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#mars') }}" target="_blank" rel="noopener">Mars</a>
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#mercury') }}" target="_blank" rel="noopener">Mercury</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#jupiter') }}" target="_blank" rel="noopener">Jupiter</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#venus') }}" target="_blank" rel="noopener">Venus</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#saturn') }}" target="_blank" rel="noopener">Saturn</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#uranus') }}" target="_blank" rel="noopener">Uranus</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#neptune') }}" target="_blank" rel="noopener">Neptune</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#pluto') }}" target="_blank" rel="noopener">Pluto</a>
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#rahu') }}" target="_blank" rel="noopener">Rahu</a> 
						<a class="text-dark bg-light fs--13 rounded py-1 px-2 m-1 text-decoration-none" href="{{ url('/astrology/planets#ketu') }}" target="_blank" rel="noopener">Ketu</a> 
						</div>
					</div><br/>

					<p>Astrology is much more than just signs of the zodiac and planet.<a href="{{ url('/astrology/signs') }}" title="Book now"> Book your Astrologer</a> and Find out more about your star.</p>
					
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