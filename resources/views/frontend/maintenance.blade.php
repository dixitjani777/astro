<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maintenance Mode - AstroDuniya</title>
    <meta name="robots" content="noindex,nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
            --bg: #f6efe6;
            --panel: rgba(255,255,255,.82);
            --text: #1f2937;
            --muted: #6b7280;
            --accent: #c96d36;
            --accent-2: #24425a;
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
                radial-gradient(circle at top left, rgba(201,109,54,.20), transparent 30%),
                radial-gradient(circle at bottom right, rgba(36,66,90,.18), transparent 28%),
                linear-gradient(180deg, #fff8f1, var(--bg));
        }
        .card {
            width: min(92vw, 760px);
            padding: 40px;
            border-radius: 28px;
            background: var(--panel);
            backdrop-filter: blur(10px);
            box-shadow: 0 24px 60px rgba(31,41,55,.14);
            border: 1px solid rgba(255,255,255,.8);
        }
        .eyebrow {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(201,109,54,.12);
            color: var(--accent);
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            font-size: 12px;
        }
        h1 {
            margin: 18px 0 12px;
            font-family: "Playfair Display", serif;
            font-size: clamp(2.4rem, 5vw, 4.5rem);
            line-height: 1;
        }
        p {
            margin: 0 0 18px;
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.7;
        }
        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 26px;
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
        .social {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 26px;
        }
        .social a {
            color: var(--accent-2);
            text-decoration: none;
            font-weight: 600;
        }
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
            .actions, .social { flex-direction: column; }
        }
    </style>
</head>
<body>
    <main class="card">
        <span class="eyebrow">Maintenance Mode</span>
        <h1>We’ll be back soon.</h1>
        <p>{{ $message ?? 'We are currently making AstroDuniya even better. Please check back shortly.' }}</p>
        <p>Thank you for your patience while we upgrade the experience for you.</p>

        <div class="actions">
            @if(!empty($socialLinks['youtube']))
                <a class="btn primary" href="{{ $socialLinks['youtube'] }}" target="_blank" rel="noopener">Visit YouTube</a>
            @endif
            <a class="btn secondary" href="mailto:{{ config('mail.from.address') }}">Contact Support</a>
        </div>

        @php
            $links = array_filter($socialLinks ?? []);
        @endphp
        @if($links)
            <div class="social">
                @foreach($links as $label => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener">{{ ucfirst($label) }}</a>
                @endforeach
            </div>
        @endif

        <div class="brand">AstroDuniya</div>
    </main>
</body>
</html>
