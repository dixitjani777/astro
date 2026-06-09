@extends('mail.layouts.brand', ['subject' => 'Your OTP Code'])

@section('content')
    <p style="margin:0 0 16px; font-size:15px; line-height:1.8; color:#374151;">
        Use the one-time password below to continue with your account action.
    </p>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin:24px 0;">
        <tr>
            <td align="center" style="background:#fff7e6; border:1px dashed #d6a84f; border-radius:16px; padding:22px;">
                <div style="font-size:12px; letter-spacing:.14em; text-transform:uppercase; color:#a16207; margin-bottom:10px;">One-Time Password</div>
                <div style="font-size:34px; letter-spacing:.22em; font-weight:bold; color:#111827;">{{ $code }}</div>
            </td>
        </tr>
    </table>

    <p style="margin:0 0 12px; font-size:14px; line-height:1.8; color:#374151;">
        This code expires in 10 minutes.
    </p>
    <p style="margin:0; font-size:14px; line-height:1.8; color:#374151;">
        If you did not request this code, you can ignore this email.
    </p>
@endsection
