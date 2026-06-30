@extends('admin.layout')

@section('title', 'Enquiry #' . $enquiry->id)

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Enquiry #{{ $enquiry->id }}</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a class="btn btn-outline-secondary" href="{{ route('admin.enquiries.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Source</dt><dd class="col-sm-9">{{ $enquiry->source }}</dd>
                <dt class="col-sm-3">Context</dt><dd class="col-sm-9">{{ $enquiry->context }}</dd>
                <dt class="col-sm-3">Page</dt><dd class="col-sm-9">{{ $enquiry->page_url }}</dd>
                <dt class="col-sm-3">Name</dt><dd class="col-sm-9">{{ $enquiry->name }}</dd>
                <dt class="col-sm-3">Email</dt><dd class="col-sm-9">{{ $enquiry->email ?: optional($enquiry->user)->email }}</dd>
                <dt class="col-sm-3">Phone</dt><dd class="col-sm-9">{{ $enquiry->phone ?: optional($enquiry->user)->mobile }}</dd>
                <dt class="col-sm-3">Priority</dt>
                <dd class="col-sm-9">
                    <form method="post" action="{{ route('admin.enquiries.priority.update', $enquiry) }}" class="d-inline-flex gap-2 align-items-center">
                        @csrf
                        @method('PATCH')
                        <select class="form-select" name="priority" onchange="this.form.submit()">
                            <option value="" @selected(!$enquiry->priority)>Normal</option>
                            <option value="low" @selected($enquiry->priority==='low')>Low</option>
                            <option value="medium" @selected($enquiry->priority==='medium')>Medium</option>
                            <option value="important" @selected($enquiry->priority==='important')>Important</option>
                        </select>
                    </form>
                </dd>
                <dt class="col-sm-3">Subject</dt><dd class="col-sm-9">{{ $enquiry->subject }}</dd>
                <dt class="col-sm-3">Message</dt><dd class="col-sm-9">{{ $enquiry->message }}</dd>
                <dt class="col-sm-3">Meta</dt><dd class="col-sm-9"><pre class="mb-0">{{ json_encode($enquiry->meta, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre></dd>
                <dt class="col-sm-3">IP</dt><dd class="col-sm-9">{{ $enquiry->ip }}</dd>
                <dt class="col-sm-3">Location</dt>
                <dd class="col-sm-9">
                    @if(!empty($ipLocation['label']))
                        {{ $ipLocation['label'] }}
                    @elseif(!empty($ipLocation))
                        {{ $ipLocation['label'] ?? 'Unknown' }}
                    @else
                        <span class="text-muted">Unknown</span>
                    @endif
                </dd>
            </dl>
            <div class="mt-3">
                <form method="post" action="{{ route('admin.enquiries.block-requester', $enquiry) }}" class="d-inline" onsubmit="return confirm('Block the linked requester?')">
                    @csrf
                    <button class="btn btn-outline-warning" type="submit">Block requester</button>
                </form>
            </div>
        </div>
    </div>
@endsection
