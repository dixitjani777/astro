<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Reset Password - Astroduniya')
@section('description','Reset Password')
@section('keywords','Reset Password')
<!-- End of layout, title, description, keywords -->

<?php
	$toolbar_page="Account";
	$toolbar_title="Reset Password";
?>

@section('content')
@include('frontend.layouts.subnav')

<section>
	<div class="container">
		<div class="row ">
			<div class="col-12 col-sm-8 col-md-8 col-lg-6 offset-sm-2 offset-md-2 offset-lg-3">
				<form method="post" action="{{ route('password.update', $token) }}">
					@csrf
					<input type="hidden" name="token" value="{{ $token }}">

					<div class="p-4 rounded shadow-xs">
						<div class="mb-3">
							<label class="fs--16 text-muted">Email</label>
							<input name="email" type="email" class="form-control" value="{{ old('email', $email) }}" required>
							@error('email')
								<div class="text-danger mt-1">{{ $message }}</div>
							@enderror
						</div>

						<div class="mb-3">
							<label class="fs--16 text-muted">New Password</label>
							<input name="password" type="password" class="form-control" required>
							@error('password')
								<div class="text-danger mt-1">{{ $message }}</div>
							@enderror
						</div>

						<div class="mb-3">
							<label class="fs--16 text-muted">Confirm Password</label>
							<input name="password_confirmation" type="password" class="form-control" required>
						</div>

						<div>
							<button type="submit" class="btn btn-warning btn-block">Reset Password</button>
						</div>

						<a href="{{ url('/account') }}" class="btn btn-soft btn-link btn-block text-muted mt--0">back to log in</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection

