<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Account - Astroduniya')
@section('description','Account')
@section('keywords','Account')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Account"; 
	$toolbar_title="Reset Password";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')


<!-- PASSWD RESET -->
<form method="post" action="#">
	
	<!-- title -->
	<h2 class="text-primary mb-1">
		<span class="font-weight-normal">Password</span> Reset
	</h2>
	<p class="mb-5 font-weight-medium b-0">
		Type your email and password to continue
	</p>

	<div class="p-4 rounded shadow-xs">

		<h2 class="h5 text-center mb-5 mt-3">
			Password Reset instructions are sent to your email.
		</h2>


		<!--
		<p class="text-danger">
			Ups! Please check again
		</p>
		-->


		<div class="form-label-group mb-4">
			<input required placeholder="Email" id="reset_email" name="reset_email" type="email" class="form-control">
			<label for="reset_email">Email</label>
		</div>

		<button type="submit" class="btn btn-primary btn-soft btn-block">
			Reset Password
		</button>

		<div class="text-center mt--30">
			<a href="#accordionAccountSignIn" class="d-block text-success text-decoration-none" data-toggle="collapse" aria-expanded="true" aria-controls="accordionAccountSignIn">
				Nevermind, back to Sign In
			</a>
		</div>

	</div>

</form>
<!-- /PASSWD RESET -->

@endsection