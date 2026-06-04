<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Yearly Horoscope : Predictions for All Zodiac - Astroduniya')
@section('description','Read yearly horoscope for aries, taurus, gemini, cancer, leo, virgo, libra, scorpio, sagittarius, capricorn, aquarius, pisces')
@section('keywords','yearly horoscope, aries horoscope, taurus horoscope, gemini horoscope, cancer horoscope, leo horoscope, virgo horoscope, libra horoscope, scorpio horoscope, sagittarius horoscope, capricorn horoscope, aquarius horoscope, pisces horoscope')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Yearly Horoscope"; 
	$toolbar_title="Yearly Horoscope";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section>
	<div class="container">
		<article class="row">	
			<div class="col-md-9 col-sm-9">
				<?php 
					$zodiac = Request::segment(3); 
					//echo $zodiac; exit;
			        switch ($zodiac) {
			            case "aries":
			                $zodiac = 'Aries';
			                break;
			            case "taurus":
			                $zodiac = 'Taurus';
			                break;
			            case "gemini":
			                $zodiac = 'Gemini';
			                break;
			            case "cancer":
			                $zodiac = 'Cancer';
			                break;
			            case "leo":
			                $zodiac = 'Leo';
			                break;
			            case "virgo":
			                $zodiac = 'Virgo';
			                break;
			            case "libra":
			                $zodiac = 'Libra';
			                break;
			            case "scorpio":
			                $zodiac = 'Scorpio';
			                break;
			            case "sagittarius":
			                $zodiac = 'Sagittarius';
			                break;
			            case "capricorn":
			                $zodiac = 'Capricorn';
			                break;
			            case "aquarius":
			                $zodiac = 'Aquarius';
			                break;
			            case "pisces":
			                $zodiac = 'Pisces';
			                break;
			            default:
			                $zodiac = 'Undefine';
			        }
				?>
				<!-- Zodiac Data -->
				<?php
					$zodiac_horoscope = "Suffering from a body pains is high on the card. Try to avoid any physical exertion that would put more stress on your body. Remember to take sufficeint rest. Investment is recommended but seek proper advice. A good day to revive old contacts and relations. Be careful your romantic partner may flatter you- don't leave me alone in this lonely world. Today your artistic and creative ability will attract lot of appreciation and bring you unexpected rewards. To utilize your time, you can go to the park, but there are chances of you getting into an argument with someone unknown. This can even spoil your mood. Today, you will get to spend the best evening of your life with your spouse. ";
					$lucky_number = "7, 9";
					$lucky_color = "Blue, Green";
				?>

				<div>
					<header class="text-center">
						<h2>{{ ucfirst($zodiac) }}<span class="styleColor"> Yearly Horoscope</span></h2>
						<div class="divider half-margins"><!-- divider -->
							<i class="fa fa-chevron-down"></i>
						</div>
						

						<!-- <div class="col-md-5 col-sm-5 col-xs-5">

						<select class="form-control">
										<option>Daily</option>
										<option>Weekly</option>
										<option>Monthly</option>
										<option>Yearly</option>
										
									</select>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
						</div>
						<div class="col-md-5 col-sm-5 col-xs-5">
						<select class="form-control">
										<option>Aries</option>
										<option>Taurus</option>
										<option>Gemini</option>
										<option>Cancer</option>
										<option>Leo</option>
										<option>Virgo</option>
										<option>Libra</option>
										<option>Scorpio</option>
										<option>Sagittarius</option>
										<option>Capricorn</option>
										<option>Aquarius</option>
										<option>Pisces</option>
									</select>
						</div> -->

									
					</header>

					<article>
						@if(!empty($cms?->content_html))
							{!! $cms->content_html !!}
						@elseif(isset($cms) && ($cms->love_text || $cms->career_text || $cms->health_text || $cms->money_text))
							@php
								$combined = trim(implode("\n\n", array_filter([
									$cms->love_text ? ("Love: " . $cms->love_text) : null,
									$cms->career_text ? ("Career: " . $cms->career_text) : null,
									$cms->health_text ? ("Health: " . $cms->health_text) : null,
									$cms->money_text ? ("Money: " . $cms->money_text) : null,
								])));
							@endphp
							<p class="lead">{!! nl2br(e($combined)) !!}</p>
						@else
							<p class="lead"><?php echo $zodiac_horoscope; ?></p>
							<p class="lead"><b>Lucky Number</b> :- <?php echo $lucky_number; ?></p>
							<p class="lead"><b>Lucky Color</b> :- <?php echo $lucky_color; ?></p><br>
						@endif
					</article>
				</div>

				
				<h2>Rating</h2>
				<br/>
				<div class="row">

					<div class="col-lg-6">
						
						<div class="col-md-4 col-sm-4">
							<p>Health
								<span class="d-block">
									<i class="rating-5 text-warning fs--14"></i>
								</span>
							 </p>
						</div>

						<div class="col-md-4 col-sm-4">
							<p>Wealth
								<span class="d-block">
									<i class="rating-5 text-warning fs--14"></i>
								</span>
							 </p>
						</div>

						<div class="col-md-4 col-sm-4">
							<p>Love Life
								<span class="d-block">
									<i class="rating-5 text-warning fs--14"></i>
								</span>
							 </p>
						</div>

					</div>

					<div class="col-lg-6">
						<div class="col-md-4 col-sm-4">
							<p>Occupation
								<span class="d-block">
									<i class="rating-5 text-warning fs--14"></i>
								</span>
							 </p>
						</div>
						<div class="col-md-4 col-sm-4">
							<p>Family
								<span class="d-block">
									<i class="rating-5 text-warning fs--14"></i>
								</span>
							 </p>
						</div>
						<div class="col-md-4 col-sm-4">
							<p>Overall Day
								<span class="d-block">
									<i class="rating-5 text-warning fs--14"></i>
								</span>
							 </p>
						</div>
					</div>
					
				</div><br/><br/>

				<h2>Additional allowance</h2><br/>
				<div class="row">
					
					<div class="col-12 col-md-6">
						<div class="form-label-group mb-3">
							<select id="horoscopePeriodSelect" class="form-control">
								@php($currentSignKey = strtolower((string) Request::segment(3)))
								<option value="daily">Daily Horoscope</option>
								<option value="weekly">Weekly Horoscope</option>
								<option value="monthly">Monthly Horoscope</option>
								<option value="yearly" selected>Yearly Horoscope</option>
							</select>
							<label for="horoscopePeriodSelect">Another Period</label>
						</div>
						
					</div>

					<div class="col-12 col-md-6">
						<div class="form-label-group mb-3">
							<select id="horoscopeSignSelect" class="form-control">
								<option value="aries" @selected($currentSignKey==='aries')>Aries</option>
								<option value="taurus" @selected($currentSignKey==='taurus')>Taurus</option>
								<option value="gemini" @selected($currentSignKey==='gemini')>Gemini</option>
								<option value="cancer" @selected($currentSignKey==='cancer')>Cancer</option>
								<option value="leo" @selected($currentSignKey==='leo')>Leo</option>
								<option value="virgo" @selected($currentSignKey==='virgo')>Virgo</option>
								<option value="libra" @selected($currentSignKey==='libra')>Libra</option>
								<option value="scorpio" @selected($currentSignKey==='scorpio')>Scorpio</option>
								<option value="sagittarius" @selected($currentSignKey==='sagittarius')>Sagittarius</option>
								<option value="capricorn" @selected($currentSignKey==='capricorn')>Capricorn</option>
								<option value="aquarius" @selected($currentSignKey==='aquarius')>Aquarius</option>
								<option value="pisces" @selected($currentSignKey==='pisces')>Pisces</option>
							</select>
							<label for="horoscopeSignSelect">Another Sign</label>
						</div>
						
					</div>
					
				</div><br/><br/>

				<script>
					(function () {
						var periodSel = document.getElementById('horoscopePeriodSelect');
						var signSel = document.getElementById('horoscopeSignSelect');
						if (!periodSel || !signSel) return;

						function go() {
							var period = (periodSel.value || 'yearly').toLowerCase();
							var sign = (signSel.value || '').toLowerCase();
							if (!sign) return;
							window.location.href = "{{ url('/horoscope') }}/" + period + "/" + sign;
						}

						periodSel.addEventListener('change', go);
						signSel.addEventListener('change', go);
					})();
				</script>

				<div>	
				  <h2>Recommendation</h2><br/>
				  <div class="row">
						
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/astrologer/facetoface') }}"><i class="fa fa-caret-right"></i><span> Personalised Reading</span></a>
					</div>
					
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/astrologer/minihreport') }}"><i class="fa fa-caret-right"></i><span> Ask a Free Query to Astrologer</span></a>
					</div>
					
					
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/astrologer/minihreport') }}"><i class="fa fa-caret-right"></i><span> Book Astrologer on Call</span></a>
					</div>
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/astrologer/minihreport') }}"><i class="fa fa-caret-right"></i><span> Order Your Horoscope</span></a>
					</div>
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/astrologer/minihreport') }}"><i class="fa fa-caret-right"></i><span> Buy Effective Gemstone</span></a>
					</div>
					<div class="fa-hover col-md-4 col-sm-4">
						<a class="text-muted" href="{{ url('/astrologer/minihreport') }}"><i class="fa fa-caret-right"></i><span> Book Pandit Ji</span></a>
					</div>
				  </div>
				</div>

			</div>
			
			<!-- SIDEBAR -->
			<div class="col-md-3 col-sm-3">
				@include('frontend.horoscope.sidebar.sidebar')
			</div>
			<!-- / SIDEBAR -->

		</article>
	</div>
</section>

@endsection
<!-- End Section -->
