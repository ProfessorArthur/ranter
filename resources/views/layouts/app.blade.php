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
    @stack('head')
    {{ $head ?? '' }}
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
    {{-- Mobile top bar + hamburger navigation --}}
    <header class="fixed inset-x-0 top-0 z-40 border-b border-slate-800 bg-slate-950/90 backdrop-blur lg:hidden">
        <div class="mx-auto flex w-full max-w-6xl items-center justify-between px-4 py-3">
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-base font-semibold tracking-tight">
                <img src="{{ asset('favicon-32x32.png') }}" alt="Ranter logo" class="h-7 w-7">
                <span>Ranter</span>
            </a>

            <button
                type="button"
                class="inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950 px-3 py-2 text-sm font-semibold hover:bg-slate-900"
                aria-label="Open menu"
                aria-controls="mobile-menu"
                aria-expanded="false"
                data-mobile-menu-open
            >
                Menu
            </button>
        </div>
    </header>

    <div id="mobile-menu-overlay" class="fixed inset-0 z-40 hidden bg-black/60 lg:hidden"></div>

    <aside
        id="mobile-menu"
        class="fixed inset-y-0 left-0 z-50 w-72 max-w-[85vw] -translate-x-full border-r border-slate-800 bg-slate-950 px-5 py-5 transition-transform duration-200 ease-out lg:hidden"
        aria-label="Mobile navigation"
    >
        <div class="flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-lg font-semibold tracking-tight">
                <img src="{{ asset('favicon-32x32.png') }}" alt="Ranter logo" class="h-7 w-7">
                <span>Ranter</span>
            </a>

            <button
                type="button"
                class="inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950 px-3 py-2 text-sm font-semibold hover:bg-slate-900"
                aria-label="Close menu"
                data-mobile-menu-close
            >
                Close
            </button>
        </div>

        <nav class="mt-6 space-y-2 text-base">
            <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-full px-4 py-3 font-semibold hover:bg-slate-900">Home</a>
            <a href="{{ route('explore') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Explore</a>
            <a href="{{ route('notifications.index') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Notifications</a>
            <a href="#" class="flex items-center gap-3 rounded-full px-4 py-3 opacity-60 hover:bg-slate-900" aria-disabled="true" title="Coming soon">Messages</a>
            @auth
                @php($profileUsername = auth()->user()->username)
                @if ($profileUsername)
                    <a href="{{ route('profile.show', ['username' => $profileUsername]) }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Profile</a>
                @else
                    <a href="{{ route('settings.edit') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Complete profile</a>
                @endif
                <a href="{{ route('settings.edit') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Settings</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Login</a>
                <a href="{{ route('register') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Register</a>
            @endauth
        </nav>

        <button class="mt-6 w-full rounded-full bg-sky-500 px-4 py-3 text-sm font-semibold text-white hover:bg-sky-400">
            Post
        </button>
    </aside>

    <div class="mx-auto flex min-h-screen max-w-6xl flex-col lg:flex-row">
        <aside class="hidden w-64 border-r border-slate-800 px-6 py-6 lg:block">
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-2xl font-semibold tracking-tight">
                <img src="{{ asset('favicon-32x32.png') }}" alt="Ranter logo" class="h-8 w-8">
                <span>Ranter</span>
            </a>

            <nav class="mt-8 space-y-2 text-base">
                <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-full px-4 py-3 font-semibold hover:bg-slate-900">Home</a>
                <a href="{{ route('explore') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Explore</a>
                <a href="{{ route('notifications.index') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Notifications</a>
                <a href="#" class="flex items-center gap-3 rounded-full px-4 py-3 opacity-60 hover:bg-slate-900" aria-disabled="true" title="Coming soon">Messages</a>
                @auth
                    @php($profileUsername = auth()->user()->username)
                    @if ($profileUsername)
                        <a href="{{ route('profile.show', ['username' => $profileUsername]) }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Profile</a>
                    @else
                        <a href="{{ route('settings.edit') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Complete profile</a>
                    @endif
                    <a href="{{ route('settings.edit') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Login</a>
                    <a href="{{ route('register') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Register</a>
                @endauth
            </nav>

            <button class="mt-6 w-full rounded-full bg-sky-500 px-4 py-3 text-sm font-semibold text-white hover:bg-sky-400">
                Post
            </button>
        </aside>

        <main class="w-full min-w-0 flex-1 border-slate-800 pt-16 pb-8 lg:border-x lg:pt-0 lg:pb-0">
            @guest
                @unless (request()->routeIs('login', 'register', 'password.*', 'verification.*'))
                    <div class="border-b border-slate-800 bg-slate-950/80 px-4 py-3 text-sm text-slate-200 sm:px-6">
                        <span class="font-semibold">You are not registered / logged in yet.</span>
                        <span class="text-slate-400">You can browse posts, but sign in to like, post, or follow.</span>
                        <span class="ml-2">
                            <a class="font-semibold text-sky-400 hover:text-sky-300" href="{{ route('login') }}">Login</a>
                            <span class="text-slate-500">•</span>
                            <a class="font-semibold text-sky-400 hover:text-sky-300" href="{{ route('register') }}">Register</a>
                        </span>
                    </div>
                @endunless
            @endguest
            {{ $slot }}
        </main>

        <aside class="hidden w-80 px-6 py-6 lg:block">
            @isset($rightbar)
                {{ $rightbar }}
            @else
                <div class="rounded-full bg-slate-900 px-4 py-3">
                    <input
                        type="text"
                        placeholder="Search"
                        class="w-full bg-transparent text-sm text-slate-100 placeholder:text-slate-500 focus:outline-none"
                    />
                </div>

                <div class="mt-6 rounded-2xl bg-slate-900 p-4">
                    <h3 class="text-sm font-semibold text-slate-200">Trends for you</h3>
                    <ul class="mt-3 space-y-2 text-sm text-slate-400">
                        <li>#Laravel</li>
                        <li>#Blade</li>
                        <li>#Vite</li>
                    </ul>
                </div>

                <div class="mt-6 rounded-2xl bg-slate-900 p-4">
                    <h3 class="text-sm font-semibold text-slate-200">Who to follow</h3>
                    <ul class="mt-3 space-y-2 text-sm text-slate-400">
                        <li>@johnsmith</li>
                        <li>@devguru</li>
                        <li>@uiwizard</li>
                    </ul>
                </div>
            @endisset
        </aside>
    </div>

    @stack('scripts')
    {{ $scripts ?? '' }}
    <script>
        window.addEventListener('load', () => {
            if (window.__ranterMobileNav) {
                return;
            }

            const openButton = document.querySelector('[data-mobile-menu-open]');
            const closeButton = document.querySelector('[data-mobile-menu-close]');
            const overlay = document.getElementById('mobile-menu-overlay');
            const panel = document.getElementById('mobile-menu');

            if (!openButton || !closeButton || !overlay || !panel) {
                return;
            }

            function setOpenState(isOpen) {
                openButton.setAttribute('aria-expanded', String(isOpen));

                if (isOpen) {
                    overlay.classList.remove('hidden');
                    panel.classList.remove('-translate-x-full');
                    panel.classList.add('translate-x-0');
                    document.body.classList.add('overflow-hidden');
                } else {
                    overlay.classList.add('hidden');
                    panel.classList.add('-translate-x-full');
                    panel.classList.remove('translate-x-0');
                    document.body.classList.remove('overflow-hidden');
                }
            }

            openButton.addEventListener('click', () => setOpenState(true));
            closeButton.addEventListener('click', () => setOpenState(false));
            overlay.addEventListener('click', () => setOpenState(false));

            panel.addEventListener('click', (event) => {
                const target = event.target;
                if (target instanceof HTMLElement && target.closest('a')) {
                    setOpenState(false);
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    const isOpen = !overlay.classList.contains('hidden');
                    if (isOpen) {
                        event.preventDefault();
                        setOpenState(false);
                    }
                }
            });
        });
    </script>
</body>
</html>
