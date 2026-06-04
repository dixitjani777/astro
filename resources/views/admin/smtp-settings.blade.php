@extends('admin.layout')

@section('title', 'SMTP Settings')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">SMTP Settings</h2>
                <div class="text-secondary">These settings override mail configuration at runtime.</div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form method="post" action="{{ route('admin.smtp-settings.update') }}">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Mailer</label>
                        @php($mailer = old('mailer', $settings['mail.mailer'] ?? 'smtp'))
                        <select class="form-select" name="mailer" required>
                            @foreach(['smtp','log','sendmail'] as $m)
                                <option value="{{ $m }}" @selected($mailer===$m)>{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Host</label>
                        <input class="form-control" name="host" value="{{ old('host', $settings['mail.host'] ?? '') }}" placeholder="smtp.gmail.com">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Port</label>
                        <input class="form-control" type="number" name="port" value="{{ old('port', $settings['mail.port'] ?? '587') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Username</label>
                        <input class="form-control" name="username" value="{{ old('username', $settings['mail.username'] ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" value="{{ old('password', $settings['mail.password'] ?? '') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Encryption</label>
                        @php($enc = old('encryption', $settings['mail.encryption'] ?? 'tls'))
                        <select class="form-select" name="encryption">
                            <option value="" @selected($enc==='')>none</option>
                            <option value="tls" @selected($enc==='tls')>tls</option>
                            <option value="ssl" @selected($enc==='ssl')>ssl</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">From address</label>
                        <input class="form-control" type="email" name="from_address" value="{{ old('from_address', $settings['mail.from_address'] ?? '') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">From name</label>
                        <input class="form-control" name="from_name" value="{{ old('from_name', $settings['mail.from_name'] ?? '') }}">
                    </div>
                </div>

                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <form method="post" action="{{ route('admin.tools.clear-cache') }}" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-secondary" type="submit">Clear Cache</button>
                    </form>
                    <a class="btn btn-outline-secondary" href="{{ route('admin.settings.index') }}">Advanced Settings</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Test Email</h3>
            <div class="text-secondary mb-3">Send a test email to verify SMTP configuration.</div>
            <form method="post" action="{{ route('admin.smtp-settings.test') }}">
                @csrf
                <div class="row g-2 align-items-end">
                    <div class="col-md-6">
                        <label class="form-label">To email</label>
                        <input class="form-control" type="email" name="to_email" value="{{ old('to_email', auth()->user()?->email) }}" required>
                        @error('to_email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success" type="submit">Send Test</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
