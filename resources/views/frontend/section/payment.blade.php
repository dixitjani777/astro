<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Payment - Astroduniya')
@section('description','pending')
@section('keywords','pending')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Payment"; 
	$toolbar_title="Payment";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

<!-- CONTENT -->
<section>
	<div class="container">

		<p>AstroDuniya offers multiple payment methods. Whatever your online mode of payment, you can rest assured that AstroSage's trusted payment gateway partners use secure encryption technology to keep your transaction details confidential at all times.</p>

		<p>You can pay by all major credit cards and debit cards issued by Indian banks. You can also use Internet Banking, and cash-card Voucher to make your purchase.</p>

		<p class="fs--20">Cheque or DD : Once you receive your order confirmation; please ensure that you clearly write your order no. and email id at the back of the cheque/draft. Once we receive the same, you will receive a confirmation e-mail from us. Kindly note that no order is processed unless we receive your payment in advance.</p>

		<ul>
			<li>What personally identifiable information is collected from you through the web site, how it is used and with whom it may be shared.</li>
			<li>What choices are available to you regarding the use of your data. The security procedures in place to protect the misuse of your information.</li>
			<li>How you can correct any inaccuracies in the information.</li>
		</ul><br/>


		<hr class="half-margins" /><!-- separator -->

		<h3 class="mb-4 my-4">Your Access to and Control Over Information</h3>
		<p>You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:</p>
		<ul>
			<li>See what data we have about you, if any.</li>
			<li>Change/correct any data we have about you.</li>
			<li>Have us delete any data we have about you.</li>
			<li>Express any concern you have about our use of your data.</li>
		</ul>

	</div>
</section>
<!-- /CONTENT -->
	
@endsection
<!-- End Section -->
