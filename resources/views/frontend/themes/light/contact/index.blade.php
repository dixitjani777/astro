@extends('frontend.themes.light.layouts.inner')

@section('title', 'Contact Us')
@section('inner-content')
    <div class="light-contact-page">
        <h2>Contact Us</h2>
        <p>Let us know how we can help you.</p>
        <h3>Contact details</h3>
        <p><a href="tel:{{ $siteSettings['site.phone'] ?? '' }}">{{ $siteSettings['site.phone'] ?? '(+91) 2818-7280' }}</a></p>
        <p><a href="mailto:{{ $siteSettings['site.email'] ?? '' }}">{{ $siteSettings['site.email'] ?? 'support@astroduniya.com' }}</a></p>
        <div>{!! $siteSettings['contact.address_html'] ?? 'N-1, Baldev Jyot<br>Modi Patel Road, Bhayander<br>Thane 401101, India' !!}</div>
        @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
        @if($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
        <form method="post" action="{{ route('enquiries.store') }}" class="light-contact-form">
            @csrf
            <input type="hidden" name="source" value="contact">
            <input type="hidden" name="context" value="contact_page">
            <input type="hidden" name="page_url" value="{{ url()->current() }}">
            <div class="form-group"><label for="light-name">Name</label><input id="light-name" class="form-control" name="name" value="{{ old('name') }}" required></div>
            <div class="form-group"><label for="light-email">Email</label><input id="light-email" class="form-control" type="email" name="email" value="{{ old('email') }}"></div>
            <div class="form-group"><label for="light-phone">Phone</label><input id="light-phone" class="form-control" name="phone" value="{{ old('phone') }}"></div>
            <div class="form-group"><label for="light-subject">Subject</label><input id="light-subject" class="form-control" name="subject" value="{{ old('subject') }}"></div>
            <div class="form-group"><label for="light-message">Message</label><textarea id="light-message" class="form-control" name="message" rows="5" required>{{ old('message') }}</textarea></div>
            <div class="form-group"><label><input type="checkbox" name="meta[consent]" value="1" @checked(old('meta.consent')) required> I agree to be contacted.</label></div>
            <button class="hs_btn_hover" type="submit">Send message</button>
        </form>
    </div>
@endsection

@section('sidebar')
    @include('frontend.themes.light.partials.sidebar')
@endsection
