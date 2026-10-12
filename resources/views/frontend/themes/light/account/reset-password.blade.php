@extends('frontend.themes.light.layouts.master')

@section('title', 'Reset Password - Astroduniya')
@section('description', 'Choose a new password for your Astroduniya account.')

@section('content')
<section class="hs_indx_title_main_wrapper">
    <div class="hs_title_img_overlay"></div>
    <div class="container"><div class="row">
        <div class="col-lg-12 full_width"><div class="hs_indx_title_left_wrapper"><h2>Choose a New Password</h2></div></div>
        <div class="col-lg-12 full_width"><div class="hs_indx_title_right_wrapper"><ul><li><a href="{{ url('/') }}">Home</a> &nbsp;&nbsp;&nbsp;&gt;</li><li><a href="{{ url('/account') }}">Account</a> &nbsp;&nbsp;&nbsp;&gt;</li><li>Reset Password</li></ul></div></div>
    </div></div>
</section>

<section class="light-account-entry-section light-password-reset-page">
    <div class="container"><div class="row"><div class="col-12 col-md-8 col-lg-6 light-password-reset-card-wrap">
        <form method="post" action="{{ route('password.update', $token) }}" data-recaptcha-action="password_reset_submit" class="light-password-reset-card">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
            <div class="form-group"><label for="reset-email">Email</label><input id="reset-email" name="email" type="email" class="form-control" value="{{ old('email', $email) }}" required autocomplete="email">@error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
            <div class="form-group"><label for="reset-password">New password</label><input id="reset-password" name="password" type="password" class="form-control" required autocomplete="new-password">@error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
            <div class="form-group"><label for="reset-password-confirmation">Confirm password</label><input id="reset-password-confirmation" name="password_confirmation" type="password" class="form-control" required autocomplete="new-password"></div>
            <button type="submit" class="btn btn-warning">Reset password</button>
            <a href="{{ url('/account') }}" class="light-password-reset-back">Back to log in</a>
        </form>
    </div></div></div>
</section>
@endsection

@push('scripts')<x-recaptcha-script />@endpush
