@extends('admin.layout')

@section('title', 'Enquiries')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Enquiries</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <form id="bulkEnquiriesForm" class="m-0" method="post" action="{{ route('admin.enquiries.bulk-delete') }}" data-bulk-form onsubmit="return confirm('Delete selected enquiries?')">
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
            <form class="row g-2" method="get" action="{{ route('admin.enquiries.index') }}">
                <div class="col-6 col-md-2">
                    <input class="form-control" name="id" placeholder="ID" value="{{ request('id') }}">
                </div>
                <div class="col-6 col-md-2">
                    <input class="form-control" name="source" placeholder="Source" value="{{ request('source') }}">
                </div>
                <div class="col-12 col-md-2">
                    <input class="form-control" name="name" placeholder="Name" value="{{ request('name') }}">
                </div>
                <div class="col-12 col-md-2">
                    <input class="form-control" name="email" placeholder="Email" value="{{ request('email') }}">
                </div>
                <div class="col-12 col-md-2">
                    <input class="form-control" name="phone" placeholder="Phone" value="{{ request('phone') }}">
                </div>
                <div class="col-6 col-md-1">
                    <input class="form-control" type="date" name="date_from" value="{{ request('date_from') }}">
                </div>
                <div class="col-6 col-md-1">
                    <input class="form-control" type="date" name="date_to" value="{{ request('date_to') }}">
                </div>
                <div class="col-12 d-flex gap-2">
                    <button class="btn btn-outline-primary" type="submit"><i class="ti ti-filter"></i>&nbsp;Filter</button>
                    <a class="btn btn-outline-secondary" href="{{ route('admin.enquiries.index') }}">Reset</a>
                    <a class="btn btn-success ms-auto" href="{{ route('admin.enquiries.index', array_merge(request()->query(), ['export' => 'csv'])) }}">
                        <i class="ti ti-download"></i>&nbsp;Export CSV
                    </a>
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
                        <input type="checkbox" class="form-check-input m-0" data-bulk-check-all form="bulkEnquiriesForm">
                    </th>
                    <th>ID</th>
                    <th>Source</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($enquiries as $enquiry)
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input m-0" name="ids[]" value="{{ $enquiry->id }}" data-bulk-check form="bulkEnquiriesForm">
                        </td>
                        <td>{{ $enquiry->id }}</td>
                        <td>{{ $enquiry->source }}</td>
                        <td>{{ $enquiry->name }}</td>
                        <td>{{ $enquiry->email }}</td>
                        <td>{{ $enquiry->phone }}</td>
                        <td>
                            <form method="post" action="{{ route('admin.enquiries.priority.update', $enquiry) }}" class="d-flex gap-2 align-items-center">
                                @csrf
                                @method('PATCH')
                                <select class="form-select form-select-sm" name="priority" onchange="this.form.submit()">
                                    <option value="" @selected(!$enquiry->priority)>Normal</option>
                                    <option value="low" @selected($enquiry->priority==='low')>Low</option>
                                    <option value="medium" @selected($enquiry->priority==='medium')>Medium</option>
                                    <option value="important" @selected($enquiry->priority==='important')>Important</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <span class="badge {{ $enquiry->current_status_label === 'Answered' ? 'bg-green' : 'bg-warning text-dark' }}">{{ $enquiry->current_status_label }}</span>
                        </td>
                        <td>{{ optional($enquiry->created_at)->format('M d, Y h:i A') }}</td>
                        <td>
                            <div class="btn-list flex-nowrap">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.enquiries.show', $enquiry) }}">View</a>
                                <form method="post" action="{{ route('admin.enquiries.block-requester', $enquiry) }}" onsubmit="return confirm('Block the linked requester?')">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-warning" type="submit">Block user</button>
                                </form>
                                <form method="post" action="{{ route('admin.enquiries.destroy', $enquiry) }}" onsubmit="return confirm('Delete this enquiry?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="card-footer">
            @if($enquiries instanceof \Illuminate\Contracts\Pagination\Paginator || $enquiries instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                {{ $enquiries->links() }}
            @endif
        </div>
    </div>
@endsection
