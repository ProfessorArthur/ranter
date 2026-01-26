<x-guest-layout>
    <div class="max-w-sm mx-auto mb-6 text-center">
        <h1 class="text-xl font-semibold text-slate-100">Create your account</h1>
        <p class="mt-1 text-sm text-slate-400">Join Ranter in seconds.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="max-w-sm mx-auto">
        @csrf

        <!-- Full name -->
        <div>
            <x-input-label for="name" :value="__('Full name')" />
            <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <p class="text-xs text-slate-400 mt-1">Your full or real name — shown in account settings.</p>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Username / handle -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username (handle)')" />
            <x-text-input id="username" class="mt-1 block w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
            <p class="text-xs text-slate-400 mt-1">Public handle shown as <span class="font-medium">@</span><span class="font-mono">username</span> on posts and mentions.</p>
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Display name (optional) -->
        <div class="mt-4">
            <x-input-label for="display_name" :value="__('Display name (optional)')" />
            <x-text-input id="display_name" class="mt-1 block w-full" type="text" name="display_name" :value="old('display_name')" autocomplete="nickname" />
            <p class="text-xs text-slate-400 mt-1">Shown on your profile and next to your posts. Can include spaces and special characters.</p>
            <x-input-error :messages="$errors->get('display_name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
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

        <div class="mt-6 flex items-center justify-between">
            <a class="text-sm text-slate-400 hover:text-slate-200" href="{{ route('login') }}">
                Already registered?
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
