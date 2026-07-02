@extends('admin.layout')

@section('title', 'OTP Delivery Log #' . $log->id)

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">OTP Delivery Log #{{ $log->id }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a class="btn btn-outline-secondary" href="{{ route('admin.otp-delivery-logs.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Created</dt><dd class="col-sm-9">{{ $log->created_at }}</dd>
                <dt class="col-sm-3">Purpose</dt><dd class="col-sm-9"><code>{{ $log->purpose }}</code></dd>
                <dt class="col-sm-3">Channel</dt><dd class="col-sm-9"><code>{{ $log->channel }}</code></dd>
                <dt class="col-sm-3">Recipient</dt><dd class="col-sm-9">{{ $log->recipient ?: '-' }}</dd>
                <dt class="col-sm-3">Template</dt><dd class="col-sm-9"><code>{{ $log->template_slug ?: '-' }}</code></dd>
                <dt class="col-sm-3">Status</dt><dd class="col-sm-9"><span class="badge bg-secondary-lt">{{ $log->status }}</span></dd>
                <dt class="col-sm-3">Error</dt><dd class="col-sm-9">{{ $log->error_message ?: '-' }}</dd>
            </dl>

            <div class="row g-3">
                <div class="col-12 col-lg-6">
                    <h3 class="h5">Request Payload</h3>
                    <pre class="bg-light p-3 rounded border small mb-0" style="white-space: pre-wrap;">{{ json_encode($log->request_payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                </div>
                <div class="col-12 col-lg-6">
                    <h3 class="h5">Response Payload</h3>
                    <pre class="bg-light p-3 rounded border small mb-0" style="white-space: pre-wrap;">{{ json_encode($log->response_payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                </div>
            </div>
        </div>
    </div>
@endsection
