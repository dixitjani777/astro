<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Gemstone Recommendations : Accurate Guide - Astroduniya')
@section('description','People should wear recommended gemstone based on birth chart. People should consult with an expert astrologer for wearing recommended gemstone.')
@section('keywords','gemstone recommendation, gemstone guide, gemstone recommendation free, gemstones, power of gemstone, lucky gemstone, gemstones online, buy gemstones, gemstones buy, gemstones buy online, gemstones near me')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Gemstone Recommendations"; 
	$toolbar_title="Gemstone Recommendations";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')



<section>
	<div class="container">
		<div class="row">	
			<div class="col-lg-9 order-1 order-lg-1">		
				


				<div class="article-format">
					<p class="font-weight-medium">
						People should wear Gems that suits them completely according to birth chart. Therefore, People should consult with an expert before wearing any gemstone.
					</p>
				</div>

				<div class="mb-5">
					<span class="sub_heading letter-spacing-1 badge badge-pill badge-primary badge-soft font-weight-medium pl-2 pr-2 pt--6 pb--6 mb-2 fs--15">
						Follow 3 Steps
					</span><br/><br/>
					
					<div class="d-flex mb-3">

						<div class="badge badge-ico-sm rounded-circle float-start">
							<i class="fi fi-arrow-right"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Login / Sign Up
						</p>

					</div>

					<div class="d-flex mb-3">

						<div class="badge badge-ico-sm rounded-circle float-start">
							<i class="fi fi-arrow-right"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Fill out below form
						</p>

					</div>

					

					<div class="d-flex mb-3">

						<div class="badge badge-ico-sm rounded-circle float-start">
							<i class="fi fi-arrow-right"></i>
						</div>
						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Check Recommended Gems in your Account 
						</p>

					</div>

				</div>
				
				<div>
					
					<!-- Query -->
					<div class="clearfix mt-5 col-12">
						<h3 class="font-weight-normal text-muted mb-4">
							Enter Details						
						</h3>

						@guest
							<p class="text-muted sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft fs--15 mb-1">
								<span class="styleColor">*</span> You must <a href="#" >Log in</a> to Buy Gemstone.
							</p>
						@endguest

						<!-- Query Form -->
<x-enquiry-form
	layout="floating"
	class="bs-validate d-block bg-white shadow-md rounded p-4 mb-5"
	source="gemstone"
	context="gemstone_recommendation"
	subject="Gemstone Recommendation"
	:show-name="false"
	:show-email="false"
	:show-phone="false"
	:show-message="false"
	message-label="Enter your query here.."
	submit-label="Submit Query to buy Gemstone"
>
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<input required placeholder="Name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()?->name) }}">
				<label>Name</label>
				@error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>

		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<select id="gemstone_gender" class="form-control" name="meta[gender]">
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
				<label for="gemstone_gender">Gender</label>
				@error('meta.gender')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<input required autocomplete="off" type="text" name="meta[dob_time]" class="form-control rangepicker" placeholder="Date of Birth and Time"
					data-layout-rounded="false"
					data-single-datepicker="true"
					data-interval-years='[1982,2020]'
					data-timepicker="true"
					data-date-format="DD/MM/YYYY hh:mm: A"
					data-quick-locale='{
						"lang_apply" : "Apply",
						"lang_cancel": "Cancel",
						"lang_crange": "Custom Range",
						"lang_months": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
						"lang_weekdays": ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]
					}'>
				<label>Date of Birth and Time</label>
				@error('meta.dob_time')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<input required placeholder="Birth Place" type="text" class="form-control" name="meta[birth_place]">
				<label>Birth Place</label>
				<span class="fs--14 styleColor letter-spacing-03">* Select location from the list only.</span>
				@error('meta.birth_place')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<select id="gemstone_type" class="form-control" name="meta[expected_gemstone]">
					<option value="blue_sapphire">Blue Sapphire / Neelam</option>
					<option value="ruby">Ruby / Manik</option>
					<option value="emerald">Emerald / Panna</option>
					<option value="pearl">Pearl / Moti</option>
					<option value="red_coral">Red Coral / Moonga</option>
					<option value="yellow_sapphire">Yellow Sapphire / Pukhraj</option>
					<option value="diamond">Diamond / Heera</option>
					<option value="hessonite">Hessonite / Garnet</option>
					<option value="cats_eye">Cats Eye / Lehsunia</option>
				</select>
				<label for="gemstone_type">Expected Gemstone</label>
				@error('meta.expected_gemstone')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>

		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<select id="gemstone_carat" class="form-control" name="meta[carat_weight]">
					<option value="below_3">Below 3 carat</option>
					<option value="3_5">3 - 5 Carat</option>
					<option value="5_7">5 - 7 Carat</option>
					<option value="7_9">7 - 9 Carat</option>
					<option value="9_plus">9 Carat+</option>
				</select>
				<label for="gemstone_carat">Select Carat Weight</label>
				@error('meta.carat_weight')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
	</div>

	<div class="clearfix mb-3">
		<div class="form-label-group">
			<textarea required rows="3" class="form-control js-form-advanced-char-count-down" name="message" maxlength="3000" placeholder="Your comment">{{ old('message', 'Which gemstone should I wear for overall betterment ?') }}</textarea>
			<label>Enter your query here..</label>
			@error('message')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
		</div>
		<span class="fs--12 text-muted text-align-end float-end mt-1">
			characters left: <span class="js-form-advanced-char-left">3000</span>
		</span>
	</div>
</x-enquiry-form>
<!-- /Query Form -->

						

					</div>
					<!-- /Query -->

				</div>

				
				<div>
					
					<h2 class="h4 text-muted mb-4">
						Why join us?
					</h2>

					

					<div class="d-flex mb-3">

						<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
							<i class="fi fi-check"></i>
						</div>

						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Accurate astrological predictions
						</p>

					</div>

					

					<div class="d-flex mb-3">

						<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
							<i class="fi fi-check"></i>
						</div>

						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Whole life predictions in report.
						</p>

					</div>

					<div class="d-flex mb-3">

						<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
							<i class="fi fi-check"></i>
						</div>

						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Accurate analysis by expert.
						</p>

					</div>

					<div class="d-flex mb-3">

						<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
							<i class="fi fi-check"></i>
						</div>

						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Identify reasons of your troubles.
						</p>

					</div>

					<div class="d-flex mb-3">

						<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
							<i class="fi fi-check"></i>
						</div>

						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Get solutions and remedies.
						</p>

					</div>

					<div class="d-flex mb-3">

						<div class="badge badge-warning badge-ico-sm rounded-circle float-start">
							<i class="fi fi-check"></i>
						</div>

						<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
							Flexible pricing
						</p>

					</div>
					

				</div>
				

				

				<div class="shadow-xs p-4 mt-5 fs--18">
					If you have more questions, call us: <a class="link-muted" href="tel:7853889450">785-388-9450</a>
					<small class="d-block">We truly care about our users and our product.</small>
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




