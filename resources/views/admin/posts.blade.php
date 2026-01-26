@extends('layouts.admin', ['title' => 'Admin · Posts'])

@section('header', 'Admin · Posts')

@section('content')
    <section class="rounded-3xl border border-slate-800 bg-slate-900/50 p-6">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h3 class="text-xl font-semibold text-white">Posts</h3>
                <p class="mt-2 text-sm text-slate-400">Review and edit published content.</p>
            </div>
            <a href="{{ route('admin.posts', ['refresh' => now()->timestamp]) }}" class="rounded-full border border-slate-700 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300 hover:border-slate-500 hover:text-white">
                Reload
            </a>
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
                        <th class="px-4 py-3">Post</th>
                        <th class="px-4 py-3">Author</th>
                        <th class="px-4 py-3">Created</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @forelse ($posts as $post)
                        <tr class="bg-slate-950/40">
                            <td class="px-4 py-3 text-slate-200">
                                {{ str($post->body)->limit(120) }}
                            </td>
                            <td class="px-4 py-3 text-slate-400">{{ $post->user?->username ?? 'Unknown' }}</td>
                            <td class="px-4 py-3 text-slate-400">{{ $post->created_at?->toFormattedDateString() }}</td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex flex-wrap justify-end gap-2">
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="rounded-full border border-slate-700 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300 hover:border-slate-500 hover:text-white">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?');">
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
                            <td colspan="4" class="px-4 py-6 text-center text-slate-500">No posts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </section>
@endsection
