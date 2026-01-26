<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ranter | Be loud. Be Vocal.</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            /* Use a simple dot pattern */
            .hero-pattern-layer {
                background-image: radial-gradient(circle, #5784c3 3px, transparent 5px);
                background-size: 30px 30px;
                will-change: transform;
            }

            .text-outline-hero {
                /* Create the outline */
                -webkit-text-stroke: 4px #000000;
                paint-order: stroke fill;
                text-shadow: 2px 2px 0px rgba(0,0,0,0.2);
            }

            .text-outline-sub {
                -webkit-text-stroke: 4px #000000;
                paint-order: stroke fill;
            }
        </style>
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 font-sans antialiased">
    <main class="mx-auto w-full max-w-6xl px-6 py-12 sm:px-8 sm:py-20 lg:px-12">
        <div class="flex justify-center mb-10">
            <a href="{{ route('welcome') }}" class="flex items-center gap-2 text-xl font-semibold tracking-tight hover:opacity-80 transition">
                <img src="{{ asset('favicon-32x32.png') }}" alt="Ranter logo" class="h-8 w-8">
                <span>Ranter | Be loud. Be Vocal.</span>
            </a>
        </div>

        <section class="relative overflow-hidden rounded-3xl border border-slate-800 bg-slate-950 shadow-2xl">
            <div class="hero-pattern-layer absolute inset-0 animate-subtle-drift opacity-30 transform-gpu"></div>

            <div class="absolute -left-24 top-10 h-72 w-72 rounded-full bg-sky-500/10 blur-3xl animate-soft-glow transform-gpu will-change-transform"></div>
            <div class="absolute -right-24 top-24 h-72 w-72 rounded-full bg-indigo-500/10 blur-3xl animate-soft-glow transform-gpu will-change-transform" style="animation-delay: -2s;"></div>
            <div class="absolute bottom-0 left-1/2 h-72 w-72 -translate-x-1/2 rounded-full bg-violet-500/10 blur-3xl animate-soft-glow transform-gpu will-change-transform" style="animation-delay: -4s;"></div>

            <div class="relative px-6 py-16 text-center sm:px-12 sm:py-24">
                <div class="inline-flex items-center gap-2 rounded-full border border-slate-500 bg-slate-900/95 px-6 py-2 text-sm font-semibold uppercase tracking-[0.3em] text-slate-100 shadow-xl">
                    Welcome to Ranter
                </div>

                <h1 class="text-outline-hero mt-8 text-4xl font-bold tracking-tight text-slate-50 sm:text-6xl lg:text-7xl leading-tight">
                    Share your voice.<br class="hidden sm:block" /> 
                    Find your people.
                </h1>

                <p class="text-outline-sub mx-auto mt-6 max-w-2xl text-lg font-medium leading-relaxed text-slate-200 sm:text-xl">
                    Ranter is a lightweight social space built for real conversations. 
                    Discover thoughtful posts, follow creators you admire, and shape your own feed in minutes.
                </p>

                <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                    @guest
                        <div x-data class="flex gap-4">
                            <button type="button" @click.prevent="$dispatch('open-modal', 'guest-access')" class="inline-flex items-center justify-center rounded-full border border-slate-700 bg-slate-800/50 px-8 py-3 text-sm font-semibold text-white transition hover:bg-slate-700 transform-gpu duration-300 hover:scale-105">
                                Explore
                            </button>
                            <button type="button" @click.prevent="$dispatch('open-modal', 'guest-access')" class="inline-flex items-center justify-center rounded-full bg-sky-500 px-8 py-3 text-sm font-semibold text-white shadow-lg shadow-sky-500/20 transition hover:bg-sky-400 transform-gpu duration-300 hover:scale-105">
                                Get Started
                            </button>
                        </div>
                    @endguest
                </div>
            </div>
        </section>

        @guest
            <x-modal name="guest-access" maxWidth="md">
                <div class="bg-slate-950 text-slate-100 p-6">
                    <div class="flex items-center justify-between border-b border-slate-800 pb-4 mb-6">
                        <div>
                            <h2 class="text-lg font-semibold">Join the conversation</h2>
                            <p class="mt-1 text-sm text-slate-400">Create an account to post and interact.</p>
                        </div>
                        <button type="button" @click="$dispatch('close-modal', 'guest-access')" class="text-slate-400 hover:text-white transition">
                            <span class="sr-only">Close</span>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="grid gap-3 sm:grid-cols-2">
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-700 bg-slate-900 px-4 py-2.5 text-sm font-semibold text-slate-200 hover:bg-slate-800 transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center rounded-lg bg-sky-500 px-4 py-2.5 text-sm font-semibold text-white shadow hover:bg-sky-400 transition">
                            Register
                        </a>
                    </div>

                    <div class="mt-6 border-t border-slate-800 pt-5 text-center">
                        <a href="{{ route('explore') }}" class="text-sm font-medium text-slate-400 hover:text-sky-400 hover:underline transition">
                            Continue exploring without an account
                        </a>
                    </div>
                </div>
            </x-modal>
        @endguest

        <section class="mt-16 grid gap-6 lg:grid-cols-3">
            <div class="rounded-2xl border border-slate-800 bg-slate-900/30 p-6 transition hover:bg-slate-900/50">
                <div class="mb-4 inline-flex h-10 w-10 items-center justify-center rounded-full bg-sky-500/10 text-sky-300">
                    <svg class="h-5 w-5 motion-safe:animate-bounce" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h10" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-white">Live feed</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-400">See what the community is talking about in real time. Never miss a beat.</p>
            </div>

            <div class="rounded-2xl border border-slate-800 bg-slate-900/30 p-6 transition hover:bg-slate-900/50">
                <div class="mb-4 inline-flex h-10 w-10 items-center justify-center rounded-full bg-indigo-500/10 text-indigo-300">
                    <svg class="h-5 w-5 motion-safe:animate-bounce" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 00-8 0v1a4 4 0 108 0V7z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-white">Discover creators</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-400">Follow the voices you trust and find new perspectives from around the globe.</p>
            </div>

            <div class="rounded-2xl border border-slate-800 bg-slate-900/30 p-6 transition hover:bg-slate-900/50">
                <div class="mb-4 inline-flex h-10 w-10 items-center justify-center rounded-full bg-violet-500/10 text-violet-300">
                    <svg class="h-5 w-5 motion-safe:animate-bounce" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 6 4 4 6.5 4c1.74 0 3.41 1.01 4.22 2.53C11.59 5.01 13.26 4 15 4 17.5 4 19.5 6 19.5 8.5c0 3.78-3.4 6.86-8.55 11.18L12 21z" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-white">Join the vibe</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-400">Post, like, and build your own feed with friends. Your voice matters here.</p>
            </div>
        </section>

        <section class="mx-auto mt-12 max-w-2xl">
            <div class="rounded-3xl border border-slate-800 bg-slate-900/40 p-10 text-center">
                <h2 class="mt-4 text-2xl font-semibold text-white">Make every post count</h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-400">
                    Draft with focus mode, organize with tags, and spark meaningful replies.
                </p>
                <div class="mt-8 mb-4 flex justify-center">
                    <ul class="space-y-4 text-left text-sm text-slate-300">
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 h-2 w-2 rounded-full bg-sky-400 shrink-0"></span>
                            Thoughtful prompts to help you get started.
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 h-2 w-2 rounded-full bg-sky-400 shrink-0"></span>
                            Curated recommendations based on who you follow.
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="mt-1.5 h-2 w-2 rounded-full bg-sky-400 shrink-0"></span>
                            Private drafts so you can publish when it feels right.
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <footer class="mt-10 flex flex-wrap items-center justify-between gap-4 border-t border-slate-800 pt-6 text-xs text-slate-500">
            <p>Built for thoughtful conversations.</p>
                <div class="flex items-center gap-4">
                <a href="{{ route('explore') }}" class="hover:text-slate-300 transition-colors duration-200">Explore</a>
                <a href="{{ route('login') }}" class="hover:text-slate-300 transition-colors duration-200">Login</a>
                <a href="{{ route('register') }}" class="hover:text-slate-300 transition-colors duration-200">Register</a>
            </div>
        </footer>
    </main>
</body>
</html>