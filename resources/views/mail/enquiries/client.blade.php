<p>Thanks for contacting {{ config('app.name') }}.</p>
<p>We received your enquiry and will get back to you shortly.</p>

@if($enquiry->subject)
    <p><strong>Subject:</strong> {{ $enquiry->subject }}</p>
@endif

@if($enquiry->message)
    <p><strong>Your message:</strong></p>
    <p>{{ $enquiry->message }}</p>
@endif

