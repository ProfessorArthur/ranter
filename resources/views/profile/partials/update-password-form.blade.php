<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <div class="mt-1 flex items-center gap-2">
                <x-text-input id="update_password_current_password" name="current_password" type="password" class="flex-1" autocomplete="current-password" />
                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-3 py-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700"
                    data-password-toggle="update_password_current_password"
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
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <div class="mt-1 flex items-center gap-2">
                <x-text-input id="update_password_password" name="password" type="password" class="flex-1" autocomplete="new-password" />
                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-3 py-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700"
                    data-password-toggle="update_password_password"
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
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <div class="mt-1 flex items-center gap-2">
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="flex-1" autocomplete="new-password" />
                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-3 py-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700"
                    data-password-toggle="update_password_password_confirmation"
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
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
