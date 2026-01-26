@extends('layouts.admin', ['title' => 'Admin · Users'])

@section('header', 'Admin · Users')

@section('content')
    <section class="rounded-3xl border border-slate-800 bg-slate-900/50 p-6">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h3 class="text-xl font-semibold text-white">Users</h3>
                <p class="mt-2 text-sm text-slate-400">Manage accounts, roles, and access.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.users', ['refresh' => now()->timestamp]) }}" class="rounded-full border border-slate-700 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300 hover:border-slate-500 hover:text-white">
                    Reload
                </a>
                <a href="{{ route('admin.users.create') }}" class="rounded-full bg-sky-500 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-white hover:bg-sky-400">
                    Create user
                </a>
            </div>
        </div>

        @if (session('status'))
            <p class="mt-4 rounded-2xl border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
                {{ session('status') }}
            </p>
        @endif

        <div class="mt-6 overflow-hidden rounded-2xl border border-slate-800">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-900/70 text-xs uppercase tracking-[0.2em] text-slate-400">
                    <tr>
                        <th class="px-4 py-3">User</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Joined</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse ($users as $user)
                        <tr class="bg-slate-950/40">
                            <td class="px-4 py-3">
                                <p class="font-semibold text-white">{{ $user->name }}</p>
                                <p class="text-xs text-slate-500">{{ '@' . $user->username }}</p>
                            </td>
                            <td class="px-4 py-3 text-slate-300">{{ $user->role }}</td>
                            <td class="px-4 py-3 text-slate-400">{{ $user->created_at?->toFormattedDateString() }}</td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex flex-wrap justify-end gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="rounded-full border border-slate-700 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300 hover:border-slate-500 hover:text-white">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-full border border-rose-500/60 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-rose-200 hover:border-rose-400 hover:text-white">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-slate-950/40">
                            <td colspan="4" class="px-4 py-6 text-center text-slate-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </section>
@endsection
