<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Ranter' }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
    <div class="flex min-h-screen items-center justify-center px-4 py-10">
        <div class="w-full max-w-md">
            <div class="flex justify-center">
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-lg font-semibold tracking-tight">
                    <img src="{{ asset('favicon-32x32.png') }}" alt="Ranter logo" class="h-7 w-7">
                    <span>Ranter</span>
                </a>
            </div>

            <div class="mt-6 rounded-2xl border border-slate-800 bg-slate-950/70 p-6 shadow-xl">
                {{ $slot }}
            </div>

            <p class="mt-6 text-center text-xs text-slate-500">Join the conversation when you're ready.</p>
        </div>
    </div>
</body>
</html>
