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
            --bg: #f8f4eb;
            --panel: rgba(255,255,255,.88);
            --text: #1f2937;
            --muted: #6b7280;
            --accent: #7c5c2e;
            --accent-2: #2f4b5e;
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
                radial-gradient(circle at top right, rgba(124,92,46,.18), transparent 30%),
                radial-gradient(circle at bottom left, rgba(47,75,94,.14), transparent 28%),
                linear-gradient(180deg, #fffdf8, var(--bg));
        }
        .card {
            width: min(92vw, 760px);
            padding: 42px;
            border-radius: 30px;
            background: var(--panel);
            backdrop-filter: blur(12px);
            box-shadow: 0 24px 60px rgba(31,41,55,.12);
            border: 1px solid rgba(255,255,255,.82);
        }
        .eyebrow {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(124,92,46,.12);
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
            background: #eef3f6;
            color: var(--accent-2);
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
        .btn.primary { background: var(--accent); color: #fff; }
        .btn.secondary { background: #e8eef2; color: var(--accent-2); }
        .brand {
            margin-top: 30px;
            color: var(--accent-2);
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
