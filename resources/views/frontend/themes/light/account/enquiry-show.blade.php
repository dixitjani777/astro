@extends('frontend.themes.light.layouts.inner')

@section('title', 'Request / Order #' . $enquiry->id)
@section('inner-content')
    <article class="light-enquiry-detail">
        <a href="{{ url('/myaccount/querystatus') }}">&larr; Back to requests</a>
        <h2>Request / Order #{{ $enquiry->id }}</h2>
        <p>{{ $enquiry->request_type_label }} · {{ $enquiry->current_status_label }}</p>
        <p><small>{{ optional($enquiry->created_at)->format('M d, Y h:i A') }}</small></p>
        @if($enquiry->source === 'query')
            <div class="alert alert-info">For additional questions, <a href="{{ url('/astrologer/book') }}">book a paid consultation</a>.</div>
        @endif
        <div class="light-enquiry-message">
            @if($enquiry->subject)<h3>{{ $enquiry->subject }}</h3>@endif
            <div>{!! nl2br(e($enquiry->message)) !!}</div>
        </div>
        <h3>Responses</h3>
        @forelse($enquiry->replies as $reply)
            <div class="light-enquiry-reply"><strong>{{ $reply->sender_type === 'admin' ? 'Astrologer / Admin' : 'You' }}</strong><small>{{ optional($reply->created_at)->format('M d, Y h:i A') }}</small><div>{!! nl2br(e($reply->body)) !!}</div></div>
        @empty
            <p>No response yet.</p>
        @endforelse
    </article>
@endsection

@section('sidebar')
    @include('frontend.themes.light.partials.account-sidebar')
@endsection
