@extends('admin.layout')

@section('title', 'Site Controls')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Site Controls</h2>
                <div class="text-secondary">Switch the public site between normal, coming soon, and maintenance modes.</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-secondary">Back to Settings</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
                <form method="post" action="{{ route('admin.settings.site-controls.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Site mode</label>
                            @php($mode = old('site.mode', $settings['site.mode'] ?? 'normal'))
                            <select class="form-select" name="site[mode]">
                                <option value="normal" @selected($mode === 'normal')>Normal</option>
                                <option value="coming_soon" @selected($mode === 'coming_soon')>Coming soon</option>
                                <option value="maintenance" @selected($mode === 'maintenance')>Maintenance</option>
                            </select>
                            <div class="form-hint mt-2">Admins can still access the panel while the public site is restricted.</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Maintenance message</label>
                            <textarea class="form-control" rows="4" name="site[maintenance][message]">{{ old('site.maintenance.message', $settings['site.maintenance.message'] ?? '') }}</textarea>
                            <div class="form-hint mt-2">Shown only when site mode is set to maintenance.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Coming soon message</label>
                            <textarea class="form-control" rows="4" name="site[coming_soon][message]">{{ old('site.coming_soon.message', $settings['site.coming_soon.message'] ?? '') }}</textarea>
                            <div class="form-hint mt-2">A short teaser message for the launch page.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Launch date</label>
                            <input class="form-control" type="date" name="site[coming_soon][launch_date]" value="{{ old('site.coming_soon.launch_date', $settings['site.coming_soon.launch_date'] ?? '') }}">
                            <div class="form-hint mt-2">Optional date displayed on the coming soon page.</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Newsletter label</label>
                            <input class="form-control" name="site[coming_soon][newsletter_label]" value="{{ old('site.coming_soon.newsletter_label', $settings['site.coming_soon.newsletter_label'] ?? 'Get launch updates') }}" placeholder="Get launch updates">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">YouTube channel URL</label>
                            <input class="form-control" name="site[youtube_url]" value="{{ old('site.youtube_url', $settings['site.youtube_url'] ?? '') }}" placeholder="https://youtube.com/...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">WhatsApp URL</label>
                            <input class="form-control" name="site[maintenance][whatsapp_url]" value="{{ old('site.maintenance.whatsapp_url', $settings['site.maintenance.whatsapp_url'] ?? '') }}" placeholder="https://wa.me/...">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Facebook URL</label>
                            <input class="form-control" name="site[maintenance][facebook_url]" value="{{ old('site.maintenance.facebook_url', $settings['site.maintenance.facebook_url'] ?? '') }}" placeholder="https://facebook.com/...">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Instagram URL</label>
                            <input class="form-control" name="site[maintenance][instagram_url]" value="{{ old('site.maintenance.instagram_url', $settings['site.maintenance.instagram_url'] ?? '') }}" placeholder="https://instagram.com/...">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">YouTube URL</label>
                            <input class="form-control" name="site[maintenance][youtube_url]" value="{{ old('site.maintenance.youtube_url', $settings['site.maintenance.youtube_url'] ?? '') }}" placeholder="https://youtube.com/...">
                        </div>
                    </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save Controls</button>
                </div>
            </form>
        </div>
    </div>
@endsection
