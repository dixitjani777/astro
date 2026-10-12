@extends('frontend.themes.light.layouts.master')

@section('title', 'Account - Astroduniya')
@section('description', 'Sign in or create your Astroduniya account.')
@section('keywords', 'account login, Astroduniya')

@section('content')
@php($loginMode = ($loginMode ?? 'otp') === 'password' ? 'password' : 'otp')
<section class="hs_indx_title_main_wrapper">
    <div class="hs_title_img_overlay"></div>
    <div class="container"><div class="row">
        <div class="col-lg-12 full_width"><div class="hs_indx_title_left_wrapper"><h2>My Account</h2></div></div>
        <div class="col-lg-12 full_width"><div class="hs_indx_title_right_wrapper"><ul><li><a href="{{ url('/') }}">Home</a> &nbsp;&nbsp;&nbsp;&gt;</li><li>My Account</li></ul></div></div>
    </div></div>
</section>

<section class="light-account-entry-section">
    <div class="container"><div class="container"><div class="row">
        <div class="col-12 col-lg-5">
            <div id="account-login-shell" data-login-mode="{{ $loginMode }}" data-send-url="{{ route('otp.send') }}" data-verify-url="{{ route('otp.verify') }}" data-redirect-url="{{ url('/myaccount/querystatus') }}">
                <div id="accountLoginMessage" class="alert d-none" role="status"></div>
                @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
                @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif

                <div id="otpLoginPane" class="{{ $loginMode === 'otp' ? '' : 'd-none' }}">
                    <b>Login with OTP</b>
                    <p id="otpLoginHint">Indian accounts can use mobile OTP login or email OTP login.</p>
                    <input type="hidden" id="otp_login_country_code" value="in">
                    <input type="hidden" id="otp_login_email" value="">
                    <div class="form-group"><label for="otp_login_identifier">Email or mobile</label><input id="otp_login_identifier" class="form-control" type="text" autocomplete="username" placeholder="Email or mobile with country code"></div>
                    <div id="otpVerificationBlock" class="d-none"><div class="form-group"><label for="otp_login_code">Enter OTP</label><input id="otp_login_code" class="form-control" type="text" inputmode="numeric" maxlength="6" autocomplete="one-time-code"></div></div>
                    <p id="otpCountdown" class="d-none"></p>
                    <div class="account-actions"><button type="button" id="sendOtpButton" class="btn btn-warning">Send OTP</button><button type="button" id="resendOtpButton" class="btn btn-link d-none">Resend OTP</button><button type="button" id="verifyOtpButton" class="btn btn-warning d-none">Verify &amp; Login</button></div>
                    <button type="button" id="showPasswordLogin" class="btn btn-link account-mode-link">Use Password Login</button>
                </div>

                <div id="passwordLoginPane" class="{{ $loginMode === 'password' ? '' : 'd-none' }}">
                    <b>Login to your account</b>
                    <form method="post" action="{{ route('account.login.password') }}" data-recaptcha-action="account_login_password">
                        @csrf
                        <div class="form-group"><label for="account_identifier">Email or mobile</label><input required id="account_identifier" name="identifier" class="form-control" value="{{ old('identifier') }}" autocomplete="username" placeholder="Email or mobile with country code"></div>
                        <div class="form-group"><label for="account_password">Password</label><div class="input-group"><input required id="account_password" name="password" class="form-control" type="password" autocomplete="current-password"><button type="button" class="btn btn-outline-secondary" data-toggle-password="#account_password" aria-label="Toggle password visibility"><i class="fa fa-eye"></i></button></div></div>
                        <label class="account-remember"><input type="checkbox" name="remember" value="1" @checked(old('remember', true))> Remember me</label>
                        <p class="account-privacy">I consent that my data is being stored in line with our <a href="{{ url('/privacy') }}">Privacy Policy</a>.</p>
                        <button type="submit" class="btn btn-warning">Login with Password</button>
                        <a class="account-forgot" href="{{ url('/account/resetpassword') }}">Forgot password?</a>
                    </form>
                    <button type="button" id="showOtpLogin" class="btn btn-link account-mode-link">Login with OTP</button>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-2 account-or-column"><span class="or">OR</span></div>

        <div class="col-12 col-lg-5">
            <form method="post" action="{{ route('otp.send') }}" id="create_account_form" data-send-url="{{ route('otp.send') }}" data-verify-url="{{ route('otp.verify') }}" data-redirect-url="{{ url('/myaccount/querystatus') }}">
                @csrf
                <input type="hidden" name="purpose" value="register">
                <input type="hidden" name="country_code" id="reg_country_code" value="in">
                <div class="account-form-card">
                    <b class="account-form-title">Create account</b>
                    <div id="registrationMessage" class="alert d-none" role="status"></div>
                    <div id="registrationDetails">
                        <div class="form-group"><label>Enter Name</label><div class="row account-name-row"><div class="col-sm-6"><input required id="first_name" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}"></div><div class="col-sm-6"><input required id="last_name" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}"></div></div></div>
                        <input type="hidden" id="reg_name" name="name" value="{{ old('name') }}">
                        <div class="form-group"><label for="reg_email">Email</label><input required id="reg_email" name="email" type="email" class="form-control" value="{{ old('email') }}" autocomplete="email"></div>
                        <div class="form-group"><label for="reg_mobile_input">WhatsApp / Mobile (with country code)</label><input required id="reg_mobile_input" name="mobile_raw" type="tel" class="form-control" placeholder="+91 9876543210"><input type="hidden" id="reg_mobile" name="mobile"></div>
                        <div class="form-group"><label for="reg_password">Create password</label><div class="input-group"><input required id="reg_password" name="password" type="password" class="form-control" autocomplete="new-password"><button type="button" class="btn btn-outline-secondary" data-toggle-password="#reg_password" aria-label="Toggle password visibility"><i class="fa fa-eye"></i></button></div></div>
                        <p class="account-registration-hint">Indian users will verify both email and mobile. NRI users will verify email only and their mobile will be stored for profile use.</p>
                        <p class="account-privacy">I consent that my data is being stored in line with our <a href="{{ url('/privacy') }}">Privacy Policy</a>.</p>
                        <button type="submit" id="sendCreateOtpButton" class="btn btn-warning">Continue with OTP</button>
                    </div>
                    <div id="createOtpStep" class="d-none">
                        <div class="form-group"><label for="create_account_otp">Enter OTP</label><input id="create_account_otp" class="form-control" type="text" inputmode="numeric" maxlength="6" autocomplete="one-time-code" placeholder="6-digit code"></div>
                        <p id="createOtpCountdown" class="d-none"></p>
                        <button type="button" id="verifyCreateOtpButton" class="btn btn-warning">Verify &amp; Create Account</button>
                        <button type="button" id="resendCreateOtpButton" class="btn btn-link d-none">Resend OTP</button>
                    </div>
                </div>
            </form>
        </div>
    </div></div></div>
</section>
@endsection

@push('scripts')
<x-recaptcha-script />
<script>
(function () {
    var shell = document.getElementById('account-login-shell');
    var registration = document.getElementById('create_account_form');
    if (!shell || !registration) return;

    var message = document.getElementById('accountLoginMessage');
    var registrationMessage = document.getElementById('registrationMessage');
    var otpPane = document.getElementById('otpLoginPane');
    var passwordPane = document.getElementById('passwordLoginPane');
    var otpInput = document.getElementById('otp_login_identifier');
    var otpCode = document.getElementById('otp_login_code');
    var otpEmail = document.getElementById('otp_login_email');
    var otpBlock = document.getElementById('otpVerificationBlock');
    var sendOtpButton = document.getElementById('sendOtpButton');
    var resendOtpButton = document.getElementById('resendOtpButton');
    var verifyOtpButton = document.getElementById('verifyOtpButton');
    var otpCountdown = document.getElementById('otpCountdown');
    var registrationDetails = document.getElementById('registrationDetails');
    var registrationOtpStep = document.getElementById('createOtpStep');
    var registrationOtp = document.getElementById('create_account_otp');
    var regCountdown = document.getElementById('createOtpCountdown');
    var country = 'in';
    var timers = {};

    function show(target, text, isError) {
        target.textContent = text || '';
        target.classList.toggle('d-none', !text);
        target.classList.toggle('alert-danger', !!(text && isError));
        target.classList.toggle('alert-success', !!(text && !isError));
    }
    function token(action) {
        return window.appRecaptcha ? window.appRecaptcha.execute(action) : Promise.resolve('');
    }
    async function post(url, data, action) {
        if (action) data.recaptcha_token = await token(action);
        data._token = document.querySelector('meta[name="csrf-token"]').content;
        var response = await fetch(url, {
            method: 'POST',
            headers: {'Accept':'application/json','Content-Type':'application/x-www-form-urlencoded; charset=UTF-8','X-Requested-With':'XMLHttpRequest'},
            body: new URLSearchParams(data)
        });
        var result = await response.json().catch(function () { return {}; });
        if (!response.ok) {
            var first = result.errors && Object.values(result.errors)[0];
            throw new Error(first && first[0] ? first[0] : (result.message || 'Please check the entered details and try again.'));
        }
        return result;
    }
    function startTimer(element, resend, send, seconds) {
        var remaining = seconds || 180;
        clearInterval(timers[element.id]);
        element.classList.remove('d-none');
        send.classList.remove('d-none');
        resend.classList.add('d-none');
        send.disabled = true;
        timers[element.id] = setInterval(function () {
            remaining -= 1;
            element.textContent = remaining > 0 ? 'OTP expires in ' + Math.floor(remaining / 60) + ':' + String(remaining % 60).padStart(2, '0') : 'OTP expired. You can resend now.';
            if (remaining <= 0) {
                clearInterval(timers[element.id]);
                send.classList.add('d-none');
                resend.classList.remove('d-none');
            }
        }, 1000);
    }
    function setMode(mode) {
        otpPane.classList.toggle('d-none', mode !== 'otp');
        passwordPane.classList.toggle('d-none', mode !== 'password');
        var password = document.getElementById('account_password');
        password.required = mode === 'password';
        password.disabled = mode !== 'password';
        document.getElementById('account_identifier').required = mode === 'password';
        otpInput.required = mode === 'otp';
        otpCode.required = false;
    }
    document.getElementById('showOtpLogin').addEventListener('click', function () { setMode('otp'); });
    document.getElementById('showPasswordLogin').addEventListener('click', function () { setMode('password'); });
    document.querySelectorAll('[data-toggle-password]').forEach(function (button) {
        button.addEventListener('click', function () {
            var input = document.querySelector(button.getAttribute('data-toggle-password'));
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    });
    async function sendLoginOtp() {
        show(message, '', false);
        try {
            var result = await post(shell.dataset.sendUrl, {purpose:'login', identifier:otpInput.value.trim(), country_code:country}, 'otp_send');
            otpEmail.value = result.email || otpInput.value.trim();
            otpBlock.classList.remove('d-none');
            verifyOtpButton.classList.remove('d-none');
            startTimer(otpCountdown, resendOtpButton, sendOtpButton, result.expires_in);
            show(message, result.message || 'OTP sent. Check your email/mobile.', false);
        } catch (error) { show(message, error.message, true); }
    }
    sendOtpButton.addEventListener('click', sendLoginOtp);
    resendOtpButton.addEventListener('click', sendLoginOtp);
    verifyOtpButton.addEventListener('click', async function () {
        try {
            var result = await post(shell.dataset.verifyUrl, {purpose:'login', email:otpEmail.value, otp:otpCode.value.trim()}, 'otp_verify');
            window.location.href = result.redirect_url || shell.dataset.redirectUrl;
        } catch (error) { show(message, error.message, true); }
    });
    async function sendRegistrationOtp() {
        var first = document.getElementById('first_name').value.trim();
        var last = document.getElementById('last_name').value.trim();
        var mobileRaw = document.getElementById('reg_mobile_input').value.trim();
        var mobile = mobileRaw.replace(/[\s().-]/g, '');
        if (/^\d{10}$/.test(mobile) && country === 'in') mobile = '+91' + mobile;
        document.getElementById('reg_name').value = (first + ' ' + last).trim();
        document.getElementById('reg_mobile').value = mobile;
        var data = {purpose:'register', name:(first + ' ' + last).trim(), first_name:first, last_name:last, email:document.getElementById('reg_email').value.trim(), mobile:mobile, mobile_raw:mobileRaw, password:document.getElementById('reg_password').value, country_code:country};
        try {
            var result = await post(registration.dataset.sendUrl, data, 'otp_send');
            registrationDetails.classList.add('d-none');
            registrationOtpStep.classList.remove('d-none');
            startTimer(regCountdown, document.getElementById('resendCreateOtpButton'), document.getElementById('sendCreateOtpButton'), result.expires_in);
            show(registrationMessage, result.message || 'OTP sent. Check your email/mobile.', false);
            registrationOtp.focus();
        } catch (error) { show(registrationMessage, error.message, true); }
    }
    registration.addEventListener('submit', function (event) { event.preventDefault(); sendRegistrationOtp(); });
    document.getElementById('resendCreateOtpButton').addEventListener('click', sendRegistrationOtp);
    document.getElementById('verifyCreateOtpButton').addEventListener('click', async function () {
        try {
            var result = await post(registration.dataset.verifyUrl, {purpose:'register', email:document.getElementById('reg_email').value.trim(), otp:registrationOtp.value.trim(), country_code:country}, 'otp_verify');
            window.location.href = result.redirect_url || registration.dataset.redirectUrl;
        } catch (error) { show(registrationMessage, error.message, true); }
    });
    fetch('https://ipapi.co/json/').then(function (response) { return response.json(); }).then(function (data) {
        country = (data.country_code || 'in').toLowerCase();
        document.getElementById('reg_country_code').value = country;
        document.getElementById('otp_login_country_code').value = country;
        document.getElementById('otpLoginHint').textContent = country === 'in' ? 'Indian accounts can use mobile OTP login or email OTP login.' : 'NRI accounts use email OTP login.';
    }).catch(function () {});
    setMode(@json($loginMode));
})();
</script>
@endpush
