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
        <div class="w-full max-w-sm mx-auto">
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
    <script>
        window.addEventListener('load', () => {
            const passwordToggles = document.querySelectorAll('[data-password-toggle]');
            passwordToggles.forEach((button) => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-password-toggle');
                    if (!targetId) {
                        return;
                    }

                    const input = document.getElementById(targetId);
                    if (!input) {
                        return;
                    }

                    const isHidden = input.getAttribute('type') === 'password';
                    input.setAttribute('type', isHidden ? 'text' : 'password');
                    button.setAttribute('aria-pressed', String(isHidden));

                    const showIcon = button.querySelector('[data-password-icon-show]');
                    const hideIcon = button.querySelector('[data-password-icon-hide]');

                    if (showIcon && hideIcon) {
                        if (isHidden) {
                            showIcon.classList.add('hidden');
                            hideIcon.classList.remove('hidden');
                        } else {
                            showIcon.classList.remove('hidden');
                            hideIcon.classList.add('hidden');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
