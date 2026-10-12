@extends('frontend.themes.light.layouts.inner')

@section('title', $pageTitle)
@section('inner-content')
    <div class="light-account-enquiries">
        <h2>{{ $pageTitle }}</h2>
        <p>{{ $pageSubtitle }}</p>
        @forelse($enquiries as $enquiry)
            <article class="light-enquiry-card">
                <h3>{{ $enquiry->subject ?: 'Enquiry' }}</h3>
                <p>{{ \Illuminate\Support\Str::limit($enquiry->message, 220) }}</p>
                <small>{{ optional($enquiry->created_at)->format('d M Y, h:i A') }}</small>
                <a href="{{ route('account.enquiries.show', $enquiry) }}">View details</a>
            </article>
        @empty
            <p>No enquiries found.</p>
        @endforelse
        {{ $enquiries->links() }}
    </div>
@endsection

@section('sidebar')
    @include('frontend.themes.light.partials.account-sidebar')
@endsection
