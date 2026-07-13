<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coming Soon - {{ $siteName ?? config('app.name') }}</title>
    <meta name="robots" content="noindex,nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
            --bg: #fffaf5;
            --panel: rgba(255,255,255,.90);
            --text: #262626;
            --muted: #676767;
            --accent: #ff640a;
            --accent-dark: #1f1f1f;
            --line: rgba(255,100,10,.18);
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: Inter, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top right, rgba(255,100,10,.16), transparent 28%),
                radial-gradient(circle at bottom left, rgba(31,31,31,.08), transparent 30%),
                linear-gradient(180deg, #ffffff, var(--bg));
        }
        .card {
            width: min(92vw, 760px);
            padding: 40px;
            border-radius: 32px;
            background: var(--panel);
            backdrop-filter: blur(14px);
            box-shadow: 0 28px 70px rgba(31,31,31,.12);
            border: 1px solid rgba(255,255,255,.9);
            position: relative;
            overflow: hidden;
        }
        .card::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                linear-gradient(135deg, rgba(255,100,10,.09), transparent 34%),
                linear-gradient(315deg, rgba(31,31,31,.04), transparent 40%);
            pointer-events: none;
        }
        .eyebrow {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255,100,10,.10);
            color: var(--accent);
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            font-size: 12px;
        }
        h1 {
            margin: 18px 0 12px;
            font-family: "Playfair Display", serif;
            font-size: clamp(2.5rem, 5vw, 4.8rem);
            line-height: 1;
        }
        .brand-mark {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
        }
        .brand-mark img {
            width: min(100%, 360px);
            height: auto;
            display: block;
            filter: drop-shadow(0 10px 18px rgba(31,31,31,.08));
        }
        p {
            margin: 0 0 18px;
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.7;
        }
        .meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }
        .pill {
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(255,100,10,.08);
            color: var(--accent-dark);
            font-weight: 600;
        }
        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 28px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 18px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
        }
        .btn.primary { background: var(--accent); color: #fff; box-shadow: 0 10px 24px rgba(255,100,10,.22); }
        .btn.secondary { background: #f2f2f2; color: var(--accent-dark); }
        .brand {
            margin-top: 30px;
            color: var(--accent-dark);
            font-weight: 700;
            font-size: .95rem;
            letter-spacing: .06em;
            text-transform: uppercase;
        }
        @media (max-width: 640px) {
            .card { padding: 28px 22px; border-radius: 22px; }
            .actions { flex-direction: column; }
        }
    </style>
</head>
<body>
    <main class="card">
        <div class="brand-mark">
            <img src="{{ asset('images/logo3.png') }}" alt="{{ $siteName ?? config('app.name') }} logo">
        </div>
        <span class="eyebrow">Coming Soon</span>
        <h1>Something new is on the way.</h1>
        <p>{{ $message ?? 'We are preparing a fresh experience for our visitors. Please check back soon.' }}</p>

        @if(!empty($launchDate))
            <div class="meta">
                <span class="pill">Launch date: {{ \Illuminate\Support\Carbon::parse($launchDate)->format('M d, Y') }}</span>
            </div>
        @endif

        <div class="actions">
            <a class="btn primary" href="mailto:{{ config('mail.from.address') }}">Contact Support</a>
            @if(!empty($socialLinks['youtube']))
                <a class="btn secondary" href="{{ $socialLinks['youtube'] }}" target="_blank" rel="noopener">Follow on YouTube</a>
            @endif
        </div>

        <div class="brand">{{ $newsletterLabel ?? 'Get launch updates' }}</div>
    </main>
</body>
</html>
