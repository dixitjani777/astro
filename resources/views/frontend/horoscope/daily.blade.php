<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Daily Horoscope : Predictions for All Zodiac - Astroduniya')
@section('description','Read daily horoscope for aries, taurus, gemini, cancer, leo, virgo, libra, scorpio, sagittarius, capricorn, aquarius, pisces')
@section('keywords','today horoscope, daily horoscope, aries horoscope, taurus horoscope, gemini horoscope, cancer horoscope, leo horoscope, virgo horoscope, libra horoscope, scorpio horoscope, sagittarius horoscope, capricorn horoscope, aquarius horoscope, pisces horoscope')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Daily Horoscope"; 
	$toolbar_title="Daily Horoscope";
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
						<h2>{{ ucfirst($zodiac) }}<span class="styleColor"> Daily Horoscope</span>
							<p class="sub_heading letter-spacing-1">Thursday, December 19, 2019</p>
						</h2>
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
					</header><br/>


					


					<div>
						<p><?php echo $zodiac_horoscope; ?></p>
						
					</div>
				</div>

				
				
				<br/>

				<div class="easypie d-inline-block position-relative ml-2 mr-2" 
					data-bar-color="#fad776" 
					data-track-color="#eaeaea" 
					data-scale-color="#cccccc" 
					data-scale-length="5" 
					data-line-width="4" 
					data-line-cap="round" 
					
					data-size="110" 
					data-percent="73" 
				>

					<div class="absolute-full d-middle pt-0 pb-2">
						<div class="flex-none text-center">
							<span class="d-block">73%</span>
							<small class="d-block text-muted">Health</small>
						</div>
					</div>

				</div>


				<div class="easypie d-inline-block position-relative ml-2 mr-2" 
					data-bar-color="#fad776" 
					data-track-color="#eaeaea" 
					data-scale-color="#cccccc" 
					data-scale-length="5" 
					data-line-width="4" 
					data-line-cap="round" 
					
					data-size="110" 
					data-percent="88" 
				>

					<div class="absolute-full d-middle pt-0 pb-2">
						<div class="flex-none text-center">
							<span class="d-block">88%</span>
							<small class="d-block text-muted">Occupation</small>
						</div>
					</div>

				</div>

				<div class="easypie d-inline-block position-relative ml-2 mr-2" 
					data-bar-color="#fad776" 
					data-track-color="#eaeaea" 
					data-scale-color="#cccccc" 
					data-scale-length="5" 
					data-line-width="4" 
					data-line-cap="round" 
					
					data-size="110" 
					data-percent="88" 
				>

					<div class="absolute-full d-middle pt-0 pb-2">
						<div class="flex-none text-center">
							<span class="d-block">88%</span>
							<small class="d-block text-muted">Wealth</small>
						</div>
					</div>

				</div>

				<div class="easypie d-inline-block position-relative ml-2 mr-2" 
					data-bar-color="#fad776" 
					data-track-color="#eaeaea" 
					data-scale-color="#cccccc" 
					data-scale-length="5" 
					data-line-width="4" 
					data-line-cap="round" 
					
					data-size="110" 
					data-percent="88" 
				>

					<div class="absolute-full d-middle pt-0 pb-2">
						<div class="flex-none text-center">
							<span class="d-block">88%</span>
							<small class="d-block text-muted">Family</small>
						</div>
					</div>

				</div>

				<div class="easypie d-inline-block position-relative ml-2 mr-2" 
					data-bar-color="#fad776" 
					data-track-color="#eaeaea" 
					data-scale-color="#cccccc" 
					data-scale-length="5" 
					data-line-width="4" 
					data-line-cap="round" 
					
					data-size="110" 
					data-percent="88" 
				>

					<div class="absolute-full d-middle pt-0 pb-2">
						<div class="flex-none text-center">
							<span class="d-block">88%</span>
							<small class="d-block text-muted">Love Life</small>
						</div>
					</div>

				</div>

				 
				<br><br>
				<p><b>Lucky Number</b> :- <?php echo $lucky_number; ?></p>
				<p><b>Lucky Color</b> :- <?php echo $lucky_color; ?></p>

				<br/><br/>
				<div class="row">

						<div class="col-12 col-sm-6 mb-4">
							<h3 class="fs--18"><i class="fi fi-heart-slim fs--20"></i> LOVE</h3>
							<p>
								No, there is no such thing like "traffic limit" or "order limit".
							</p>
						</div>

						<div class="col-12 col-sm-6 mb-4">
							<h3 class="fs--18"><i class="fi fi-round-target fs--20"></i> CAREER</h3>
							<p>
								No, there is no such thing like "traffic limit" or "order limit".
							</p>
						</div>

						<div class="col-12 col-sm-6 mb-4">
							<h3 class="fs--18"><i class="fi fi-drop fs--20"></i> HEALTH</h3>
							<p>
								No, there is no such thing like "traffic limit" or "order limit".
							</p>
						</div>

						<div class="col-12 col-sm-6 mb-4">
							<h3 class="fs--18"><i class="fi fi-database fs--20"></i> Money</h3>
							<p>
								No, there is no such thing like "traffic limit" or "order limit".
							</p>
						</div>
					</div>
				<br/><br/>
				<h2>Additional allowance</h2><br/>
				<div class="row">
					
					<div class="col-12 col-md-6">
						<div class="form-label-group mb-3">
							<select id="select_options2" class="form-control">
								<option value="1"><?php echo $zodiac; ?> Daily Horoscope</option>
								<option value="2"><?php echo $zodiac; ?> Weekly Horoscope</option>
								<option value="1"><?php echo $zodiac; ?> Monthly Horoscope</option>
								<option value="2"><?php echo $zodiac; ?> Yearly Horoscope</option>
							</select>
							<label for="select_options2">Another Period</label>
						</div>
						
					</div>

					<div class="col-12 col-md-6">
						<div class="form-label-group mb-3">
							<select id="select_options2" class="form-control">
								<option value="1">Aries</option>
								<option value="2">Taurus</option>
								<option value="1">Gemini</option>
								<option value="2">Cancer</option>
								<option value="1">Leo</option>
								<option value="2">Virgo</option>
								<option value="1">Libra</option>
								<option value="2">Scorpio</option>
								<option value="1">Sagittarius</option>
								<option value="2">Capricorn</option>
								<option value="1">Aquarius</option>
								<option value="2">Pisces</option>
							</select>
							<label for="select_options2">Another Sign</label>
						</div>
						
					</div>
					
				</div><br/><br/>

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