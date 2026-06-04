@extends('admin.layout')

@section('title', 'Contact & Social')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Contact &amp; Social</h2>
                <div class="text-secondary">These values are used in Contact page and Footer.</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admin.contact-settings.update') }}">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input class="form-control" name="site_phone" value="{{ old('site_phone', $settings['site.phone'] ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="site_email" value="{{ old('site_email', $settings['site.email'] ?? '') }}">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Address (HTML allowed)</label>
                        <textarea class="form-control" rows="4" name="contact_address_html">{{ old('contact_address_html', $settings['contact.address_html'] ?? '') }}</textarea>
                        <div class="text-secondary mt-1">Example: use `<br>` for new line.</div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Business Hours</label>
                        <input class="form-control" name="contact_business_hours" value="{{ old('contact_business_hours', $settings['contact.business_hours'] ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">WhatsApp</label>
                        <input class="form-control" name="social_whatsapp" value="{{ old('social_whatsapp', $settings['social.whatsapp'] ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Facebook</label>
                        <input class="form-control" name="social_facebook" value="{{ old('social_facebook', $settings['social.facebook'] ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Twitter</label>
                        <input class="form-control" name="social_twitter" value="{{ old('social_twitter', $settings['social.twitter'] ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">YouTube</label>
                        <input class="form-control" name="social_youtube" value="{{ old('social_youtube', $settings['social.youtube'] ?? '') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Instagram</label>
                        <input class="form-control" name="social_instagram" value="{{ old('social_instagram', $settings['social.instagram'] ?? '') }}">
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-outline-secondary" href="{{ route('admin.settings.index') }}">Advanced Settings</a>
                </div>
            </form>
        </div>
    </div>
@endsection

