<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Contact Us - Astroduniya')
@section('description','Contact Us')
@section('keywords','Contact Us')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Contact Us"; 
	$toolbar_title="Contact Us";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<!-- block : contact -->
<section id="section_contact">
	<div class="container">

		<div class="row">

			<div class="col-12 col-lg-6 mb-5">

				<h2 class="font-weight-light mb-5">
					<!-- <span class="font-weight-medium">AstroDuniya</span> Contact! -->
					<small class="d-block h6">Let us know how can we help you!</small>
				</h2>


				<div class="row">

					<!-- call us -->
					<div class="col-12 col-sm-6 mb-4">
						<h3 class="font-weight-medium h5 mb-4">
							Call Us
						</h3>

						<p class="m-0">
							<a href="tel:{{ $siteSettings['site.phone'] ?? '(+91) 2818-7280' }}" class="link-muted">{{ $siteSettings['site.phone'] ?? '(+91) 2818-7280' }}</a>
						</p>
						<p class="m-0">
							<a href="mailto:{{ $siteSettings['site.email'] ?? 'support@astroduniya.com' }}" class="link-muted">{{ $siteSettings['site.email'] ?? 'support@astroduniya.com' }}</a>
						</p>
					</div>

					<!-- address -->
					<div class="col-12 col-sm-6 mb-4">

						<h3 class="font-weight-medium h5 mb-4">
							Our Address
						</h3>

						<p class="m-0">
							{!! $siteSettings['contact.address_html'] ?? 'N-1, Baldev Jyot<br>Modi Patel Road, Bhayander<br>Thane 401101, India' !!}
						</p>

					</div>

					<!-- Business Hours -->
					<div class="col-12 col-sm-6 mb-4">

						<h3 class="font-weight-medium h5 mb-4">
							Business Hours
						</h3>

						<p class="m-0">
							{{ $siteSettings['contact.business_hours'] ?? 'Monday - Sunday : 9am to 9pm' }}<BR/>
							
							<!-- Sunday : Closed -->
						</p>

					</div>

					<!-- SOCIAL MEDIA -->
					<div class="col-12 col-sm-6 mb-4">

						<h3 class="font-weight-medium h5 mb-4">
							Keep in Touch with US
						</h3>

						<p class="m-0">
							 <div class="clearfix"> 
	                    <a href="{{ $siteSettings['social.whatsapp'] ?? 'https://wa.me/919699342442/?text=subscribe' }}" target="_blank" aria-label="whatsapp page">
	                       <img src="{{ asset('images/social/whatsapp.png') }}" width="30px" height="30px" alt="whatsapp">
	                    </a>&nbsp;

	                    <a href="{{ $siteSettings['social.facebook'] ?? '#!' }}" target="_blank" aria-label="facebook page">
	                       <img src="{{ asset('images/social/facebook.png') }}" width="30px" height="30px" alt="facebook">
	                    </a>&nbsp;

	                    <a href="{{ $siteSettings['social.twitter'] ?? '#!' }}" target="_blank" aria-label="twitter page">
	                        <img src="{{ asset('images/social/twitter.png') }}" width="30px" height="30px" alt="twitter">
	                    </a>&nbsp;

	                    <a href="{{ $siteSettings['social.youtube'] ?? '#!' }}" target="_blank" aria-label="youtube page">
	                        <img src="{{ asset('images/social/utube.png') }}" width="30px" height="30px" alt="youtube">
	                    </a>&nbsp;
	                   
	                    <a href="{{ $siteSettings['social.instagram'] ?? '#!' }}" target="_blank" aria-label="instagram page">
	                       <img src="{{ asset('images/social/instagram.png') }}" width="30px" height="30px" alt="instagram">
	                    </a>
	                </div>
						</p>

					</div>
				</div>



				<div class="bg-white shadow-primary-xs rounded p-2 mt-5">

					<!--
						Map
					-->
					<div class="map-leaflet h--400 w-100 rounded" 
						data-map-tile="voyager" 
						data-map-zoom="8" 
						data-map-json='[
							{ 
								"map_lat": 19.2550,
								"map_long": 72.8657,
								"map_popup": "<b>Brahma Vishnu Mahesh Temple</b> <br> 7V8H+R4G, Ovaripada<br> Dahisar East, Mumbai, Mira Bhayandar, Maharashtra 401107 <br> <a href=`tel:7853889450`>(+91) 2818-7280</a>"
							}
						]'><!-- map container--></div>

				</div>

			</div>

			<div class="col-12 col-lg-6">

				<div class="rounded bg-white shadow-xs d-flex">
					<div class="m-5 m-4-xs">

						<h2 class="h3-xs font-weight-light mb-5">
							Send us a message
						</h2>


						<!-- 
							CONTACT FORM : AJAX 

								Plugin required: SOW Ajax Forms

								In order to work as ajax form, SOW Ajax Forms should be available/enabled
								Else, SOW Form Validation plugin is used.
								If none of them are available, normal submit is used and you can remove:
									.js-ajax
									.bs-validate
									novalidate
									any data-ajax-*
									any data-error-*

								** Remove data-error-toast-* for no error toast notifications

							+++++++++++++++++++++++++++++++++++++++++++++++++++++++
							NOTE: method="GET" is used in this demo!
							Most contact form are using "POST". So change as you need!
							The URL you post the data, should also return a success message
							like the one in action="_ajax/ajax_form_test_submit.html"
							+++++++++++++++++++++++++++++++++++++++++++++++++++++++
						-->
						<x-enquiry-form
							layout="floating"
							class="bs-validate"
							source="contact"
							context="contact_page"
							subject="Contact Us"
							submit-label="Send Message"
							consent-label="I consent that my data is being stored in line with the guidelines set out in <a href=\"/privacy\" target=\"_blank\">Privacy Policy</a>."
							/>
						<!-- /CONTACT FORM : AJAX -->


					</div>
				</div>

			</div>

		</div>

	</div>
</section>
<!-- /block : contact -->

@endsection
<!-- End Section -->
