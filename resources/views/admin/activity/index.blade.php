@extends('admin.layout')

@section('title', 'Activity')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Activity Logs</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form id="bulkActivityForm" class="m-0" method="post" action="{{ route('admin.activity.bulk-delete') }}" data-bulk-form onsubmit="return confirm('Delete selected activity logs?')">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit" data-bulk-submit disabled>
                        <i class="ti ti-trash"></i>&nbsp;Delete selected
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form class="row g-2" method="get">
                <div class="col-md-10">
                    <input class="form-control" name="q" placeholder="Search path/action" value="{{ request('q') }}">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-outline-primary w-100" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                <tr>
                    <th style="width: 30px;">
                        <input type="checkbox" class="form-check-input m-0" data-bulk-check-all form="bulkActivityForm">
                    </th>
                    <th>Time</th>
                    <th>User</th>
                    <th>Method</th>
                    <th>Path</th>
                    <th>Route</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input m-0" name="ids[]" value="{{ $log->id }}" data-bulk-check form="bulkActivityForm">
                        </td>
                        <td class="text-secondary">{{ $log->created_at }}</td>
                        <td class="text-secondary">{{ $log->user_id }}</td>
                        <td><span class="badge bg-blue-lt">{{ $log->method }}</span></td>
                        <td class="text-secondary">{{ $log->path }}</td>
                        <td class="text-secondary">{{ $log->action }}</td>
                        <td class="text-secondary">{{ $log->meta['status'] ?? '' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if($logs instanceof \Illuminate\Contracts\Pagination\Paginator || $logs instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                {{ $logs->links() }}
            @endif
        </div>
    </div>
@endsection
