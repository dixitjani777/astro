<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Feedback - Astroduniya')
@section('description','pending')
@section('keywords','pending')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Feedback"; 
	$toolbar_title="Feedback";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<section>
	<div class="container">
	<div class="row">
		<div class="col-12 col-lg-4 order-2 order-sm-1"> 
			<br/><br/><br/><br/><br/>
			<img class="img-fluid" src="{{ asset('images/other/whyus.jpg')}}" width="400px" alt="feedback form" /> <br/><br/><br/>	
		</div>
		<div class="col-12 col-lg-8 order-1 order-sm-2">
			
			<h3>
				What can we do <em><strong class="styleColor"> better ?</strong></em>
            </h3>
			
			@guest
				<p class="text-muted sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft fs--15 mb-1">
					<span class="styleColor">*</span> You must <a href="#" data-href="_ajax/modal_signin_md.html" data-ajax-modal-size="modal-md" data-ajax-modal-centered="false" class="js-ajax-modal">Log in</a> to feel Feedback form.
				</p>
			@endguest
			<!-- Query Form -->
			<x-enquiry-form
				layout="floating"
				class="bs-validate d-block bg-white shadow-primary-xs rounded p-4 mb-5"
				source="feedback"
				context="feedback_page"
				subject="Feedback"
				:show-name="false"
				:show-email="false"
				:show-phone="false"
				message-label="Your feedback"
				submit-label="Submit Feedback"
			>
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="form-label-group mb-3">
							<input required placeholder="Name" type="text" class="form-control" name="name" value="{{ old('name') }}" data-toggle="tooltip" data-placement="top" data-original-title="Name">
							<label>Name</label>
							@error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
						</div>
					</div>

					<div class="col-12 col-md-6">
						<div class="form-label-group mb-3">
							<select id="select_options2" class="form-control" name="meta[gender]">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
							<label for="select_options2">Gender</label>
						</div>
					</div>

				</div>

				<div class="row">
						<div class="col-12 col-md-6">
							<div class="form-label-group mb-3">
								<input required autocomplete="off" type="text" name="meta[dob_time]" class="form-control rangepicker" placeholder="Date of Birth and Time" data-toggle="tooltip" data-placement="top" data-original-title="Date of Birth and Time"
									data-layout-rounded="false" 
									data-single-datepicker="true" 
									data-interval-years='[1982,2020]'
									data-timepicker="true" 
									
									data-date-format="DD/MM/YYYY hh:mm: A" 
									 
									data-quick-locale='{
										"lang_apply"	: "Apply",
										"lang_cancel"	: "Cancel",
										"lang_crange"	: "Custom Range",
										"lang_months" 	: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
										"lang_weekdays" : ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]
									}'
								>
								<label for="comment_name">Date of Birth and Time</label>
							</div>
						</div>
							<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<input required placeholder="Birth Place" id="timepickerT" type="text" class="form-control" name="meta[birth_place]" data-astro-location="birth_place" data-toggle="tooltip" data-placement="top" data-original-title="Birth Place" autocomplete="off">
									<label for="comment_name">Birth Place</label>
									<span class="fs--14 styleColor letter-spacing-03">* Select location from the list only.</span>
									<input type="hidden" name="meta[birth_place_details][display_name]" value="{{ old('meta.birth_place_details.display_name') }}">
									<input type="hidden" name="meta[birth_place_details][city]" value="{{ old('meta.birth_place_details.city') }}">
									<input type="hidden" name="meta[birth_place_details][state]" value="{{ old('meta.birth_place_details.state') }}">
									<input type="hidden" name="meta[birth_place_details][country]" value="{{ old('meta.birth_place_details.country') }}">
									<input type="hidden" name="meta[birth_place_details][lat]" value="{{ old('meta.birth_place_details.lat') }}">
									<input type="hidden" name="meta[birth_place_details][lon]" value="{{ old('meta.birth_place_details.lon') }}">
								</div>
							</div>
				</div>
			</x-enquiry-form>
			<!-- /Query Form -->
		</div>

	</div>
	</div>
</section>
	
@endsection
<!-- End Section -->
