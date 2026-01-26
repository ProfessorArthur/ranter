@extends('layouts.admin', ['title' => 'Admin Dashboard'])

@section('header', 'Admin Dashboard')

@section('admin_sidebar')
    <div class="mt-10 rounded-2xl border border-slate-800 bg-slate-900/40 p-4">
        <p class="text-xs uppercase tracking-[0.3em] text-slate-500">Quick actions</p>
        <div class="mt-4 space-y-3 text-sm">
            <button class="w-full rounded-xl border border-slate-700 bg-slate-950 px-4 py-2 text-slate-200 hover:bg-slate-800">
                Review flagged posts
            </button>
            <button class="w-full rounded-xl bg-sky-500 px-4 py-2 font-semibold text-white hover:bg-sky-400">
                Invite moderators
            </button>
        </div>
    </div>
@endsection

@section('content')
    <section class="rounded-3xl border border-slate-800 bg-slate-900/50 p-6">
        <div class="flex flex-wrap items-start justify-between gap-4">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-500">Live</p>
                <h3 class="mt-3 text-2xl font-semibold text-white">Platform overview</h3>
                <p class="mt-2 text-sm text-slate-400">Realtime metrics from the database.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.dashboard', ['refresh' => now()->timestamp]) }}" class="rounded-full border border-slate-700 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300 hover:border-slate-500 hover:text-white">
                    Reload data
                </a>
                <button class="rounded-full border border-slate-700 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300 hover:border-slate-500 hover:text-white">
                    Export
                </button>
                <button class="rounded-full bg-sky-500 px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-white hover:bg-sky-400">
                    Create report
                </button>
            </div>
        </div>

        <div class="mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-2xl border border-slate-800 bg-slate-950/40 p-4">
                <p class="text-xs text-slate-500">Total users</p>
                <p class="mt-2 text-2xl font-semibold text-white">{{ number_format($stats['users']) }}</p>
                <p class="mt-1 text-xs text-slate-500">All registered accounts</p>
            </div>
            <div class="rounded-2xl border border-slate-800 bg-slate-950/40 p-4">
                <p class="text-xs text-slate-500">Total posts</p>
                <p class="mt-2 text-2xl font-semibold text-white">{{ number_format($stats['posts']) }}</p>
                <p class="mt-1 text-xs text-slate-500">Posts created to date</p>
            </div>
            <div class="rounded-2xl border border-slate-800 bg-slate-950/40 p-4">
                <p class="text-xs text-slate-500">Total likes</p>
                <p class="mt-2 text-2xl font-semibold text-white">{{ number_format($stats['likes']) }}</p>
                <p class="mt-1 text-xs text-slate-500">Engagement count</p>
            </div>
            <div class="rounded-2xl border border-slate-800 bg-slate-950/40 p-4">
                <p class="text-xs text-slate-500">Media assets</p>
                <p class="mt-2 text-2xl font-semibold text-white">{{ number_format($stats['media']) }}</p>
                <p class="mt-1 text-xs text-slate-500">Uploads in storage</p>
            </div>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
        <div class="rounded-3xl border border-slate-800 bg-slate-900/50 p-6">
            <div class="flex items-center justify-between">
                <h4 class="text-lg font-semibold text-white">Graph & analytics</h4>
                <span class="text-xs uppercase tracking-[0.2em] text-slate-500">Totals</span>
            </div>
            <div class="mt-5 space-y-4">
                @foreach ($chart as $metric)
                    <div>
                        <div class="flex items-center justify-between text-xs text-slate-400">
                            <span>{{ $metric['label'] }}</span>
                            <span>{{ number_format($metric['value']) }}</span>
                        </div>
                        <div class="mt-2 h-2 w-full rounded-full bg-slate-800">
                            <div class="h-2 rounded-full bg-sky-500" style="width: {{ $metric['percent'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="rounded-3xl border border-slate-800 bg-slate-900/50 p-6">
            <h4 class="text-lg font-semibold text-white">Notifications</h4>
            <p class="mt-2 text-sm text-slate-400">Total notifications sent: {{ number_format($stats['notifications']) }}</p>
            <div class="mt-6 rounded-2xl border border-slate-800 bg-slate-950/40 p-4 text-sm">
                <p class="text-slate-300">Follows recorded</p>
                <p class="mt-2 text-2xl font-semibold text-white">{{ number_format($stats['follows']) }}</p>
            </div>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-2">
        <div class="rounded-3xl border border-slate-800 bg-slate-900/50 p-6">
            <div class="flex items-center justify-between">
                <h4 class="text-lg font-semibold text-white">Recent users</h4>
                <a href="{{ route('admin.users') }}" class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400 hover:text-white">Manage</a>
            </div>
            <div class="mt-4 space-y-3 text-sm">
                @forelse ($recentUsers as $user)
                    <div class="flex items-center justify-between rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-3">
                        <div>
                            <p class="text-slate-200">{{ $user->name }}</p>
                            <p class="text-xs text-slate-500">{{ '@' . $user->username }} · {{ $user->role }}</p>
                        </div>
                        <span class="text-xs text-slate-500">{{ $user->created_at?->diffForHumans() }}</span>
                    </div>
                @empty
                    <p class="text-sm text-slate-500">No users yet.</p>
                @endforelse
            </div>
        </div>

        <div class="rounded-3xl border border-slate-800 bg-slate-900/50 p-6">
            <div class="flex items-center justify-between">
                <h4 class="text-lg font-semibold text-white">Recent posts</h4>
                <a href="{{ route('admin.posts') }}" class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400 hover:text-white">Review</a>
            </div>
            <div class="mt-4 space-y-3 text-sm">
                @forelse ($recentPosts as $post)
                    <div class="rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-3">
                        <p class="text-slate-200">{{ str($post->body)->limit(90) }}</p>
                        <p class="mt-2 text-xs text-slate-500">by {{ $post->user?->username ?? 'Unknown' }} · {{ $post->created_at?->diffForHumans() }}</p>
                    </div>
                @empty
                    <p class="text-sm text-slate-500">No posts yet.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
