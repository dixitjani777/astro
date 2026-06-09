<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Account - Astroduniya')
@section('description','Account')
@section('keywords','Account')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Account"; 
	$toolbar_title="Login with otp";
?>
<!-- /toolbar page title -->

<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')


<section>
	<div class="container">
		<div class="row ">
			<div class="col-12 col-sm-8 col-md-8 col-lg-6 offset-sm-2 offset-md-2 offset-lg-3">
				<div class="p-4 rounded shadow-xs">

					<p class="mb-4 font-weight-normal styleColor b-0 fs--16">
						We will send an OTP to your email for authentication.
					</p>

					@if (session('status'))
						<div class="alert alert-success py-2">{{ session('status') }}</div>
					@endif
					@if ($errors->any())
						<div class="alert alert-danger py-2">Please fix the highlighted fields.</div>
					@endif

					<form method="post" action="{{ route('otp.send') }}" data-recaptcha-action="otp-send">
						@csrf
						<div class="mb-3">
							<label class="fs--16 text-muted">Email</label>
							<input name="email" type="email" class="form-control" value="{{ old('email', session('otp_email')) }}" required>
							@error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
						</div>

						<div class="mb-3">
							<label class="fs--16 text-muted">Name (optional)</label>
							<input name="name" type="text" class="form-control" value="{{ old('name', session('otp_name')) }}">
							@error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
						</div>

						<div class="mb-3">
							<label class="fs--16 text-muted">WhatsApp / Mobile (optional)</label>
							<input id="otp_mobile_input" name="mobile_raw" type="tel" class="form-control" value="{{ old('mobile_raw', session('otp_mobile')) }}" placeholder="+91 9876543210">
							<input id="otp_mobile" name="mobile" type="hidden" value="{{ old('mobile', session('otp_mobile')) }}">
							@error('mobile')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
							<small class="text-muted">Include country code. Max 1MB uploads apply to images only.</small>
						</div>

						<button type="submit" class="btn btn-soft btn-warning btn-block">Send OTP</button>
					</form>

					<hr>

					<form method="post" action="{{ route('otp.verify') }}" data-recaptcha-action="otp-verify">
						@csrf
						<div class="mb-3">
							<label class="fs--16 text-muted">Email</label>
							<input name="email" type="email" class="form-control" value="{{ old('email', session('otp_email')) }}" required>
						</div>

						<div class="mb-3">
							<label class="fs--16 text-muted">OTP</label>
							<input name="otp" type="text" inputmode="numeric" pattern="[0-9]*" class="form-control" value="{{ old('otp') }}" required>
							@error('otp')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
						</div>

						<button type="submit" class="btn btn-soft btn-warning btn-block">Verify &amp; Login</button>
					</form>

					<a href="{{ url('/account') }}" class="btn btn-soft btn-link btn-block text-muted mt--0">back to log in</a>

				</div>
			</div>
		</div>
	</div>
</section>

<script>
	(function () {
		var input = document.getElementById('otp_mobile_input');
		var hidden = document.getElementById('otp_mobile');
		if (!input || !hidden || typeof window.intlTelInput !== 'function') return;

		var iti = window.intlTelInput(input, {
			separateDialCode: true,
			nationalMode: false,
			initialCountry: 'in',
		});

		function sync() {
			try { hidden.value = iti.getNumber() || ''; } catch (e) { hidden.value = ''; }
		}

		input.addEventListener('change', sync);
		input.addEventListener('keyup', sync);
		input.form && input.form.addEventListener('submit', sync);
		sync();
	})();
</script>

@endsection
