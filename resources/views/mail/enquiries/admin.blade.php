@extends('mail.layouts.brand', ['subject' => 'New enquiry received'])

@section('content')
    <p style="margin:0 0 16px; font-size:15px; line-height:1.8; color:#374151;">
        A new enquiry has been submitted from the website.
    </p>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #e5e7eb; border-radius:14px; overflow:hidden; margin:24px 0;">
        <tr>
            <td style="padding:16px 18px; background:#111827; color:#ffffff; font-size:14px; font-weight:bold;">
                Enquiry Details
            </td>
        </tr>
        <tr>
            <td style="padding:18px;">
                <div style="font-size:14px; line-height:1.85; color:#374151;">
                    <div><strong>Source:</strong> {{ $enquiry->source ?? '-' }}</div>
                    <div><strong>Context:</strong> {{ $enquiry->context ?? '-' }}</div>
                    <div><strong>Page:</strong> {{ $enquiry->page_url ?? '-' }}</div>
                    <div><strong>Name:</strong> {{ $enquiry->name ?? '-' }}</div>
                    <div><strong>Email:</strong> {{ $enquiry->email ?? '-' }}</div>
                    <div><strong>Phone:</strong> {{ $enquiry->phone ?? '-' }}</div>
                    <div><strong>Subject:</strong> {{ $enquiry->subject ?? '-' }}</div>
                    <div style="margin-top:12px;"><strong>Message:</strong></div>
                    <div>{{ $enquiry->message ?? '-' }}</div>
                </div>
            </td>
        </tr>
    </table>

    @if(!empty($enquiry->meta))
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #e5e7eb; border-radius:14px; overflow:hidden; margin:24px 0;">
            <tr>
                <td style="padding:16px 18px; background:#f9fafb; font-size:14px; font-weight:bold; color:#111827;">
                    Meta
                </td>
            </tr>
            <tr>
                <td style="padding:18px; font-family:Consolas,Monaco,monospace; font-size:12px; line-height:1.7; color:#374151;">
                    {{ json_encode($enquiry->meta, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}
                </td>
            </tr>
        </table>
    @endif
@endsection
