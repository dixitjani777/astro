@extends('admin.layout')

@section('title', 'Site Controls')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Site Controls</h2>
                <div class="text-secondary">Maintenance mode and official social links.</div>
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
                    <div class="col-12">
                        <label class="form-check">
                            <input type="hidden" name="site[maintenance][enabled]" value="0">
                            <input class="form-check-input" type="checkbox" name="site[maintenance][enabled]" value="1" @checked((string) old('site.maintenance.enabled', $settings['site.maintenance.enabled'] ?? '0') === '1')>
                            <span class="form-check-label">Enable maintenance mode</span>
                        </label>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Maintenance message</label>
                        <textarea class="form-control" rows="4" name="site[maintenance][message]">{{ old('site.maintenance.message', $settings['site.maintenance.message'] ?? '') }}</textarea>
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
