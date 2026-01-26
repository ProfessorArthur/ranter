@extends('layouts.admin', ['title' => 'Admin · Edit User'])

@section('header', 'Admin · Edit User')

@section('content')
    <section class="rounded-3xl border border-slate-800 bg-slate-900/50 p-6">
        <h3 class="text-xl font-semibold text-white">Edit user</h3>
        <p class="mt-2 text-sm text-slate-400">Update account details and role.</p>

        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="mt-6 grid gap-4">
            @csrf
            @method('PATCH')

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Name</label>
                    <input name="name" value="{{ old('name', $user->name) }}" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-2 text-sm text-slate-100" required />
                    @error('name')
                        <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Username</label>
                    <input name="username" value="{{ old('username', $user->username) }}" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-2 text-sm text-slate-100" required />
                    @error('username')
                        <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-2 text-sm text-slate-100" required />
                    @error('email')
                        <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Role</label>
                    <select name="role" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-2 text-sm text-slate-100" required>
                        @foreach ([\App\Models\User::ROLE_USER => 'User', \App\Models\User::ROLE_MODERATION => 'Moderation', \App\Models\User::ROLE_ADMIN => 'Admin', \App\Models\User::ROLE_SUPERADMIN => 'Super Admin'] as $value => $label)
                            <option value="{{ $value }}" @selected(old('role', $user->role) === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Reset password (optional)</label>
                <input type="password" name="password" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-2 text-sm text-slate-100" />
                @error('password')
                    <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4 flex flex-wrap gap-3">
                <a href="{{ route('admin.users') }}" class="rounded-full border border-slate-700 px-5 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300 hover:border-slate-500 hover:text-white">
                    Cancel
                </a>
                <button type="submit" class="rounded-full bg-sky-500 px-5 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-white hover:bg-sky-400">
                    Save changes
                </button>
            </div>
        </form>
    </section>
@endsection
