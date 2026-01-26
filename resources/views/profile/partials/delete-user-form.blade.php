<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <div class="mt-1 flex items-center gap-2">
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="flex-1"
                        placeholder="{{ __('Password') }}"
                    />
                    <button
                        type="button"
                        class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-3 py-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700"
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

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
