<x-app-layout>
    <x-slot:title>Settings</x-slot:title>

    <div class="border-b border-slate-800 px-4 py-4 sm:px-6">
        <h1 class="text-xl font-semibold">Settings</h1>
        <p class="mt-1 text-sm text-slate-400">Edit your profile details.</p>
    </div>

    @if (session('status'))
        <div class="px-4 pt-5 sm:px-6">
            <div class="rounded-2xl border border-emerald-900 bg-emerald-950/40 px-4 py-3 text-sm text-emerald-200">
                {{ session('status') }}
            </div>
        </div>
    @endif

    @if (!$user)
        <div class="px-4 py-8 text-sm text-slate-400 sm:px-6">
            No user found yet. Create a post first.
        </div>
    @else
        <form method="POST" action="{{ route('settings.update') }}" class="px-4 py-6 sm:px-6">
            @csrf
            @method('PATCH')

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-slate-200">Display name</label>
                    <input
                        name="display_name"
                        value="{{ old('display_name', $user->display_name) }}"
                        class="mt-2 w-full rounded-xl border border-slate-800 bg-slate-950 px-4 py-3 text-sm text-slate-100 placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-sky-500"
                        placeholder="e.g. Professor Arthur"
                    />
                    @error('display_name')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-200">Username</label>
                    <input
                        name="username"
                        value="{{ old('username', $user->username) }}"
                        class="mt-2 w-full rounded-xl border border-slate-800 bg-slate-950 px-4 py-3 text-sm text-slate-100 placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-sky-500"
                        placeholder="e.g. professorarthur"
                    />
                    @error('username')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-200">Bio</label>
                    <textarea
                        name="bio"
                        rows="4"
                        class="mt-2 w-full resize-none rounded-xl border border-slate-800 bg-slate-950 px-4 py-3 text-sm text-slate-100 placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-sky-500"
                        placeholder="Say something about yourself"
                    >{{ old('bio', $user->bio) }}</textarea>
                    @error('bio')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <button class="w-full rounded-full bg-sky-500 px-5 py-2 text-sm font-semibold text-white hover:bg-sky-400 sm:w-auto">
                    Save
                </button>
            </div>
        </form>
    @endif
</x-app-layout>
