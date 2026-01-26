<x-guest-layout>
    <div class="mb-6 text-center">
        <h1 class="text-xl font-semibold text-slate-100">Set a new password</h1>
        <p class="mt-1 text-sm text-slate-400">Choose a strong password you can remember.</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="mt-1 flex items-center gap-2">
                <x-text-input id="password" class="flex-1" type="password" name="password" required autocomplete="new-password" />
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

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="mt-1 flex items-center gap-2">
                <x-text-input id="password_confirmation" class="flex-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950 px-3 py-2 text-slate-300 hover:bg-slate-900 hover:text-white"
                    data-password-toggle="password_confirmation"
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

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-5">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
