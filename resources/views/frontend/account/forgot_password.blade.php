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


<section>
	<div class="container">
		<div class="row ">
			<div class="col-12 col-sm-8 col-md-8 col-lg-6 offset-sm-2 offset-md-2 offset-lg-3">
				<form method="post" action="{{ route('password.email') }}" data-recaptcha-action="password-reset-link">
					@csrf

					<div class="p-4 rounded shadow-xs">
						<p class="mb-4 font-weight-normal fs--16 styleColor b-0">
							Enter your email address to receive a password reset link.
						</p>

						@if(session('error'))
							<div class="alert alert-danger">{{ session('error') }}</div>
						@endif
						@if ($errors->any())
							<div class="alert alert-danger">{{ $errors->first() }}</div>
						@endif

						<div class="mb-3">
							<label class="fs--16 text-muted">Email</label>
							<input name="email" type="email" class="form-control" value="{{ old('email') }}" required>
							@error('email')
								<div class="text-danger mt-1">{{ $message }}</div>
							@enderror
						</div>

						<div>
							<button type="submit" class="btn btn-warning btn-block">Send reset link</button>
						</div>

						<a href="{{ url('/account') }}" class="btn btn-soft btn-link btn-block text-muted mt--0">back to log in</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection
