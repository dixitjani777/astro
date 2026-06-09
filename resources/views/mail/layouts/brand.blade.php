@php
    $brandName = $siteSettings['mail.from.name'] ?? config('app.name');
    $supportEmail = $siteSettings['site.email'] ?? config('mail.from.address');
    $supportPhone = $siteSettings['site.phone'] ?? '';
    $supportAddress = $siteSettings['contact.address_html'] ?? '';
    $businessHours = $siteSettings['contact.business_hours'] ?? '';
    $whatsapp = $siteSettings['social.whatsapp'] ?? '';
    $logoUrl = asset($siteSettings['mail.brand.logo'] ?? 'images/logo.png');
    $brandAccent = $siteSettings['mail.brand.primary_color'] ?? '#c89b3c';
    $brandDark = $siteSettings['mail.brand.dark_color'] ?? '#101828';
    $brandSoft = '#f8f4ea';
    $tagline = $siteSettings['mail.brand.tagline'] ?? '';
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? $brandName }}</title>
</head>
<body style="margin:0; padding:0; background:#f3f4f6; font-family:Arial,Helvetica,sans-serif; color:#1f2937;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#f3f4f6; padding:24px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:680px; margin:0 auto;">
                    <tr>
                        <td style="padding:0 16px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#ffffff; border-radius:18px; overflow:hidden; box-shadow:0 10px 35px rgba(16,24,40,.08);">
                                <tr>
                                    <td style="background:linear-gradient(135deg, {{ $brandDark }}, #23304a); padding:28px 32px; text-align:center;">
                                        <img src="{{ $logoUrl }}" alt="{{ $brandName }}" style="max-width:200px; width:100%; height:auto; display:block; margin:0 auto 14px;">
                                        <div style="color:#d8e1ee; font-size:13px; letter-spacing:.12em; text-transform:uppercase;">{{ $tagline ?: $brandName }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:32px;">
                                        @isset($heading)
                                            <h1 style="margin:0 0 16px; font-size:26px; line-height:1.25; color:{{ $brandDark }};">{{ $heading }}</h1>
                                            <div style="height:3px; width:72px; background:{{ $brandAccent }}; border-radius:999px; margin:0 0 22px;"></div>
                                        @endisset

                                        @yield('content')
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 32px 32px;">
                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:{{ $brandSoft }}; border:1px solid #ead8b1; border-radius:14px;">
                                            <tr>
                                                <td style="padding:18px 20px;">
                                                    <div style="font-size:14px; font-weight:bold; color:{{ $brandDark }}; margin-bottom:10px;">Need help?</div>
                                                    <div style="font-size:14px; line-height:1.7; color:#374151;">
                                                        @if($supportEmail)
                                                            <div>Email: <a href="mailto:{{ $supportEmail }}" style="color:#0f4c81; text-decoration:none;">{{ $supportEmail }}</a></div>
                                                        @endif
                                                        @if($supportPhone)
                                                            <div>Phone: <a href="tel:{{ preg_replace('/\s+/', '', $supportPhone) }}" style="color:#0f4c81; text-decoration:none;">{{ $supportPhone }}</a></div>
                                                        @endif
                                                        @if($whatsapp)
                                                            <div>WhatsApp: <a href="{{ $whatsapp }}" style="color:#0f4c81; text-decoration:none;">Chat with us</a></div>
                                                        @endif
                                                        @if($businessHours)
                                                            <div>Hours: {{ $businessHours }}</div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @if(trim(strip_tags($supportAddress)) !== '')
                                    <tr>
                                        <td style="padding:0 32px 28px; color:#6b7280; font-size:13px; line-height:1.7;">
                                            {!! $supportAddress !!}
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td style="padding:0 32px 28px; color:#6b7280; font-size:12px; line-height:1.7; text-align:center;">
                                        This email was sent by {{ $brandName }}. If you did not request it, you can safely ignore it.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
