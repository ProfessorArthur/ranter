@extends('layouts.admin', ['title' => 'Admin · Create User'])

@section('header', 'Admin · Create User')

@section('content')
    <section class="rounded-3xl border border-slate-800 bg-slate-900/50 p-6">
        <h3 class="text-xl font-semibold text-white">Create user</h3>
        <p class="mt-2 text-sm text-slate-400">Add a new account and assign a role.</p>

        <form method="POST" action="{{ route('admin.users.store') }}" class="mt-6 grid gap-4">
            @csrf

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Name</label>
                    <input name="name" value="{{ old('name') }}" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-2 text-sm text-slate-100" required />
                    @error('name')
                        <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Username</label>
                    <input name="username" value="{{ old('username') }}" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-2 text-sm text-slate-100" required />
                    @error('username')
                        <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-2 text-sm text-slate-100" required />
                    @error('email')
                        <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Role</label>
                    <select name="role" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-2 text-sm text-slate-100" required>
                        @foreach ([\App\Models\User::ROLE_USER => 'User', \App\Models\User::ROLE_MODERATION => 'Moderation', \App\Models\User::ROLE_ADMIN => 'Admin', \App\Models\User::ROLE_SUPERADMIN => 'Super Admin'] as $value => $label)
                            <option value="{{ $value }}" @selected(old('role') === $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Password</label>
                <input type="password" name="password" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-2 text-sm text-slate-100" required />
                @error('password')
                    <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4 flex flex-wrap gap-3">
                <a href="{{ route('admin.users') }}" class="rounded-full border border-slate-700 px-5 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300 hover:border-slate-500 hover:text-white">
                    Cancel
                </a>
                <button type="submit" class="rounded-full bg-sky-500 px-5 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-white hover:bg-sky-400">
                    Create user
                </button>
            </div>
        </form>
    </section>
@endsection
