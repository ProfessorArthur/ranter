<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-xl font-semibold text-slate-100">Welcome back</h1>
        <p class="mt-1 text-sm text-slate-400">Sign in to continue.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="mt-1 flex items-center gap-2">
                <x-text-input
                    id="password"
                    class="flex-1"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />
                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950 px-3 py-2 text-slate-300 hover:bg-slate-900 hover:text-white"
                    data-password-toggle="password"
                    aria-pressed="false"
                    aria-label="Show password"
                >
                    <svg data-password-icon-show class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.46 12c1.64-4.27 5.72-7 9.54-7s7.9 2.73 9.54 7c-1.64 4.27-5.72 7-9.54 7s-7.9-2.73-9.54-7z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                    <svg data-password-icon-hide class="hidden h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.58 10.58a2 2 0 002.83 2.83" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.88 5.09A9.97 9.97 0 0112 5c3.82 0 7.9 2.73 9.54 7a10.5 10.5 0 01-4.32 5.28" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.53 6.53A10.5 10.5 0 002.46 12c1.07 2.78 3.35 5 6.1 6" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-slate-700 bg-slate-950 text-sky-500 focus:ring-sky-500" name="remember">
                <span class="ms-2 text-sm text-slate-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-5">
            @if (Route::has('password.request'))
                <a class="text-sm text-sky-400 hover:text-sky-300" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <p class="mt-6 text-center text-sm text-slate-400">
            New here?
            <a class="font-semibold text-sky-400 hover:text-sky-300" href="{{ route('register') }}">Create an account</a>
        </p>
    </form>
</x-guest-layout>
