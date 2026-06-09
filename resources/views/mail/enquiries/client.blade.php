@extends('mail.layouts.brand', ['subject' => 'We received your enquiry'])

@section('content')
    <p style="margin:0 0 16px; font-size:15px; line-height:1.8; color:#374151;">
        Thanks for contacting us. We have received your enquiry and our team will review it shortly.
    </p>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #e5e7eb; border-radius:14px; overflow:hidden; margin:24px 0;">
        <tr>
            <td style="padding:16px 18px; background:#f9fafb; font-size:14px; color:#111827; font-weight:bold;">
                Enquiry Summary
            </td>
        </tr>
        <tr>
            <td style="padding:18px;">
                <div style="font-size:14px; line-height:1.8; color:#374151;">
                    @if($enquiry->subject)
                        <div><strong>Subject:</strong> {{ $enquiry->subject }}</div>
                    @endif
                    @if($enquiry->context)
                        <div><strong>Category:</strong> {{ $enquiry->context }}</div>
                    @endif
                    @if($enquiry->message)
                        <div style="margin-top:10px;"><strong>Your message:</strong></div>
                        <div>{{ $enquiry->message }}</div>
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <p style="margin:0; font-size:14px; line-height:1.8; color:#374151;">
        We will get back to you as soon as possible.
    </p>
@endsection
