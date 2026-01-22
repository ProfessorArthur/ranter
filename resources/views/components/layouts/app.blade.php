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
    <div class="mx-auto flex min-h-screen max-w-6xl">
        <aside class="hidden w-64 border-r border-slate-800 px-6 py-6 lg:block">
            <a href="{{ url('/') }}" class="text-2xl font-semibold tracking-tight">Ranter</a>

            <nav class="mt-8 space-y-2 text-base">
                <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-full px-4 py-3 font-semibold hover:bg-slate-900">Home</a>
                <a href="{{ route('explore') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Explore</a>
                <a href="{{ route('notifications.index') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Notifications</a>
                <a href="#" class="flex items-center gap-3 rounded-full px-4 py-3 opacity-60 hover:bg-slate-900" aria-disabled="true" title="Coming soon">Messages</a>
                <a href="{{ route('profile.show') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Profile</a>
                <a href="{{ route('settings.edit') }}" class="flex items-center gap-3 rounded-full px-4 py-3 hover:bg-slate-900">Settings</a>
            </nav>

            <button class="mt-6 w-full rounded-full bg-sky-500 px-4 py-3 text-sm font-semibold text-white hover:bg-sky-400">
                Post
            </button>
        </aside>

        <main class="flex-1 border-x border-slate-800">
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
</body>
</html>
