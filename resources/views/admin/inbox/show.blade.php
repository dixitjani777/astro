@extends('admin.layout')

@section('title', 'Email View')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $message['subject'] ?? '(no subject)' }}</h2>
                <div class="text-secondary">
                    Mailbox: <code>{{ $mailbox }}</code>
                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <a class="btn btn-outline-secondary" href="{{ route('admin.inbox.index', ['mailbox' => $mailbox]) }}">
                    <i class="ti ti-arrow-left"></i>&nbsp;Back
                </a>
            </div>
        </div>
    </div>

    @php($from = $message['from']['emailAddress']['address'] ?? null)
    @php($to = collect($message['toRecipients'] ?? [])->pluck('emailAddress.address')->filter()->values()->all())
    @php($cc = collect($message['ccRecipients'] ?? [])->pluck('emailAddress.address')->filter()->values()->all())
    @php($bcc = collect($message['bccRecipients'] ?? [])->pluck('emailAddress.address')->filter()->values()->all())
    @php($replyTo = collect($message['replyTo'] ?? [])->pluck('emailAddress.address')->filter()->values()->all())

    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-md-2 text-secondary">From</dt>
                        <dd class="col-md-10">{{ $from ?? '-' }}</dd>

                        <dt class="col-md-2 text-secondary">To</dt>
                        <dd class="col-md-10">{{ count($to) ? implode(', ', $to) : '-' }}</dd>

                        <dt class="col-md-2 text-secondary">CC</dt>
                        <dd class="col-md-10">{{ count($cc) ? implode(', ', $cc) : '-' }}</dd>

                        <dt class="col-md-2 text-secondary">BCC</dt>
                        <dd class="col-md-10">{{ count($bcc) ? implode(', ', $bcc) : '-' }}</dd>

                        <dt class="col-md-2 text-secondary">Reply-To</dt>
                        <dd class="col-md-10">{{ count($replyTo) ? implode(', ', $replyTo) : '-' }}</dd>

                        <dt class="col-md-2 text-secondary">Received</dt>
                        <dd class="col-md-10">
                            {{ !empty($message['receivedDateTime']) ? \Illuminate\Support\Carbon::parse($message['receivedDateTime'])->timezone(config('app.timezone'))->toDayDateTimeString() : '-' }}
                        </dd>

                        <dt class="col-md-2 text-secondary">Sent</dt>
                        <dd class="col-md-10">
                            {{ !empty($message['sentDateTime']) ? \Illuminate\Support\Carbon::parse($message['sentDateTime'])->timezone(config('app.timezone'))->toDayDateTimeString() : '-' }}
                        </dd>

                        <dt class="col-md-2 text-secondary">Message ID</dt>
                        <dd class="col-md-10"><code>{{ $message['internetMessageId'] ?? '-' }}</code></dd>

                        <dt class="col-md-2 text-secondary">Read</dt>
                        <dd class="col-md-10">{{ !empty($message['isRead']) ? 'Yes' : 'No' }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Body</h3>
                </div>
                <div class="card-body p-0">
                    @php($body = $message['body']['content'] ?? '')
                    @php($contentType = strtolower((string)($message['body']['contentType'] ?? 'html')))
                    @php($srcdoc = $contentType === 'text' ? e(nl2br($body)) : $body)
                    <iframe
                        style="width:100%; height: 70vh; border:0;"
                        sandbox=""
                        referrerpolicy="no-referrer"
                        srcdoc="{{ $srcdoc }}"
                    ></iframe>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Attachments</h3>
                </div>
                <div class="card-body">
                    @if(!count($attachments))
                        <div class="text-secondary">No attachments.</div>
                    @else
                        <div class="list-group">
                            @foreach($attachments as $a)
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="fw-semibold">{{ $a['name'] ?? 'attachment' }}</div>
                                            <div class="text-secondary small">
                                                {{ $a['contentType'] ?? 'application/octet-stream' }}
                                                @if(isset($a['size'])) · {{ number_format((int)$a['size']) }} bytes @endif
                                                @if(!empty($a['isInline'])) · inline @endif
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a class="btn btn-sm btn-outline-primary"
                                               href="{{ route('admin.inbox.attachments.download', [$message['id'], $a['id']]) }}?mailbox={{ urlencode($mailbox) }}">
                                                <i class="ti ti-download"></i>&nbsp;Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

