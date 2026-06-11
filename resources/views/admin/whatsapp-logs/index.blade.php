@extends('admin.layout')

@section('title', 'WhatsApp Logs')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">WhatsApp Logs</h2>
                <div class="text-secondary">Track WhatsApp sends, API responses, and failures.</div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form class="row g-2" method="get" action="{{ route('admin.whatsapp-logs.index') }}">
                <div class="col-md-3">
                    <input class="form-control" name="recipient" placeholder="Recipient" value="{{ request('recipient') }}">
                </div>
                <div class="col-md-3">
                    <input class="form-control" name="template_slug" placeholder="Template slug" value="{{ request('template_slug') }}">
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="status">
                        <option value="">All statuses</option>
                        @foreach(['sent','failed','skipped'] as $status)
                            <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button class="btn btn-outline-primary" type="submit">Filter</button>
                    <a class="btn btn-outline-secondary" href="{{ route('admin.whatsapp-logs.index') }}">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Recipient</th>
                        <th>Template</th>
                        <th>Status</th>
                        <th>HTTP</th>
                        <th>Sent At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->recipient ?: '-' }}</td>
                            <td><code>{{ $log->template_slug ?: '-' }}</code></td>
                            <td>
                                <span class="badge @class([
                                    'bg-success-subtle text-success-emphasis border border-success-subtle' => $log->status === 'sent',
                                    'bg-danger-subtle text-danger-emphasis border border-danger-subtle' => $log->status === 'failed',
                                    'bg-secondary-subtle text-secondary-emphasis border border-secondary-subtle' => $log->status === 'skipped',
                                ])">{{ ucfirst($log->status) }}</span>
                            </td>
                            <td>{{ $log->http_status ?: '-' }}</td>
                            <td>{{ optional($log->sent_at)->format('M d, Y h:i A') ?: '-' }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.whatsapp-logs.show', $log) }}" class="btn btn-sm btn-outline-primary">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-secondary">No logs found.</td>
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
