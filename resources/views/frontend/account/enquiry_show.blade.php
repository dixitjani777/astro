@extends('frontend.layouts.master')
@section('title', 'Request / Order #' . $enquiry->id . ' - Astroduniya')
@section('description', 'Request / Order #' . $enquiry->id)
@section('keywords', 'My Account')

<?php
    $toolbar_page="Account";
    $toolbar_title="Request / Order #" . $enquiry->id;
?>

@section('content')
@include('frontend.layouts.subnav')

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 mb--60">
                @include('frontend.account.sidebar.sidebar')
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                <div class="portlet mb-4">
                    <div class="portlet-header border-bottom d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted text-truncate font-weight-medium pt-1">
                                Request / Order #{{ $enquiry->id }}
                            </span>
                            <div class="fs--13 text-muted">
                                {{ $enquiry->request_type_label }}
                            </div>
                        </div>
                        <a class="btn btn-sm btn-outline-secondary" href="{{ url('/myaccount/querystatus') }}">Back</a>
                    </div>
                    <div class="portlet-body">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <div class="text-muted fs--13">Submission Date</div>
                                    <div class="font-weight-medium">{{ optional($enquiry->created_at)->format('M d, Y H:i') }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                            <div class="p-3 bg-light rounded">
                                <div class="text-muted fs--13">Current Status</div>
                                @php
                                    $statusStyles = match ($enquiry->current_status_label) {
                                        'Answered' => ['bg' => '#e8f8ee', 'color' => '#146c43', 'border' => '#bfe8cc'],
                                        'Awaiting Admin Response' => ['bg' => '#fff4db', 'color' => '#8a6100', 'border' => '#ffe19a'],
                                        'Received' => ['bg' => '#e8f1ff', 'color' => '#0d47a1', 'border' => '#c6d8ff'],
                                        default => ['bg' => '#f1f3f5', 'color' => '#343a40', 'border' => '#d6d8db'],
                                    };
                                @endphp
                                <span class="d-inline-block px-3 py-2 rounded-pill small font-weight-bold mt-1" style="background: {{ $statusStyles['bg'] }}; color: {{ $statusStyles['color'] }}; border: 1px solid {{ $statusStyles['border'] }};">
                                    {{ $enquiry->current_status_label }}
                                </span>
                            </div>
                        </div>
                            <div class="col-12 col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <div class="text-muted fs--13">Request Type</div>
                                    <div class="font-weight-medium">{{ $enquiry->request_type_label }}</div>
                                    <div class="fs--13 text-muted">{{ $enquiry->source ?: '-' }}</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <div class="text-muted fs--13">Last Updated</div>
                                    <div class="font-weight-medium">{{ optional($enquiry->last_updated_at)->format('M d, Y H:i') ?: '-' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="text-muted fs--13 mb-2">User Query Details</div>
                            <div class="border rounded p-3 bg-white">
                                @if($enquiry->subject)
                                    <div class="font-weight-medium mb-2">{{ $enquiry->subject }}</div>
                                @endif
                                @if($enquiry->message)
                                    <div>{!! nl2br(e($enquiry->message)) !!}</div>
                                @endif
                                @if(!empty($enquiry->meta))
                                    <div class="mt-3">
                                        <div class="text-muted fs--13 mb-1">Extra Details</div>
                                        <pre class="mb-0">{{ json_encode($enquiry->meta, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="portlet mb-4">
                    <div class="portlet-header border-bottom">
                        <span class="d-block text-muted text-truncate font-weight-medium pt-1">Conversation</span>
                    </div>
                    <div class="portlet-body">
                        @forelse($enquiry->replies as $r)
                            <div class="border rounded p-3 mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="font-weight-medium text-dark">
                                        {{ $r->sender_type === 'admin' ? 'Admin / Pandit' : 'You' }}
                                        @if($r->senderUser)
                                            <span class="text-muted">({{ $r->senderUser->email }})</span>
                                        @endif
                                    </div>
                                    <div class="text-muted fs--13">{{ optional($r->created_at)->format('M d, Y H:i') }}</div>
                                </div>
                                @if($r->body)
                                    <div class="mt-2">{!! nl2br(e($r->body)) !!}</div>
                                @endif
                                @if($r->payment_url)
                                    <div class="mt-2">
                                        <span class="text-muted">Payment link:</span>
                                        <a href="{{ $r->payment_url }}" target="_blank" rel="noopener noreferrer">{{ $r->payment_url }}</a>
                                    </div>
                                @endif
                                @if($r->attachment_path)
                                    <div class="mt-2">
                                        <span class="text-muted">Attachment:</span>
                                        <a href="{{ \Illuminate\Support\Facades\Storage::disk($r->attachment_disk ?: 'public')->url($r->attachment_path) }}" target="_blank" rel="noopener noreferrer">
                                            {{ $r->attachment_original_name ?: 'Download' }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="text-muted">No responses yet.</div>
                        @endforelse
                    </div>
                </div>

                <div class="portlet">
                    <div class="portlet-header border-bottom">
                        <span class="d-block text-muted text-truncate font-weight-medium pt-1">Reply / Follow Up</span>
                    </div>
                    <div class="portlet-body">
                        <form method="post" action="{{ route('account.enquiries.replies.store', $enquiry) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="form-label">Message</label>
                                <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="4">{{ old('body') }}</textarea>
                                @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Attachment (optional)</label>
                                <input class="form-control @error('attachment') is-invalid @enderror" type="file" name="attachment">
                                @error('attachment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                <small class="text-muted d-block mt-1">Allowed: photo/image, PDF, Word (.doc/.docx). Max 50MB.</small>
                            </div>

                            <button class="btn btn-primary" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
