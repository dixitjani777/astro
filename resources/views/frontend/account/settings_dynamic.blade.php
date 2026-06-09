<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Account Settings - Astroduniya')
@section('description','Account Settings')
@section('keywords','Account Settings')
<!-- End of layout, title, description, keywords -->

<?php
	$toolbar_page="Account";
	$toolbar_title="Account Settings";
?>

@section('content')
@include('frontend.layouts.subnav')

@php
	$otpVerified = session()->has('settings_password_otp_verified_at');
@endphp

<section>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-3 mb--60">
				@include('frontend.account.sidebar.sidebar')
			</div>

			<div class="col-12 col-sm-12 col-md-12 col-lg-9">
				@if(session('status'))
					<div class="alert alert-success mb-3">{{ session('status') }}</div>
				@endif
				@if(session('error'))
					<div class="alert alert-danger mb-3">{{ session('error') }}</div>
				@endif
				@if($errors->any())
					<div class="alert alert-danger mb-3">{{ $errors->first() }}</div>
				@endif

				<div class="portlet mb-4">
					<div class="portlet-header border-bottom">
						<span class="d-block text-muted text-truncate font-weight-medium pt-1">Profile</span>
					</div>
					<div class="portlet-body">
						<form method="post" action="{{ route('myaccount.settings.update') }}">
							@csrf

							<div class="mb-3">
								<label class="form-label">Email</label>
								<input class="form-control" value="{{ $user->email }}" disabled>
							</div>

							<div class="mb-3">
								<label class="form-label">Full Name</label>
								<input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required>
								@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>

							<div class="mb-3">
								<label class="form-label">WhatsApp / Mobile Number</label>
								<input id="profile_mobile_input" name="mobile_raw" type="tel" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile_raw', $user->mobile) }}" placeholder="+91 9876543210">
								<input id="profile_mobile" name="mobile" type="hidden" value="{{ old('mobile', $user->mobile) }}">
								@error('mobile')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
							</div>

							<div class="row">
								<div class="col-md-6 mb-3">
									<label class="form-label">Date of Birth</label>
									<input class="form-control @error('dob') is-invalid @enderror" type="date" name="dob" value="{{ old('dob', optional($user->dob)->format('Y-m-d')) }}">
									@error('dob')<div class="invalid-feedback">{{ $message }}</div>@enderror
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">Pincode</label>
									<input class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ old('pincode', $user->pincode) }}">
									@error('pincode')<div class="invalid-feedback">{{ $message }}</div>@enderror
								</div>
							</div>

							<div class="mb-3">
								<label class="form-label">Location / Area</label>
								<input class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location', $user->location) }}">
								@error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
							</div>

							<div class="row">
								<div class="col-md-6 mb-3">
									<label class="form-label">State</label>
									<input class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state', $user->state) }}">
									@error('state')<div class="invalid-feedback">{{ $message }}</div>@enderror
								</div>
								<div class="col-md-6 mb-3">
									<label class="form-label">City</label>
									<input class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $user->city) }}">
									@error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
								</div>
							</div>

							<button class="btn btn-warning" type="submit">Save</button>
						</form>
					</div>
				</div>

				<div class="portlet">
					<div class="portlet-header border-bottom">
						<span class="d-block text-muted text-truncate font-weight-medium pt-1">Change Password</span>
					</div>
					<div class="portlet-body">
						@if($otpVerified)
							<div class="alert alert-success py-2">
								OTP verified for this session. You can update your password without entering the current password.
							</div>
						@else
							<div class="alert alert-info py-2">
								If you do not remember your current password, verify with OTP first.
							</div>
						@endif

						<div class="row">
							<div class="col-lg-6 mb-4">
								<form method="post" action="{{ route('myaccount.password.otp.send') }}" data-recaptcha-action="password_otp_send">
									@csrf
									<div class="mb-3">
										<label class="form-label">Send OTP to Email</label>
										<div class="d-flex gap-2 flex-wrap">
											<button class="btn btn-outline-secondary" type="submit">Send OTP</button>
										</div>
									</div>
								</form>

								<form method="post" action="{{ route('myaccount.password.otp.verify') }}">
									@csrf
									<div class="mb-3">
										<label class="form-label">OTP</label>
										<input class="form-control @error('otp') is-invalid @enderror" name="otp" inputmode="numeric" maxlength="6" placeholder="Enter 6-digit code">
										@error('otp')<div class="invalid-feedback">{{ $message }}</div>@enderror
									</div>
									<button class="btn btn-warning" type="submit">Verify OTP</button>
								</form>
							</div>

							<div class="col-lg-6">
								<form method="post" action="{{ route('myaccount.password.update') }}">
									@csrf

									<div class="mb-3">
										<label class="form-label">Current Password</label>
										<input class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password" autocomplete="current-password" {{ $otpVerified ? '' : 'required' }}>
										@error('current_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
									</div>

									<div class="mb-3">
										<label class="form-label">New Password</label>
										<input class="form-control @error('password') is-invalid @enderror" type="password" name="password" autocomplete="new-password" required>
										@error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
									</div>

									<div class="mb-3">
										<label class="form-label">Confirm New Password</label>
										<input class="form-control" type="password" name="password_confirmation" autocomplete="new-password" required>
									</div>

									<button class="btn btn-warning" type="submit">Update Password</button>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<script>
	(function () {
		var mobileInput = document.getElementById('profile_mobile_input');
		var mobileHidden = document.getElementById('profile_mobile');
		if (!mobileInput || !mobileHidden || typeof window.intlTelInput !== 'function') return;

		var iti = window.intlTelInput(mobileInput, {
			separateDialCode: true,
			nationalMode: false,
			initialCountry: 'in',
		});

		function syncMobile() {
			try { mobileHidden.value = iti.getNumber() || ''; } catch (e) { mobileHidden.value = ''; }
		}

		mobileInput.addEventListener('change', syncMobile);
		mobileInput.addEventListener('keyup', syncMobile);
		mobileInput.form && mobileInput.form.addEventListener('submit', syncMobile);
		syncMobile();
	})();
</script>
@endsection
