@extends('admin.layout')

@section('title', 'WhatsApp Settings')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">WhatsApp Settings</h2>
                <div class="text-secondary">Configure the API used for OTP and enquiry reply notifications.</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admin.whatsapp.settings.update') }}">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Enable WhatsApp</label>
                        <div class="form-check form-switch">
                            <input type="hidden" name="whatsapp_enabled" value="0">
                            <input class="form-check-input" type="checkbox" name="whatsapp_enabled" value="1" @checked(old('whatsapp_enabled', $settings['whatsapp.enabled'] ?? '1'))>
                            <label class="form-check-label">Turn on WhatsApp sending</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">API URL</label>
                        <input class="form-control" name="whatsapp_api_url" value="{{ old('whatsapp_api_url', $settings['whatsapp.api_url'] ?? '') }}" placeholder="https://api.example.com/send">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">API Token</label>
                        <input class="form-control" name="whatsapp_api_token" value="{{ old('whatsapp_api_token', $settings['whatsapp.api_token'] ?? '') }}" placeholder="Bearer token">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">API Key</label>
                        <input class="form-control" name="whatsapp_api_key" value="{{ old('whatsapp_api_key', $settings['whatsapp.api_key'] ?? '') }}" placeholder="Optional API key">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Timeout (seconds)</label>
                        <input class="form-control" type="number" name="whatsapp_timeout" value="{{ old('whatsapp_timeout', $settings['whatsapp.timeout'] ?? 20) }}" min="5" max="120">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Sender Name / ID</label>
                        <input class="form-control" name="whatsapp_sender" value="{{ old('whatsapp_sender', $settings['whatsapp.sender'] ?? '') }}" placeholder="Optional sender name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Default Country</label>
                        <input class="form-control text-uppercase" name="whatsapp_default_country" value="{{ old('whatsapp_default_country', $settings['whatsapp.default_country'] ?? 'in') }}" placeholder="IN">
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
