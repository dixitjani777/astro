<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/css/tabler.min.css">
</head>
<body class="border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="AstroDuniya" style="height:56px; width:auto; object-fit:contain;">
                    <h1 class="h3 m-0">Admin</h1>
                </div>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>

                        @if (session('status'))
                            <div class="alert alert-success py-2">{{ session('status') }}</div>
                        @endif

                        <form method="post" action="{{ route('admin.login.post') }}">
                            @csrf
                            <input type="hidden" name="hp_time" value="{{ time() }}">
                            <input type="text" name="website" value="" autocomplete="off" tabindex="-1" style="position:absolute;left:-10000px;top:auto;width:1px;height:1px;opacity:0">

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                                @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" required>
                                @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" value="1">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>

                            <button class="btn btn-warning w-100" type="submit">Login</button>
                        </form>
                </div>
            </div>
            <div class="text-center text-secondary mt-3">
                <a class="text-muted" href="{{ url('/') }}">Back to site</a>
            </div>
        </div>
    </div>
</body>
</html>
