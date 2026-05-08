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

						<p class="text-muted sub_heading letter-spacing-03 badge badge-pill badge-primary badge-soft fs--15 mb-1">
							<span class="styleColor">*</span> You must <a href="{{ url('/account')}}" >Log in</a> to Book Astrologer.
						</p><br><br>

						<!-- Query Form -->
						<form novalidate method="post" action="#" class="bs-validate d-block bg-white shadow-md rounded p-4 mb-5 ">
							<p>Enter the details of the person your query is about.</p>
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-label-group mb-3">
										<input required placeholder="Name" id="name" type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Name">
										<label for="comment_name">Name</label>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-label-group mb-3">
										<select id="select_options2" class="form-control">
											<option value="male">Male</option>
											<option value="female">Female</option>
											<option value="other">Other</option>
										</select>
										<label for="select_options2">Gender</label>
									</div>
								</div>

							</div>

							<div class="row">
									<div class="col-12 col-md-6">
										<div class="form-label-group mb-3">
											<input required autocomplete="off" type="text" name="my_daterange" class="form-control rangepicker" placeholder="Date of Birth and Time" data-toggle="tooltip" data-placement="top" data-original-title="Date of Birth and Time"
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
											<input required placeholder="Birth Place" id="timepickerT" type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Birth Place">
											<label for="comment_name">Birth Place</label>
											<span class="fs--14 styleColor letter-spacing-03">* Select location from the list only.</span>
										</div>
									</div>
							</div>
							

							<div class="row">

							<!-- Name (50%) -->
							<div class="col-12 col-md-6">
								<div class="form-label-group mb-3">
									<input required autocomplete="off" type="text" name="my_daterange" 
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
										}'
									>
									<label for="my_daterange">Preferred Date & Time</label>
								</div>
							</div>

							<!-- Consultation Type (25%) -->
							<div class="col-12 col-md-3">
								<div class="form-label-group mb-3">
									<select id="consultation_type" class="form-control">
										<option value="c">Call</option>
										<option value="v">Video Call</option>
										<option value="f">Face to Face</option>
									</select>
									<label for="consultation_type">Consultation Type</label>
								</div>
							</div>

							<!-- Language (25%) -->
							<div class="col-12 col-md-3">
								<div class="form-label-group mb-3">
									<select id="language" class="form-control">
										<option value="" selected disabled>Language</option>
										<option value="hi">Hindi</option>
										<option value="en">English</option>
										<option value="gu">Gujarati</option>
										
									</select>
									<label for="language">Language</label>
								</div>
							</div>

						</div>

							<div class="clearfix mb-3">
								<div class="form-label-group">
									<textarea required rows="3" id="comment_description"
											data-output-target=".js-form-advanced-char-left" 
											class="form-control js-form-advanced-char-count-down" 
											maxlength="3000" placeholder="Your comment"></textarea>
									<label for="comment_description">Enter your query here..</label>
								</div>
								<span class="fs--12 text-muted text-align-end float-end mt-1">
									characters left: <span class="js-form-advanced-char-left">3000</span>
								</span>

							</div>

							<button type="submit" class="btn btn-warning btn-sm">
								Request to book astrologer
							</button>
						</form>
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