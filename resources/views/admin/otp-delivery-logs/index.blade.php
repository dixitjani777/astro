@extends('admin.layout')

@section('title', 'OTP Delivery Logs')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">OTP Delivery Logs</h2>
                <div class="text-secondary">Track email and WhatsApp OTP attempts for login and registration.</div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form class="row g-2" method="get" action="{{ route('admin.otp-delivery-logs.index') }}">
                <div class="col-md-3">
                    <input class="form-control" name="recipient" placeholder="Recipient" value="{{ request('recipient') }}">
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="purpose">
                        <option value="">All purposes</option>
                        <option value="login" @selected(request('purpose') === 'login')>Login</option>
                        <option value="register" @selected(request('purpose') === 'register')>Register</option>
                        <option value="register_welcome" @selected(request('purpose') === 'register_welcome')>Register Welcome</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="channel">
                        <option value="">All channels</option>
                        <option value="email" @selected(request('channel') === 'email')>Email</option>
                        <option value="whatsapp" @selected(request('channel') === 'whatsapp')>WhatsApp</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="status">
                        <option value="">All statuses</option>
                        <option value="pending" @selected(request('status') === 'pending')>Pending</option>
                        <option value="sent" @selected(request('status') === 'sent')>Sent</option>
                        <option value="failed" @selected(request('status') === 'failed')>Failed</option>
                        <option value="skipped" @selected(request('status') === 'skipped')>Skipped</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-outline-primary w-100" type="submit">Filter</button>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-outline-secondary w-100" href="{{ route('admin.otp-delivery-logs.index') }}">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Purpose</th>
                        <th>Channel</th>
                        <th>Recipient</th>
                        <th>Template</th>
                        <th>Status</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td class="text-secondary">{{ $log->created_at }}</td>
                            <td><code>{{ $log->purpose }}</code></td>
                            <td><span class="badge bg-blue-lt">{{ $log->channel }}</span></td>
                            <td class="text-secondary">{{ $log->recipient ?: '-' }}</td>
                            <td><code>{{ $log->template_slug ?: '-' }}</code></td>
                            <td>
                                @php
                                    $badge = match ($log->status) {
                                        'sent' => 'success',
                                        'failed' => 'danger',
                                        'skipped' => 'secondary',
                                        default => 'warning',
                                    };
                                @endphp
                                <span class="badge bg-{{ $badge }}-lt">{{ $log->status }}</span>
                            </td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.otp-delivery-logs.show', $log) }}">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-secondary">No OTP delivery logs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $logs->links() }}
        </div>
    </div>
@endsection
