@extends('admin.layout')

@section('title', 'Email Inbox')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Email Inbox</h2>
                <div class="text-secondary">Read Microsoft 365 inbox via Microsoft Graph (OAuth2).</div>
            </div>
        </div>
    </div>

    @if(!$configured)
        <div class="alert alert-warning">
            Microsoft Graph is not configured. Set <code>MSGRAPH_TENANT_ID</code>, <code>MSGRAPH_CLIENT_ID</code>, <code>MSGRAPH_CLIENT_SECRET</code>, and <code>MSGRAPH_MAILBOXES</code> in <code>.env</code>.
        </div>
    @else
        <div class="card mb-3">
            <div class="card-body">
                <form method="get" class="row g-2 align-items-end">
                    <div class="col-md-5">
                        <label class="form-label">Mailbox</label>
                        <select name="mailbox" class="form-select" required>
                            @foreach($mailboxes as $m)
                                <option value="{{ $m }}" @selected($m === $mailbox)>{{ $m }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Rows</label>
                        <select name="top" class="form-select">
                            @foreach([10, 25, 50] as $n)
                                <option value="{{ $n }}" @selected((int)request('top', 25) === $n)>{{ $n }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit">
                            <i class="ti ti-refresh"></i>&nbsp;Load
                        </button>
                        @if($next)
                            <a class="btn btn-outline-secondary" href="{{ route('admin.inbox.index', ['mailbox' => $mailbox, 'next' => $next, 'top' => request('top', 25)]) }}">
                                Next page
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                    <tr>
                        <th>Subject</th>
                        <th>From</th>
                        <th>Received</th>
                        <th class="text-center">Read</th>
                        <th class="text-center">Attachments</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($messages as $msg)
                        @php($from = $msg['from']['emailAddress']['address'] ?? null)
                        <tr>
                            <td>
                                <a href="{{ route('admin.inbox.show', [$msg['id']]) }}?mailbox={{ urlencode($mailbox) }}">
                                    {{ $msg['subject'] ?? '(no subject)' }}
                                </a>
                                @if(!empty($msg['bodyPreview']))
                                    <div class="text-secondary small">{{ $msg['bodyPreview'] }}</div>
                                @endif
                            </td>
                            <td class="text-secondary">{{ $from ?? '-' }}</td>
                            <td class="text-secondary">
                                {{ !empty($msg['receivedDateTime']) ? \Illuminate\Support\Carbon::parse($msg['receivedDateTime'])->timezone(config('app.timezone'))->toDayDateTimeString() : '-' }}
                            </td>
                            <td class="text-center">
                                @if(isset($msg['isRead']) && $msg['isRead'])
                                    <span class="badge bg-green-lt">Yes</span>
                                @else
                                    <span class="badge bg-yellow-lt">No</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if(!empty($msg['hasAttachments']))
                                    <span class="badge bg-blue-lt">Yes</span>
                                @else
                                    <span class="text-secondary">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary p-4">No messages found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
