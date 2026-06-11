@extends('admin.layout')

@section('title', 'WhatsApp Log #' . $log->id)

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">WhatsApp Log #{{ $log->id }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a class="btn btn-outline-secondary" href="{{ route('admin.whatsapp-logs.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Recipient</dt><dd class="col-sm-9">{{ $log->recipient ?: '-' }}</dd>
                <dt class="col-sm-3">Template</dt><dd class="col-sm-9"><code>{{ $log->template_slug ?: '-' }}</code></dd>
                <dt class="col-sm-3">Status</dt><dd class="col-sm-9">{{ ucfirst($log->status) }}</dd>
                <dt class="col-sm-3">HTTP Status</dt><dd class="col-sm-9">{{ $log->http_status ?: '-' }}</dd>
                <dt class="col-sm-3">Sent At</dt><dd class="col-sm-9">{{ optional($log->sent_at)->format('M d, Y h:i A') ?: '-' }}</dd>
                <dt class="col-sm-3">Message</dt><dd class="col-sm-9"><pre class="mb-0">{{ $log->message_text }}</pre></dd>
                <dt class="col-sm-3">Request</dt><dd class="col-sm-9"><pre class="mb-0">{{ json_encode($log->request_payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre></dd>
                <dt class="col-sm-3">Response</dt><dd class="col-sm-9"><pre class="mb-0">{{ json_encode($log->response_payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre></dd>
            </dl>
        </div>
    </div>
@endsection
