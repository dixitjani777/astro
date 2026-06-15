<!-- layout, title, description, keywords -->
@extends('frontend.layouts.master')
@section('title','Account - Astroduniya')
@section('description','Account')
@section('keywords','Account')
<!-- End of layout, title, description, keywords -->

<?php
	$toolbar_page = "Account";
	$toolbar_title = "My Account";
?>

@section('content')
@include('frontend.layouts.subnav')

@php
	$loginMode = ($loginMode ?? 'otp') === 'password' ? 'password' : 'otp';
@endphp

<section class="py-4 py-lg-5">
	<div class="container">
		<div class="row g-4 align-items-start">
			<div class="col-12 col-lg-5">
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
						<b class="mb-4 b-0 fs--18 d-block">Login to your account</b>

						<form method="post" action="{{ route('account.login.password') }}" id="passwordLoginForm" data-recaptcha-action="account-login-password">
							@csrf

							<div class="mb-3">
								<label for="account_identifier" class="fs--16">Enter Email or Mobile</label>
								<input required class="form-control" id="account_identifier" name="identifier" type="text" value="{{ old('identifier') }}" autocomplete="username" placeholder="Email or mobile with country code">
								@error('identifier')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
							</div>

							<div class="mb-3">
								<label for="account_password" class="fs--16">Enter Password</label>
								<div class="input-group">
									<input required class="form-control" id="account_password" name="password" type="password" autocomplete="current-password">
									<button type="button" class="btn btn-outline-secondary" data-toggle-password="#account_password" aria-label="Toggle password visibility">
										<i class="fa fa-eye"></i>
									</button>
								</div>
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
								I consent that my data is being stored in line with the guidelines set out in
								<a href="{{ url('/privacy') }}" target="_blank">Privacy Policy</a>.
							</p>

							<div class="row">
								<div class="col-12 col-sm-6 mb-2">
									<button type="submit" class="btn btn-warning btn-block">Login With Password</button>
								</div>
								<div class="col-12 col-sm-6 mb-2">
									<button type="button" id="showOtpLogin" class="btn btn-soft btn-link text-dark btn-block">Login with OTP</button>
								</div>
							</div>

							<div class="mt-3">
								<a class="fs--13 text-muted" href="{{ url('/account/resetpassword') }}">Forgot password?</a>
							</div>
						</form>
					</div>

					<div id="otpLoginPane" class="d-none">
						<b class="mb-4 b-0 fs--18 d-block">Login with OTP</b>

						<p class="mb-2 text-muted fs--14" id="otpLoginHint">
							Enter your email or mobile number. Indian accounts can use mobile OTP login, while NRI accounts use email only.
						</p>

						<input type="hidden" id="otp_login_country_code" value="">
						<input type="hidden" id="otp_login_email" value="">

						<div class="mb-3">
							<label for="otp_login_identifier" class="fs--16">Enter Email or Mobile</label>
							<input required class="form-control" id="otp_login_identifier" type="text" autocomplete="username" placeholder="Email or mobile with country code">
						</div>

						<div id="otpVerificationBlock" class="d-none">
							<div class="mb-3">
								<label for="otp_login_code" class="fs--16">Enter OTP</label>
								<input class="form-control" id="otp_login_code" type="text" inputmode="numeric" maxlength="6" placeholder="6-digit code" autocomplete="one-time-code">
							</div>
						</div>

						<div class="row">
							<div class="col-12 col-sm-6 mb-2">
								<button type="button" id="sendOtpButton" class="btn btn-warning btn-block">Send OTP</button>
							</div>
							<div class="col-12 col-sm-6 mb-2">
								<button type="button" id="resendOtpButton" class="btn btn-soft btn-link text-dark btn-block d-none">Resend OTP</button>
							</div>
						</div>

						<div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
							<span id="otpCountdown" class="text-muted fs--13 d-none"></span>
							<button type="button" id="backToPasswordLogin" class="btn btn-link btn-sm text-muted p-0">Use Password Login</button>
						</div>

						<div class="row d-none" id="otpActionRow">
							<div class="col-12 col-sm-6 mb-2">
								<button type="button" id="verifyOtpButton" class="btn btn-warning btn-block">Verify &amp; Login</button>
							</div>
							<div class="col-12 col-sm-6 mb-2">
								<button type="button" id="changeOtpEmail" class="btn btn-soft btn-link text-dark btn-block">Change Email / Mobile</button>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-2">
				<center><h2 class="or mt-7 mb-7 font-weight-normal">OR</h2></center>
			</div>

			<div class="col-12 col-lg-5">
				<form method="post" action="{{ route('otp.send') }}" id="create_account_form">
					@csrf
					<input type="hidden" name="purpose" value="register">
					<input type="hidden" name="country_code" id="reg_country_code" value="">

					<b class="mb-4 b-0 fs--18 d-block">Create account</b>

					<div class="p-4 rounded shadow-xs">
						@if (session('status'))
							<div class="alert alert-success py-2">{{ session('status') }}</div>
						@endif
						@if ($errors->any())
							<div class="alert alert-danger py-2">Please fix the highlighted fields.</div>
						@endif

						<div class="mb-3">
							<label class="reg_mobile fs--16">Enter Name</label>
							<div class="row">
								<div class="col-md-6 mb-2 mb-md-0">
									<input required id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control" value="{{ old('first_name') }}">
								</div>
								<div class="col-md-6">
									<input required id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control" value="{{ old('last_name') }}">
								</div>
							</div>
						</div>

						<input id="reg_name" name="name" type="hidden" value="{{ old('name') }}">

						<div class="form-label-group mb-3">
							<label for="reg_email" class="fs--16">Enter Email</label>
							<input required id="reg_email" name="email" type="email" class="form-control" value="{{ old('email') }}" autocomplete="email">
							@error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
						</div>

						<div class="form-label-group mb-3">
							<label for="reg_mobile_input" class="fs--16">Enter WhatsApp / Mobile (with country code)</label>
							<input required id="reg_mobile_input" name="mobile_raw" type="tel" class="form-control" placeholder="+91 9876543210">
							<input id="reg_mobile" name="mobile" type="hidden" value="{{ old('mobile') }}">
							@error('mobile')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
							<span id="valid-msg-reg" class="hide fs--15 font-weight-normal">Valid</span>
							<span id="error-msg-reg" class="hide fs--15 font-weight-normal letter-spacing-03 styleColor"></span>
						</div>

						<div class="mb-3">
							<label for="reg_password" class="fs--16">Create Password</label>
							<div class="input-group">
								<input required id="reg_password" name="password" type="password" class="form-control" autocomplete="new-password">
								<button type="button" class="btn btn-outline-secondary" data-toggle-password="#reg_password" aria-label="Toggle password visibility">
									<i class="fa fa-eye"></i>
								</button>
							</div>
							@error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
						</div>

						<p class="mb-3 text-muted fs--14" id="registrationFlowHint">
							Indian users will verify both email and mobile. NRI users will verify email only and their mobile will be stored for profile use.
						</p>

						<div id="createOtpBlock" class="mb-3 d-none">
							<label for="create_account_otp" class="fs--16">Enter OTP</label>
							<input id="create_account_otp" name="otp" type="text" inputmode="numeric" maxlength="6" class="form-control" placeholder="6-digit code" autocomplete="one-time-code">
							@error('otp')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
						</div>

						<div class="row d-none" id="createOtpActionRow">
							<div class="col-12 col-sm-6 mb-2">
								<button type="button" id="verifyCreateOtpButton" class="btn btn-warning btn-block">Verify &amp; Create Account</button>
							</div>
							<div class="col-12 col-sm-6 mb-2">
								<button type="button" id="resendCreateOtpButton" class="btn btn-soft btn-link text-dark btn-block">Resend OTP</button>
							</div>
						</div>

						<div id="createOtpCountdown" class="text-muted fs--13 mb-3 d-none"></div>
						<p class="mb-3 fs--12 p-2">
							I consent that my data is being stored in line with the guidelines set out in
							<a href="{{ url('/privacy') }}" target="_blank">Privacy Policy</a>.
						</p>

						<div>
							<button type="submit" id="sendCreateOtpButton" class="btn btn-warning btn-block">Continue with OTP</button>
						</div>
					</div>
				</form>
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
		var countryHidden = document.getElementById('reg_country_code');
		var form = document.getElementById('create_account_form');
		var otpBlock = document.getElementById('createOtpBlock');
		var otpInput = document.getElementById('create_account_otp');
		var otpActionRow = document.getElementById('createOtpActionRow');
		var otpCountdown = document.getElementById('createOtpCountdown');
		var sendButton = document.getElementById('sendCreateOtpButton');
		var resendButton = document.getElementById('resendCreateOtpButton');
		var verifyButton = document.getElementById('verifyCreateOtpButton');
		var otpExpiresAt = 0;
		var timerId = null;
		var currentCountryCode = 'in';

		function csrfToken() {
			var el = document.querySelector('meta[name="csrf-token"]');
			return el ? el.getAttribute('content') : '';
		}

		function detectCountry(callback) {
			fetch('https://ipapi.co/json/')
				.then(function (response) { return response.json(); })
				.then(function (data) {
					callback((data && data.country_code ? String(data.country_code) : 'in').toLowerCase());
				})
				.catch(function () {
					callback('in');
				});
		}

		function recaptchaToken(action) {
			if (window.appRecaptcha && typeof window.appRecaptcha.execute === 'function') {
				return window.appRecaptcha.execute(action || 'submit');
			}

			return Promise.resolve('');
		}

		function showMessage(type, text) {
			if (!form) return;
			var existing = form.querySelector('[data-create-otp-message="1"]');
			if (!existing) {
				existing = document.createElement('div');
				existing.setAttribute('data-create-otp-message', '1');
				existing.className = 'alert py-2 d-none';
				form.insertBefore(existing, form.querySelector('.p-4') || form.firstChild);
			}
			existing.className = 'alert py-2 alert-' + (type === 'success' ? 'success' : 'danger');
			existing.textContent = text;
			existing.classList.remove('d-none');
		}

		function clearMessage() {
			if (!form) return;
			var existing = form.querySelector('[data-create-otp-message="1"]');
			if (existing) {
				existing.textContent = '';
				existing.classList.add('d-none');
			}
		}

		function formatTime(totalSeconds) {
			var minutes = Math.floor(totalSeconds / 60);
			var seconds = totalSeconds % 60;
			return String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
		}

		function stopTimer(showResend) {
			if (timerId) {
				clearInterval(timerId);
				timerId = null;
			}
			if (otpCountdown) {
				otpCountdown.classList.toggle('d-none', !showResend);
			}
			if (sendButton) {
				sendButton.classList.toggle('d-none', showResend);
				sendButton.disabled = false;
				sendButton.textContent = 'Continue with OTP';
			}
			if (resendButton) {
				resendButton.classList.toggle('d-none', !showResend);
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
				if (otpCountdown) otpCountdown.textContent = 'OTP expired. You can resend now.';
				return;
			}
			if (otpCountdown) {
				otpCountdown.textContent = 'OTP expires in ' + formatTime(remaining);
				otpCountdown.classList.remove('d-none');
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
				initialCountry: 'auto',
				geoIpLookup: detectCountry,
			});
		}

		function syncMobile() {
			if (!mobileHidden) return;
			if (iti) {
				try {
					mobileHidden.value = iti.getNumber() || (mobileInput ? mobileInput.value.trim() : '');
				} catch (e) {
					mobileHidden.value = mobileInput ? mobileInput.value.trim() : '';
				}
				return;
			}

			mobileHidden.value = mobileInput ? mobileInput.value.trim() : '';
		}

		function setCountryCode(code) {
			currentCountryCode = (code || 'in').toLowerCase();
			if (countryHidden) countryHidden.value = currentCountryCode;
			var hint = document.getElementById('otpLoginHint');
			if (hint) {
				hint.textContent = currentCountryCode === 'in'
					? 'Indian accounts can use mobile OTP login or email OTP login.'
					: 'NRI accounts use email OTP login.';
			}
		}

		function syncCountryCode() {
			detectCountry(function (code) {
				setCountryCode(code);
			});
		}

		first && first.addEventListener('keyup', syncName);
		last && last.addEventListener('keyup', syncName);
		mobileInput && mobileInput.addEventListener('keyup', syncMobile);
		mobileInput && mobileInput.addEventListener('change', syncMobile);

		form && form.addEventListener('submit', function (event) {
			event.preventDefault();
			syncName();
			syncMobile();
			sendCreateOtp();
		});

		syncName();
		syncMobile();
		syncCountryCode();

		function showOtpStep() {
			if (otpBlock) otpBlock.classList.remove('d-none');
			if (otpActionRow) otpActionRow.classList.remove('d-none');
			if (otpInput) {
				otpInput.value = '';
				otpInput.focus();
			}
		}

		async function sendCreateOtp() {
			if (!form) return;
			if (!mobileHidden || !mobileHidden.value.trim()) syncMobile();
			if (!document.getElementById('reg_email').value.trim()) {
				showMessage('error', 'Please enter your email address.');
				return;
			}

			clearMessage();

			try {
				if (sendButton) sendButton.disabled = true;
				if (resendButton) resendButton.disabled = true;

				var payloadData = new FormData(form);
				payloadData.set('country_code', currentCountryCode);
				payloadData.set('recaptcha_token', await recaptchaToken('otp_send'));
				var payload = await postJson(form.action, payloadData);
				showMessage('success', payload.message || 'OTP sent successfully. Please check your inbox.');
				showOtpStep();
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
					sendButton.textContent = 'Continue with OTP';
				}
				if (otpActionRow) otpActionRow.classList.add('d-none');
			}
		}

		async function verifyCreateOtp() {
			if (!otpInput || !otpInput.value.trim()) {
				showMessage('error', 'Please enter the OTP.');
				return;
			}

			clearMessage();

			try {
				if (verifyButton) verifyButton.disabled = true;
				var payload = await postJson(document.querySelector('#account-login-shell').getAttribute('data-verify-url'), {
					email: document.getElementById('reg_email').value.trim(),
					otp: otpInput.value.trim(),
					purpose: 'register',
					recaptcha_token: await recaptchaToken('otp_verify'),
				});
				showMessage('success', payload.message || 'Account created successfully.');
				window.location.href = payload.redirect_url || document.querySelector('#account-login-shell').getAttribute('data-redirect-url');
			} catch (error) {
				showMessage('error', error.message || 'OTP verification failed.');
			} finally {
				if (verifyButton) verifyButton.disabled = false;
			}
		}

		if (sendButton) sendButton.addEventListener('click', function (e) {
			e.preventDefault();
			syncName();
			syncMobile();
			sendCreateOtp();
		});
		if (resendButton) resendButton.addEventListener('click', function (e) {
			e.preventDefault();
			sendCreateOtp();
		});
		if (verifyButton) verifyButton.addEventListener('click', function (e) {
			e.preventDefault();
			verifyCreateOtp();
		});
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
		var passwordInput = document.getElementById('account_password');
		var otpIdentifier = document.getElementById('otp_login_identifier');
		var otpCode = document.getElementById('otp_login_code');
		var otpBlock = document.getElementById('otpVerificationBlock');
		var countdownEl = document.getElementById('otpCountdown');
		var inlineMessage = document.getElementById('loginInlineMessage');
		var otpEmail = document.getElementById('otp_login_email');
		var otpCountry = document.getElementById('otp_login_country_code');
		var sendUrl = shell.getAttribute('data-send-url');
		var verifyUrl = shell.getAttribute('data-verify-url');
		var redirectUrl = shell.getAttribute('data-redirect-url');
		var initialMode = shell.getAttribute('data-login-mode') || 'password';
		var timerId = null;
		var otpExpiresAt = 0;
		var currentCountryCode = 'in';
		var pendingEmail = '';

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

		function normalizeCountry(code) {
			return (code || 'in').toLowerCase();
		}

		function setCountryAwareCopy(code) {
			currentCountryCode = normalizeCountry(code);
			if (otpCountry) otpCountry.value = currentCountryCode;
			if (otpIdentifier) {
				otpIdentifier.placeholder = currentCountryCode === 'in'
					? 'Email or mobile with country code'
					: 'Email address';
			}
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
				if (otpIdentifier) otpIdentifier.disabled = false;
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
				if (otpIdentifier) otpIdentifier.disabled = false;
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
				pendingEmail = '';
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

		function syncOtpEmailFromIdentifier() {
			if (!otpIdentifier || !otpEmail) return;
			otpEmail.value = otpIdentifier.value.trim();
		}

		function syncCountryFromIndicator(code) {
			setCountryAwareCopy(code || 'in');
		}

		function detectCountry(callback) {
			fetch('https://ipapi.co/json/')
				.then(function (response) { return response.json(); })
				.then(function (data) {
					callback((data && data.country_code ? String(data.country_code) : 'in').toLowerCase());
				})
				.catch(function () {
					callback('in');
				});
		}

		function recaptchaToken(action) {
			if (window.appRecaptcha && typeof window.appRecaptcha.execute === 'function') {
				return window.appRecaptcha.execute(action || 'submit');
			}

			return Promise.resolve('');
		}

		function showLoginOtpStep(email) {
			pendingEmail = email || pendingEmail;
			if (otpEmail) otpEmail.value = pendingEmail;
			if (otpBlock) otpBlock.classList.remove('d-none');
			if (otpActionRow) otpActionRow.classList.remove('d-none');
			if (otpCode) {
				otpCode.value = '';
				otpCode.focus();
			}
		}

		async function sendOtp() {
			if (!otpIdentifier || !otpIdentifier.value.trim()) {
				showMessage('error', 'Please enter your email or mobile number.');
				return;
			}

			clearMessage();

			try {
				if (sendButton) sendButton.disabled = true;
				if (resendButton) resendButton.disabled = true;

				var payload = await postJson(sendUrl, {
					identifier: otpIdentifier.value.trim(),
					purpose: 'login',
					country_code: currentCountryCode,
					recaptcha_token: await recaptchaToken('otp_send'),
				});

				showMessage('success', payload.message || 'OTP sent successfully.');
				syncLoginCountryText();
				showLoginOtpStep(payload.email || otpIdentifier.value.trim());
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
				showMessage('error', 'Please enter your email or mobile number again.');
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
					purpose: 'login',
					recaptcha_token: await recaptchaToken('otp_verify'),
				});

				showMessage('success', payload.message || 'Logged in successfully.');
				window.location.href = payload.redirect_url || redirectUrl;
			} catch (error) {
				showMessage('error', error.message || 'OTP verification failed.');
			} finally {
				if (verifyButton) verifyButton.disabled = false;
			}
		}

		function syncLoginCountryText() {
			var hint = document.getElementById('otpLoginHint');
			if (!hint) return;
			hint.textContent = currentCountryCode === 'in'
				? 'Indian accounts can use mobile OTP login or email OTP login.'
				: 'NRI accounts use email OTP login.';
		}

		function activateOtpMode() {
			clearMessage();
			setPaneState('otp');
			if (otpIdentifier && document.getElementById('account_identifier') && !otpIdentifier.value.trim()) {
				otpIdentifier.value = document.getElementById('account_identifier').value.trim();
			}
			syncOtpEmailFromIdentifier();
			if (otpIdentifier) otpIdentifier.focus();
		}

		function activatePasswordMode() {
			clearMessage();
			setPaneState('password');
			if (passwordInput) passwordInput.focus();
		}

		function bindPasswordToggle() {
			Array.prototype.forEach.call(document.querySelectorAll('[data-toggle-password]'), function (button) {
				button.addEventListener('click', function () {
					var selector = button.getAttribute('data-toggle-password');
					var input = selector ? document.querySelector(selector) : null;
					if (!input) return;

					var isPassword = input.getAttribute('type') === 'password';
					input.setAttribute('type', isPassword ? 'text' : 'password');
					button.innerHTML = isPassword ? '<i class="fa fa-eye-slash"></i>' : '<i class="fa fa-eye"></i>';
				});
			});
		}

		if (showOtpButton) showOtpButton.addEventListener('click', activateOtpMode);
		if (backButton) backButton.addEventListener('click', activatePasswordMode);
		if (changeEmailButton) changeEmailButton.addEventListener('click', activatePasswordMode);
		if (sendButton) sendButton.addEventListener('click', sendOtp);
		if (resendButton) resendButton.addEventListener('click', sendOtp);
		if (verifyButton) verifyButton.addEventListener('click', verifyOtp);
		if (otpIdentifier) {
			otpIdentifier.addEventListener('input', function () {
				syncOtpEmailFromIdentifier();
			});
		}

		bindPasswordToggle();

		detectCountry(function (code) {
			syncCountryFromIndicator(code);
			syncLoginCountryText();
		});

		setPaneState(initialMode);
		syncLoginCountryText();
		if (initialMode === 'otp') {
			activateOtpMode();
		}
	})();
</script>
@endsection
