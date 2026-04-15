<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Connexion' }} - Fab-Technology</title>
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #1e293b 0%, #334155 100%); min-height: 100vh; }
        .auth-card { max-width: 420px; width: 100%; }
    </style>
    @livewireStyles
</head>
<body class="d-flex align-items-center justify-content-center py-5">
    <div class="auth-card">
        <div class="text-center mb-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/img/favicon.png') }}" alt="Fab-Technology" height="48">
            </a>
        </div>
        <div class="card shadow-lg border-0">
            <div class="card-body p-4 p-md-5">
                {{ $slot }}
            </div>
        </div>
        <p class="text-center text-white-50 mt-3 small">&copy; {{ date('Y') }} Fab-Technology</p>
    </div>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @livewireScripts
</body>
</html>
