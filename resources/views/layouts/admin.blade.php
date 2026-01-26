<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin' }} | Ranter</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 font-sans antialiased">
    <div class="bg-slate-950 text-slate-100">
        <div class="mx-auto flex min-h-screen w-full max-w-7xl flex-col gap-6 px-4 py-8 sm:px-6 lg:flex-row lg:px-8">
            <aside class="w-full rounded-3xl border border-slate-800 bg-slate-900/60 p-6 lg:w-72">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-sky-500/10 text-sky-400">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l9 4.5-9 4.5-9-4.5L12 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10.5l9 4.5 9-4.5" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5l9 4.5 9-4.5" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white">Ranter Admin</p>
                        <p class="text-xs text-slate-400">Control center</p>
                    </div>
                </div>

                <nav class="mt-8 space-y-2 text-sm">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 rounded-2xl px-4 py-2.5 text-slate-300 hover:bg-slate-800/60 hover:text-white {{ request()->routeIs('admin.dashboard') ? 'border border-slate-700 bg-slate-800/70 text-white' : '' }}">
                        @if (request()->routeIs('admin.dashboard'))
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                        @endif
                        Overview
                    </a>
                    <a href="{{ route('admin.users') }}" class="flex items-center gap-3 rounded-2xl px-4 py-2.5 text-slate-300 hover:bg-slate-800/60 hover:text-white {{ request()->routeIs('admin.users') ? 'border border-slate-700 bg-slate-800/70 text-white' : '' }}">
                        @if (request()->routeIs('admin.users'))
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                        @endif
                        Users
                    </a>
                    <a href="{{ route('admin.posts') }}" class="flex items-center gap-3 rounded-2xl px-4 py-2.5 text-slate-300 hover:bg-slate-800/60 hover:text-white {{ request()->routeIs('admin.posts') ? 'border border-slate-700 bg-slate-800/70 text-white' : '' }}">
                        @if (request()->routeIs('admin.posts'))
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                        @endif
                        Posts
                    </a>
                    <a href="{{ route('admin.reports') }}" class="flex items-center gap-3 rounded-2xl px-4 py-2.5 text-slate-300 hover:bg-slate-800/60 hover:text-white {{ request()->routeIs('admin.reports') ? 'border border-slate-700 bg-slate-800/70 text-white' : '' }}">
                        @if (request()->routeIs('admin.reports'))
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                        @endif
                        Reports
                    </a>
                    <a href="{{ route('admin.moderation') }}" class="flex items-center gap-3 rounded-2xl px-4 py-2.5 text-slate-300 hover:bg-slate-800/60 hover:text-white {{ request()->routeIs('admin.moderation') ? 'border border-slate-700 bg-slate-800/70 text-white' : '' }}">
                        @if (request()->routeIs('admin.moderation'))
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                        @endif
                        Moderation
                    </a>
                    <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 rounded-2xl px-4 py-2.5 text-slate-300 hover:bg-slate-800/60 hover:text-white {{ request()->routeIs('admin.settings') ? 'border border-slate-700 bg-slate-800/70 text-white' : '' }}">
                        @if (request()->routeIs('admin.settings'))
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                        @endif
                        Settings
                    </a>
                </nav>

                @yield('admin_sidebar')
            </aside>

            <main class="flex-1 space-y-6">
                <header class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-semibold text-white">@yield('header', 'Admin')</h1>
                        <p class="mt-2 text-sm text-slate-400">Welcome, {{ auth()->user()?->name ?? auth()->user()?->username ?? 'Admin' }}</p>
                        @hasSection('subheader')
                            <p class="mt-2 text-sm text-slate-400">@yield('subheader')</p>
                        @endif
                    </div>
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center justify-center rounded-full border border-slate-700 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300 transition hover:border-slate-500 hover:text-white">
                                Logout
                            </button>
                        </form>
                    @endauth
                </header>

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
