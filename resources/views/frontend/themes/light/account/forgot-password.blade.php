@extends('frontend.themes.light.layouts.master')

@section('title', 'Reset Password - Astroduniya')
@section('description', 'Request a password reset link for your Astroduniya account.')

@section('content')
<section class="hs_indx_title_main_wrapper">
    <div class="hs_title_img_overlay"></div>
    <div class="container"><div class="row">
        <div class="col-lg-12 full_width"><div class="hs_indx_title_left_wrapper"><h2>Reset Password</h2></div></div>
        <div class="col-lg-12 full_width"><div class="hs_indx_title_right_wrapper"><ul><li><a href="{{ url('/') }}">Home</a> &nbsp;&nbsp;&nbsp;&gt;</li><li>Reset Password</li></ul></div></div>
    </div></div>
</section>

<section class="light-account-entry-section light-password-reset-page">
    <div class="container"><div class="row"><div class="col-12 col-md-8 col-lg-6 light-password-reset-card-wrap">
        <form method="post" action="{{ route('password.email') }}" data-recaptcha-action="password_reset_link" class="light-password-reset-card">
            @csrf
            <p class="light-password-reset-intro">Enter your email address or mobile number to receive a password reset link.</p>
            @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
            @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
            @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
            <div class="form-group"><label for="reset-identifier">Email or mobile</label><input id="reset-identifier" name="identifier" type="text" class="form-control" value="{{ old('identifier') }}" required autocomplete="username" placeholder="Email or mobile with country code">@error('identifier')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
            <button type="submit" class="btn btn-warning">Send reset link</button>
            <a href="{{ url('/account') }}" class="light-password-reset-back">Back to log in</a>
        </form>
    </div></div></div>
</section>
@endsection

@push('scripts')<x-recaptcha-script />@endpush
