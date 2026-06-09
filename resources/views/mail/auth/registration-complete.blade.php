@extends('mail.layouts.brand', ['subject' => 'Welcome to ' . (config('app.name') ?? 'Our site')])

@section('content')
    <p style="margin:0 0 16px; font-size:15px; line-height:1.8; color:#374151;">
        Your account has been created successfully.
    </p>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#f8fafc; border:1px solid #e5e7eb; border-radius:14px; margin:24px 0;">
        <tr>
            <td style="padding:20px;">
                <div style="font-size:14px; line-height:1.8; color:#374151;">
                    <div><strong>Name:</strong> {{ $user->name }}</div>
                    <div><strong>Email:</strong> {{ $user->email }}</div>
                    @if($user->mobile)
                        <div><strong>Mobile:</strong> {{ $user->mobile }}</div>
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <p style="margin:0 0 18px; font-size:14px; line-height:1.8; color:#374151;">
        You can now use your registered email to log in and manage your account.
    </p>

    <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin:28px 0;">
        <tr>
            <td>
                <a href="{{ url('/account') }}" style="display:inline-block; background:#c89b3c; color:#111827; text-decoration:none; font-size:14px; font-weight:bold; padding:12px 22px; border-radius:999px;">
                    Log in to your account
                </a>
            </td>
        </tr>
    </table>
@endsection
