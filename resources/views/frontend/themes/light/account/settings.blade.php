@extends('frontend.themes.light.layouts.inner')

@section('title', 'Account Settings')
@section('inner-content')
    <div class="light-account-settings">
        <h2>Account Settings</h2>
        @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
        @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
        <form method="post" action="{{ route('myaccount.settings.update') }}">
            @csrf
            <div class="form-group"><label for="light-settings-name">Name</label><input id="light-settings-name" class="form-control" name="name" value="{{ old('name', $user->name) }}" required></div>
            <div class="form-group"><label for="light-settings-mobile">Mobile</label><input id="light-settings-mobile" class="form-control" name="mobile_raw" value="{{ old('mobile_raw', $user->mobile) }}"></div>
            <div class="form-group"><label for="light-settings-dob">Date of birth</label><input id="light-settings-dob" class="form-control" type="date" name="dob" value="{{ old('dob', optional($user->dob)->format('Y-m-d')) }}"></div>
            <div class="form-group"><label for="light-settings-location">Location</label><input id="light-settings-location" class="form-control" name="location" value="{{ old('location', $user->location) }}"></div>
            <div class="form-group"><label for="light-settings-city">City</label><input id="light-settings-city" class="form-control" name="city" value="{{ old('city', $user->city) }}"></div>
            <div class="form-group"><label for="light-settings-state">State</label><input id="light-settings-state" class="form-control" name="state" value="{{ old('state', $user->state) }}"></div>
            <div class="form-group"><label for="light-settings-pincode">Pincode</label><input id="light-settings-pincode" class="form-control" name="pincode" value="{{ old('pincode', $user->pincode) }}"></div>
            <button class="hs_btn_hover" type="submit">Save settings</button>
        </form>
    </div>
@endsection

@section('sidebar')
    @include('frontend.themes.light.partials.account-sidebar')
@endsection
