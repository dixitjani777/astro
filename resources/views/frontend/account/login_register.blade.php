
<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Account - Astroduniya')
@section('description','Account')
@section('keywords','Account')
<!-- End of layout, title, description, keywords -->

<!-- toolbar page title -->
<?php 
	$toolbar_page="Account"; 
	$toolbar_title="My Account";
?>
<!-- /toolbar page title -->


<!-- Start Section -->
@section('content')
@include('frontend.layouts.subnav')

@php
	$loginMode = ($loginMode ?? 'password') === 'otp' ? 'otp' : 'password';
@endphp


<section>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-5 col-lg-5">
				<div class="p-4 rounded shadow-xs" id="account-login-shell"
					data-login-mode="{{ $loginMode }}"
					data-send-url="{{ route('otp.send') }}"
					data-verify-url="{{ route('otp.verify') }}"
					data-redirect-url="{{ url('/myaccount/querystatus') }}">

					@if (session('status'))
						<div class="alert alert-success py-2">{{ session('status') }}</div>
					@endif
					@if ($errors->any())
						<div class="alert alert-danger py-2">Please fix the highlighted fields.</div>
					@endif
					<div id="loginInlineMessage" class="alert d-none py-2"></div>

					<div id="passwordLoginPane">
						<b class="mb-4 b-0 fs--18 d-block">
							Login to your account
						</b>

						<form method="post" action="{{ route('account.login.password') }}" id="passwordLoginForm">
							@csrf

							<div class="mb-3">
								<label for="account_email" class="fs--16">Enter Email</label>
								<input required class="form-control" id="account_email" name="email" type="email" value="{{ old('email') }}" autocomplete="username">
								@error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
							</div>

							<div class="mb-3">
								<label for="account_password" class="fs--16">Enter Password</label>
								<input required class="form-control" id="account_password" name="password" type="password" autocomplete="current-password">
								@error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
							</div>

							<p class="mb-3 text-muted fs--14">Use your password, or switch to OTP login.</p>

							<div class="form-check mb-2">
								<label class="form-checkbox form-checkbox-warning form-check-label fs--15">
									<input type="checkbox" name="remember" value="1" @checked(old('remember', true))>
									<i></i>Remember Me
								</label>
							</div>

							<p class="mb-2 fs--12 p-2">
								I consent that my data is being stored in
								line with the guidelines set out in
								<a href="page-terms-and-conditions.html" target="_blank">Privacy Policy</a>.
							</p>

							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 mb-2">
									<button type="submit" class="btn btn-warning btn-block">Login With Password</button>
								</div>

								<div class="col-12 col-sm-6 col-md-6 mb-2">
									<button type="button" id="showOtpLogin" class="btn btn-soft btn-link text-dark btn-block">Login with OTP</button>
								</div>
							</div>

							<div class="mt-3">
								<a class="fs--13 text-muted" href="{{ url('/account/resetpassword') }}">Forgot password?</a>
							</div>
						</form>
					</div>

					<div id="otpLoginPane" class="d-none">
						<b class="mb-4 b-0 fs--18 d-block">
							Login to your account
						</b>

						<p class="mb-3 text-muted fs--14">
							We will send a 6-digit OTP to your registered email. The code expires in 3 minutes.
						</p>

						<div class="mb-3">
							<label for="otp_login_email" class="fs--16">Enter Email</label>
							<input required class="form-control" id="otp_login_email" type="email" value="{{ old('email') }}" autocomplete="username">
						</div>

						<div id="otpVerificationBlock" class="d-none">
							<div class="mb-3">
								<label for="otp_login_code" class="fs--16">Enter OTP</label>
								<input class="form-control" id="otp_login_code" type="text" inputmode="numeric" maxlength="6" placeholder="6-digit code" autocomplete="one-time-code">
							</div>
						</div>

						<div class="row">
							<div class="col-12 col-sm-6 col-md-6 mb-2">
								<button type="button" id="sendOtpButton" class="btn btn-warning btn-block">Send OTP</button>
							</div>

							<div class="col-12 col-sm-6 col-md-6 mb-2">
								<button type="button" id="resendOtpButton" class="btn btn-soft btn-link text-dark btn-block d-none">Resend OTP</button>
							</div>
						</div>

						<div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
							<span id="otpCountdown" class="text-muted fs--13 d-none"></span>
							<button type="button" id="backToPasswordLogin" class="btn btn-link btn-sm text-muted p-0">Use Password Login</button>
						</div>

						<div class="row d-none" id="otpActionRow">
							<div class="col-12 col-sm-6 col-md-6 mb-2">
								<button type="button" id="verifyOtpButton" class="btn btn-warning btn-block">Verify &amp; Login</button>
							</div>
							<div class="col-12 col-sm-6 col-md-6 mb-2">
								<button type="button" id="changeOtpEmail" class="btn btn-soft btn-link text-dark btn-block">Change Email</button>
							</div>
						</div>
					</div>

				</div>

			</div>

			<div class="col-12 col-sm-12 col-md-2 col-lg-2">
				<center><h2 class="or mt-7 mb-7 font-weight-normal">OR</h2></center>
			</div>

			<div class="col-12 col-sm-12 col-md-5 col-lg-5">

				<!-- SIGN UP -->
					<form method="post" action="{{ route('otp.send') }}" id="create_account_form">
						@csrf
							<b class="mb-4 b-0 fs--18">
								&nbsp;&nbsp;Create account
							</b>
						
						<div class="p-4 rounded shadow-xs">

							@if (session('status'))
								<div class="alert alert-success py-2">{{ session('status') }}</div>
							@endif
							@if ($errors->any())
								<div class="alert alert-danger py-2">Please fix the highlighted fields.</div>
							@endif

							<!-- <div class="mb-3">
								<label for="reg_first_name" class="reg_mobile fs--16">Enter Full Name</label>
								<input required id="reg_first_name" name="reg_first_name" type="text" placeholder="Name Surname" class="form-control">
							</div> -->

							<div class="mb-3">
								<label class="reg_mobile fs--16">Enter Name</label>

								<div class="row">
									<div class="col-md-6">
										<input 
											required 
											id="first_name" 
											name="first_name" 
											type="text" 
											placeholder="First Name" 
											class="form-control">
									</div>

									<div class="col-md-6">
										<input 
											required 
											id="last_name" 
											name="last_name" 
											type="text" 
											placeholder="Last Name" 
											class="form-control">
									</div>
								</div>
							</div>

							<input id="reg_name" name="name" type="hidden" value="">

							<div class="form-label-group mb-3">
								<label for="reg_email" class="fs--16">Enter Email</label>
								<input required id="reg_email" name="email" type="email" class="form-control" value="{{ old('email') }}">
								@error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
							</div>
							
							<div class="form-label-group mb-3">
								<label for="reg_mobile_input" class="fs--16">Enter Mobile (with country code)</label>
								<input required id="reg_mobile_input" type="tel" class="form-control" placeholder="+91 9876543210">
								<input id="reg_mobile" name="mobile" type="hidden" value="{{ old('mobile') }}">
								@error('mobile')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
								<span id="valid-msg-reg" class="hide fs--15 font-weight-normal">Valid</span>
								<span id="error-msg-reg" class="hide fs--15 font-weight-normal letter-spacing-03 styleColor"></span>
								
							</div>

							

							<p class="mb-3 text-muted fs--14">
								Passwordless signup: we will email you an OTP.
							</p>
							<p class="mb-3 fs--12 p-2"> 	
								I consent that my data is being stored in 
								line with the guidelines set out in  
								<a href="page-terms-and-conditions.html" target="_blank">Privacy Policy</a>. 
							</p>

							<div>
								<button type="submit" class="btn btn-warning btn-block">Continue with OTP</button>
							</div>
                            

	                        

	                        

						</div>

					</form>
					<!-- /SIGN UP -->

			</div>

		</div>

	</div>
</section>

<script>
	(function () {
		var first = document.getElementById('first_name');
		var last = document.getElementById('last_name');
		var nameHidden = document.getElementById('reg_name');
		var mobileInput = document.getElementById('reg_mobile_input');
		var mobileHidden = document.getElementById('reg_mobile');
		var form = document.getElementById('create_account_form');

		function syncName() {
			if (!nameHidden) return;
			var full = ((first && first.value) ? first.value.trim() : '') + ' ' + ((last && last.value) ? last.value.trim() : '');
			nameHidden.value = full.trim();
		}

		var iti = null;
		if (mobileInput && mobileHidden && typeof window.intlTelInput === 'function') {
			iti = window.intlTelInput(mobileInput, {
				separateDialCode: true,
				nationalMode: false,
				initialCountry: 'in',
			});
		}

		function syncMobile() {
			if (!iti || !mobileHidden) return;
			try { mobileHidden.value = iti.getNumber() || ''; } catch (e) { mobileHidden.value = ''; }
		}

		first && first.addEventListener('keyup', syncName);
		last && last.addEventListener('keyup', syncName);
		mobileInput && mobileInput.addEventListener('keyup', syncMobile);
		mobileInput && mobileInput.addEventListener('change', syncMobile);

		form && form.addEventListener('submit', function () {
			syncName();
			syncMobile();
		});

		syncName();
		syncMobile();
	})();
</script>

<script>
	(function () {
		var shell = document.getElementById('account-login-shell');
		if (!shell) return;

		var passwordPane = document.getElementById('passwordLoginPane');
		var otpPane = document.getElementById('otpLoginPane');
		var showOtpButton = document.getElementById('showOtpLogin');
		var backButton = document.getElementById('backToPasswordLogin');
		var changeEmailButton = document.getElementById('changeOtpEmail');
		var sendButton = document.getElementById('sendOtpButton');
		var resendButton = document.getElementById('resendOtpButton');
		var verifyButton = document.getElementById('verifyOtpButton');
		var otpActionRow = document.getElementById('otpActionRow');
		var passwordEmail = document.getElementById('account_email');
		var passwordInput = document.getElementById('account_password');
		var otpEmail = document.getElementById('otp_login_email');
		var otpCode = document.getElementById('otp_login_code');
		var otpBlock = document.getElementById('otpVerificationBlock');
		var countdownEl = document.getElementById('otpCountdown');
		var inlineMessage = document.getElementById('loginInlineMessage');
		var sendUrl = shell.getAttribute('data-send-url');
		var verifyUrl = shell.getAttribute('data-verify-url');
		var redirectUrl = shell.getAttribute('data-redirect-url');
		var initialMode = shell.getAttribute('data-login-mode') || 'password';
		var timerId = null;
		var otpExpiresAt = 0;

		function csrfToken() {
			var el = document.querySelector('meta[name="csrf-token"]');
			return el ? el.getAttribute('content') : '';
		}

		function showMessage(type, text) {
			if (!inlineMessage) return;
			inlineMessage.className = 'alert py-2 alert-' + (type === 'success' ? 'success' : 'danger');
			inlineMessage.textContent = text;
			inlineMessage.classList.remove('d-none');
		}

		function clearMessage() {
			if (!inlineMessage) return;
			inlineMessage.textContent = '';
			inlineMessage.classList.add('d-none');
		}

		function setPaneState(mode) {
			var showOtp = mode === 'otp';

			if (passwordPane) passwordPane.classList.toggle('d-none', showOtp);
			if (otpPane) otpPane.classList.toggle('d-none', !showOtp);

			if (passwordInput) {
				passwordInput.disabled = showOtp;
				passwordInput.required = !showOtp;
			}

			if (showOtp) {
				if (otpEmail && passwordEmail && !otpEmail.value.trim()) {
					otpEmail.value = passwordEmail.value.trim();
				}
				if (otpEmail) otpEmail.disabled = false;
				if (otpCode) otpCode.disabled = false;
				if (otpActionRow) otpActionRow.classList.add('d-none');
				if (sendButton && !otpExpiresAt) {
					sendButton.classList.remove('d-none');
					sendButton.disabled = false;
					sendButton.textContent = 'Send OTP';
				}
			} else {
				if (timerId) {
					clearInterval(timerId);
					timerId = null;
				}
				if (otpEmail) otpEmail.disabled = true;
				if (otpCode) otpCode.disabled = true;
				if (otpActionRow) otpActionRow.classList.add('d-none');
				if (sendButton) {
					sendButton.classList.remove('d-none');
					sendButton.disabled = false;
					sendButton.textContent = 'Send OTP';
				}
				if (resendButton) {
					resendButton.classList.add('d-none');
				}
				if (countdownEl) countdownEl.classList.add('d-none');
				otpExpiresAt = 0;
			}
		}

		function formatTime(totalSeconds) {
			var minutes = Math.floor(totalSeconds / 60);
			var seconds = totalSeconds % 60;
			return String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
		}

		function stopTimer(allowResend) {
			if (timerId) {
				clearInterval(timerId);
				timerId = null;
			}

			if (countdownEl) {
				countdownEl.classList.toggle('d-none', !allowResend);
			}

			if (sendButton) {
				sendButton.classList.toggle('d-none', allowResend);
				sendButton.disabled = false;
				sendButton.textContent = 'Send OTP';
			}

			if (resendButton) {
				resendButton.classList.toggle('d-none', !allowResend);
				resendButton.disabled = false;
			}

			if (otpActionRow) {
				otpActionRow.classList.remove('d-none');
			}

			otpExpiresAt = 0;
		}

		function tickTimer() {
			var remaining = Math.max(0, Math.ceil((otpExpiresAt - Date.now()) / 1000));

			if (remaining <= 0) {
				stopTimer(true);
				if (countdownEl) countdownEl.textContent = 'OTP expired. You can resend now.';
				return;
			}

			if (countdownEl) {
				countdownEl.textContent = 'OTP expires in ' + formatTime(remaining);
				countdownEl.classList.remove('d-none');
			}

			if (sendButton) {
				sendButton.disabled = true;
				sendButton.classList.remove('d-none');
				sendButton.textContent = 'OTP Sent';
			}

			if (resendButton) {
				resendButton.classList.add('d-none');
			}
		}

		function startTimer(durationSeconds) {
			otpExpiresAt = Date.now() + (durationSeconds * 1000);
			if (timerId) clearInterval(timerId);
			tickTimer();
			timerId = setInterval(tickTimer, 1000);
		}

		async function postJson(url, data) {
			var response = await fetch(url, {
				method: 'POST',
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
					'X-CSRF-TOKEN': csrfToken(),
					'X-Requested-With': 'XMLHttpRequest',
				},
				body: new URLSearchParams(data).toString(),
			});

			var payload = {};
			try {
				payload = await response.json();
			} catch (e) {
				payload = {};
			}

			if (!response.ok) {
				var errorMessage = payload.message || 'Something went wrong.';
				if (payload.errors) {
					var firstKey = Object.keys(payload.errors)[0];
					if (firstKey && payload.errors[firstKey] && payload.errors[firstKey][0]) {
						errorMessage = payload.errors[firstKey][0];
					}
				}
				throw new Error(errorMessage);
			}

			return payload;
		}

		async function sendOtp() {
			if (!otpEmail || !otpEmail.value.trim()) {
				showMessage('error', 'Please enter your email address.');
				return;
			}

			clearMessage();

			try {
				if (sendButton) sendButton.disabled = true;
				if (resendButton) resendButton.disabled = true;

				var payload = await postJson(sendUrl, { email: otpEmail.value.trim() });
				showMessage('success', payload.message || 'OTP sent successfully.');
				if (otpBlock) otpBlock.classList.remove('d-none');
				if (otpActionRow) otpActionRow.classList.remove('d-none');
				if (otpCode) {
					otpCode.value = '';
					otpCode.focus();
				}
				startTimer(parseInt(payload.expires_in || 180, 10));
			} catch (error) {
				showMessage('error', error.message || 'Unable to send OTP.');
				if (timerId) {
					clearInterval(timerId);
					timerId = null;
				}
				if (sendButton) {
					sendButton.disabled = false;
					sendButton.classList.remove('d-none');
					sendButton.textContent = 'Send OTP';
				}
				if (otpActionRow) otpActionRow.classList.add('d-none');
			}
		}

		async function verifyOtp() {
			if (!otpEmail || !otpEmail.value.trim()) {
				showMessage('error', 'Please enter your email address.');
				return;
			}

			if (!otpCode || !otpCode.value.trim()) {
				showMessage('error', 'Please enter the OTP.');
				return;
			}

			clearMessage();

			try {
				if (verifyButton) verifyButton.disabled = true;
				var payload = await postJson(verifyUrl, {
					email: otpEmail.value.trim(),
					otp: otpCode.value.trim(),
				});

				showMessage('success', payload.message || 'Logged in successfully.');
				window.location.href = payload.redirect_url || redirectUrl;
			} catch (error) {
				showMessage('error', error.message || 'OTP verification failed.');
			} finally {
				if (verifyButton) verifyButton.disabled = false;
			}
		}

		function activateOtpMode() {
			clearMessage();
			setPaneState('otp');
			if (otpEmail && passwordEmail) {
				otpEmail.value = passwordEmail.value.trim();
			}
			if (otpEmail) otpEmail.focus();
		}

		function activatePasswordMode() {
			clearMessage();
			setPaneState('password');
			if (passwordInput) passwordInput.focus();
		}

		if (showOtpButton) showOtpButton.addEventListener('click', activateOtpMode);
		if (backButton) backButton.addEventListener('click', activatePasswordMode);
		if (changeEmailButton) changeEmailButton.addEventListener('click', activatePasswordMode);
		if (sendButton) sendButton.addEventListener('click', sendOtp);
		if (resendButton) resendButton.addEventListener('click', sendOtp);
		if (verifyButton) verifyButton.addEventListener('click', verifyOtp);
		if (passwordEmail && otpEmail) {
			passwordEmail.addEventListener('input', function () {
				if (otpPane && !otpPane.classList.contains('d-none') && !otpEmail.value.trim()) {
					otpEmail.value = passwordEmail.value.trim();
				}
			});
		}

		setPaneState(initialMode);
		if (initialMode === 'otp') {
			activateOtpMode();
		}
	})();
</script>
@endsection
<!-- End Section -->
