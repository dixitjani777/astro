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
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <strong>Replies</strong>
        </div>
        <div class="card-body">
            @forelse($enquiry->replies as $r)
                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>{{ $r->sender_type === 'admin' ? 'Admin' : 'User' }}</strong>
                            @if($r->senderUser)
                                <span class="text-muted">({{ $r->senderUser->email }})</span>
                            @endif
                        </div>
                        <div class="text-muted">{{ optional($r->created_at)->format('M d, Y H:i') }}</div>
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
                            @if($r->attachment_mime)
                                <span class="text-muted">({{ $r->attachment_mime }})</span>
                            @endif
                        </div>
                    @endif
                </div>
            @empty
                <div class="text-muted">No replies yet.</div>
            @endforelse
        </div>
    </div>

    @if(auth()->user()?->hasPermission('admin.enquiries.reply'))
        <div class="card mt-3">
            <div class="card-header">
                <strong>Send Reply</strong>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.enquiries.replies.store', $enquiry) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" rows="4">{{ old('body') }}</textarea>
                        @error('body')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Payment Link (optional)</label>
                        <input class="form-control @error('payment_url') is-invalid @enderror" name="payment_url" value="{{ old('payment_url') }}" placeholder="https://...">
                        @error('payment_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Attachment (optional)</label>
                        <input class="form-control @error('attachment') is-invalid @enderror" type="file" name="attachment">
                        @error('attachment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="form-hint">Allowed: image/pdf/doc/docx/audio/video. Max 50MB.</div>
                    </div>

                    <button class="btn btn-primary" type="submit">Send</button>
                </form>
            </div>
        </div>
    @endif
@endsection
