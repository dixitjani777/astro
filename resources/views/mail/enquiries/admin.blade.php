<p><strong>New enquiry received.</strong></p>

<ul>
    <li><strong>Source:</strong> {{ $enquiry->source ?? '-' }}</li>
    <li><strong>Context:</strong> {{ $enquiry->context ?? '-' }}</li>
    <li><strong>Page:</strong> {{ $enquiry->page_url ?? '-' }}</li>
    <li><strong>Name:</strong> {{ $enquiry->name ?? '-' }}</li>
    <li><strong>Email:</strong> {{ $enquiry->email ?? '-' }}</li>
    <li><strong>Phone:</strong> {{ $enquiry->phone ?? '-' }}</li>
    <li><strong>Subject:</strong> {{ $enquiry->subject ?? '-' }}</li>
</ul>

<p><strong>Message</strong></p>
<p>{{ $enquiry->message ?? '-' }}</p>

@if(!empty($enquiry->meta))
    <p><strong>Meta</strong></p>
    <pre>{{ json_encode($enquiry->meta, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
@endif

