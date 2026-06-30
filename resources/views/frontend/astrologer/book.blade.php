<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Talk to Astrologer on Call - Astroduniya')
@section('description','Talk with our expert astrologer if you have any confusion regarding your life. Get best astrological solutions from our astrologer on phone call.')
@section('keywords','astrologer near me, ask astrologer online, world best astrologer, famous astrologer, expert astrologer, astrologer on call, astrological solutions on call, astrologer in mumbai, astrology services online')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Book Astrologer"; 
	$toolbar_title="Book Astrologer";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')


<section>
	<div class="container">
		<div class="row">	
			<div class="col-lg-9 order-1 order-lg-1">		
			

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
							Check booking status in your Account
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
								<span class="styleColor">*</span> You must <a href="{{ url('/account')}}" >Log in</a> to Book Astrologer.
							</p>
						@endguest
						<br><br>

						<!-- Query Form -->
<x-enquiry-form
	layout="floating"
	class="bs-validate d-block bg-white shadow-md rounded p-4 mb-5"
	source="astrologer"
	context="astrologer_booking"
	subject="Astrologer Booking"
	:show-name="false"
	:show-email="false"
	:show-phone="false"
	:show-message="false"
	message-label="Enter your query here.."
	submit-label="Request to book astrologer"
>
	<p>Enter the details of the person your query is about.</p>
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
				<select id="astrologer_gender" class="form-control" name="meta[gender]">
					<option value="male">Male</option>
					<option value="female">Female</option>
					<option value="other">Other</option>
				</select>
				<label for="astrologer_gender">Gender</label>
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
				<input required placeholder="Birth Place" type="text" class="form-control" name="meta[birth_place]" data-astro-location="birth_place" autocomplete="off">
				<label>Birth Place</label>
				<span class="fs--14 styleColor letter-spacing-03">* Select location from the list only.</span>
				<input type="hidden" name="meta[birth_place_details][display_name]" value="{{ old('meta.birth_place_details.display_name') }}">
				<input type="hidden" name="meta[birth_place_details][city]" value="{{ old('meta.birth_place_details.city') }}">
				<input type="hidden" name="meta[birth_place_details][state]" value="{{ old('meta.birth_place_details.state') }}">
				<input type="hidden" name="meta[birth_place_details][country]" value="{{ old('meta.birth_place_details.country') }}">
				<input type="hidden" name="meta[birth_place_details][lat]" value="{{ old('meta.birth_place_details.lat') }}">
				<input type="hidden" name="meta[birth_place_details][lon]" value="{{ old('meta.birth_place_details.lon') }}">
				@error('meta.birth_place')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 col-md-6">
			<div class="form-label-group mb-3">
				<input required autocomplete="off" type="text" name="meta[preferred_datetime]"
					class="form-control rangepicker"
					placeholder="Preferred Date & Time"
					data-single-datepicker="true"
					data-timepicker="true"
					data-min-date="moment()"
					data-date-format="DD/MM/YYYY hh:mm A"
					data-quick-locale='{
						"lang_apply" : "Apply",
						"lang_cancel": "Cancel",
						"lang_crange": "Custom Range",
						"lang_months": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
						"lang_weekdays": ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]
					}'>
				<label>Preferred Date & Time</label>
				@error('meta.preferred_datetime')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>

		<div class="col-12 col-md-3">
			<div class="form-label-group mb-3">
				<select id="consultation_type" class="form-control" name="meta[consultation_type]">
					<option value="call">Call</option>
					<option value="video">Video Call</option>
					<option value="face_to_face">Face to Face</option>
				</select>
				<label for="consultation_type">Consultation Type</label>
				@error('meta.consultation_type')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>

		<div class="col-12 col-md-3">
			<div class="form-label-group mb-3">
				<select id="language" class="form-control" name="meta[language]">
					<option value="hi">Hindi</option>
					<option value="en">English</option>
					<option value="gu">Gujarati</option>
				</select>
				<label for="language">Language</label>
				@error('meta.language')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
			</div>
		</div>
	</div>
</x-enquiry-form>
<!-- /Query Form -->

						<p class="font-weight-normal"><span class="font-weight-bold">Note :</span> Your request will be processed soon. Updates will be sent to your registered email or mobile number, and you can also check the status in your account. </p>
						<br><br>

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
				

				<h2 class="h4 text-primary mb-4 mt-5">
					Common Questions
				</h2>
				<div class="accordion shadow-xs aos-init aos-animate" id="accordionBottomBorder" data-aos="fade-in" data-aos-delay="250">

					<div class="card border-bottom bl-0 br-0 bt-0">
						<div class="card-header b-0 p-0 border bg-transparent" id="cleanHeadingBorder1">
							<h2 class="mb-0">
								<button class="fs--18 btn btn-link btn-block btn-lg text-align-start text-decoration-none text-dark" type="button" data-toggle="collapse" data-target="#borderCollapse1" aria-expanded="true" aria-controls="borderCollapse1">
									Do I have a business email address?
									<span class="group-icon float-end">
										<i class="fi fi-arrow-start-slim"></i>
										<i class="fi fi-arrow-down-slim"></i>
									</span>
								</button>
							</h2>
						</div>

						<div id="borderCollapse1" class="collapse show" aria-labelledby="cleanHeadingBorder1" data-parent="#accordionBottomBorder">
							<div class="card-body">
								<p class="lead">

									We are not able to offer you a dedicated email service for a custom email address like office@mydomain.com at this time. 
									An easy way to create your own business email address is using a cheap hosting plan. <a href="#!">Here is an informative guide</a>.

								</p>
							</div>
						</div>
					</div>

					<div class="card border-bottom bl-0 br-0 bt-0">
						<div class="card-header b-0 p-0 border bg-transparent" id="cleanHeadingBorder2">
							<h2 class="mb-0">
								<button class="fs--18 btn btn-link btn-block btn-lg text-align-start text-decoration-none text-dark collapsed" type="button" data-toggle="collapse" data-target="#borderCollapse2" aria-expanded="false" aria-controls="borderCollapse2">
									Do I have a traffic limit?
									<span class="group-icon float-end">
										<i class="fi fi-arrow-start-slim"></i>
										<i class="fi fi-arrow-down-slim"></i>
									</span>
								</button>
							</h2>
						</div>

						<div id="borderCollapse2" class="collapse" aria-labelledby="cleanHeadingBorder2" data-parent="#accordionBottomBorder">
							<div class="card-body">
								<p class="lead">
									No, there is no such thing like "traffic limit" or "order limit".
								</p>
							</div>
						</div>
					</div>

					<div class="card border-bottom bl-0 br-0 bt-0">
						<div class="card-header b-0 p-0 border bg-transparent" id="cleanHeadingBorder3">
							<h2 class="mb-0">
								<button class="fs--18 btn btn-link btn-block btn-lg text-align-start text-decoration-none text-dark collapsed" type="button" data-toggle="collapse" data-target="#shadowCollapse3" aria-expanded="false" aria-controls="shadowCollapse3">
									Can I upgrade my plan later?
									<span class="group-icon float-end">
										<i class="fi fi-arrow-start-slim"></i>
										<i class="fi fi-arrow-down-slim"></i>
									</span>
								</button>
							</h2>
						</div>

						<div id="shadowCollapse3" class="collapse" aria-labelledby="cleanHeadingBorder3" data-parent="#accordionBottomBorder">
							<div class="card-body">
								<p class="lead">
									Sure! You can upgrade or downgrade your plan.
								</p>
							</div>
						</div>
					</div>


					<div class="card border-bottom bl-0 br-0 bt-0">
						<div class="card-header b-0 p-0 border bg-transparent" id="cleanHeadingBorder4">
							<h2 class="mb-0">
								<button class="fs--18 btn btn-link btn-block btn-lg text-align-start text-decoration-none text-dark collapsed" type="button" data-toggle="collapse" data-target="#shadowCollapse4" aria-expanded="false" aria-controls="shadowCollapse4">
									Can I upgrade my plan later?
									<span class="group-icon float-end">
										<i class="fi fi-arrow-start-slim"></i>
										<i class="fi fi-arrow-down-slim"></i>
									</span>
								</button>
							</h2>
						</div>

						<div id="shadowCollapse4" class="collapse" aria-labelledby="cleanHeadingBorder4" data-parent="#accordionBottomBorder">
							<div class="card-body">
								<p class="lead">
									Sure! You can upgrade or downgrade your plan.
								</p>
							</div>
						</div>
					</div>


					<div class="card border-bottom bl-0 br-0 bt-0">
						<div class="card-header b-0 p-0 border bg-transparent" id="cleanHeadingBorder5">
							<h2 class="mb-0">
								<button class="fs--18 btn btn-link btn-block btn-lg text-align-start text-decoration-none text-dark collapsed" type="button" data-toggle="collapse" data-target="#shadowCollapse5" aria-expanded="false" aria-controls="shadowCollapse5">
									What happens if prices goes up?
									<span class="group-icon float-end">
										<i class="fi fi-arrow-start-slim"></i>
										<i class="fi fi-arrow-down-slim"></i>
									</span>
								</button>
							</h2>
						</div>

						<div id="shadowCollapse5" class="collapse" aria-labelledby="cleanHeadingBorder5" data-parent="#accordionBottomBorder">
							<div class="card-body">
								<p class="lead">
									You keep the intial plan price for your existing account. If you open a new account, the new price is applied.
								</p>
							</div>
						</div>
					</div>


					<div class="card b-0">
						<div class="card-header b-0 p-0 border bg-transparent" id="cleanHeadingBorder6">
							<h2 class="mb-0">
								<button class="fs--18 btn btn-link btn-block btn-lg text-align-start text-decoration-none text-dark collapsed" type="button" data-toggle="collapse" data-target="#shadowCollapse6" aria-expanded="false" aria-controls="shadowCollapse6">
									Can I transfer/sell my account?
									<span class="group-icon float-end">
										<i class="fi fi-arrow-start-slim"></i>
										<i class="fi fi-arrow-down-slim"></i>
									</span>
								</button>
							</h2>
						</div>

						<div id="shadowCollapse6" class="collapse" aria-labelledby="cleanHeadingBorder6" data-parent="#accordionBottomBorder">
							<div class="card-body">
								<p class="lead">
									Sure! You can transfer or sell your account.
								</p>
							</div>
						</div>
					</div>

				</div>

				<div class="shadow-xs p-4 mt-5 fs--18">
					If you have more questions, call us: <a class="link-muted" href="tel:7853889450">785-388-9450</a>
					<small class="d-block">We truly care about our users and our product.</small>
				</div>

				

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
