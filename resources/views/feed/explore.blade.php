<x-app-layout>
    <x-slot:title>Explore</x-slot:title>

    <div class="border-b border-slate-800 px-4 py-4 sm:px-6">
        <h1 class="text-xl font-semibold">Explore</h1>
        <p class="mt-1 text-sm text-slate-400">Popular posts and new people to follow.</p>
    </div>

    <div class="px-4 py-5 sm:px-6">
        <h2 class="text-sm font-semibold text-slate-200">Top posts</h2>

        <div class="mt-3 space-y-4">
            @forelse ($topPosts as $post)
                <div class="rounded-2xl border border-slate-800 bg-slate-950 px-4 py-4">
                    <div class="flex flex-wrap items-center gap-2 text-sm text-slate-400">
                        <strong class="text-slate-100">{{ $post->user->display_name ?: $post->user->name }}</strong>
                        @if ($post->user->username)
                            <span>@{{ $post->user->username }}</span>
                        @endif
                        <span>•</span>
                        <span>{{ $post->created_at?->diffForHumans() }}</span>
                    </div>

                    <p class="mt-2 whitespace-pre-wrap wrap-break-word text-base text-slate-200">{{ $post->body }}</p>

                    <div class="mt-3 flex items-center gap-6 text-sm text-slate-400">
                        <span>💬 {{ $post->replies_count }}</span>
                        <span>❤️ {{ $post->likes_count }}</span>
                    </div>
                </div>
            @empty
                <p class="text-sm text-slate-400">No posts yet.</p>
            @endforelse
        </div>
    </div>

    <div class="border-t border-slate-800 px-4 py-5 sm:px-6">
        <h2 class="text-sm font-semibold text-slate-200">New users</h2>

        <div class="mt-3 space-y-2">
            @forelse ($newUsers as $user)
                <div class="flex items-center justify-between gap-3 rounded-2xl border border-slate-800 bg-slate-950 px-4 py-3">
                    <div class="min-w-0">
                        <div class="truncate text-sm font-semibold text-slate-100">{{ $user->display_name ?: $user->name }}</div>
                        <div class="truncate text-sm text-slate-400">
                            @if ($user->username)
                                @{{ $user->username }}
                            @else
                                {{ $user->email }}
                            @endif
                        </div>
                    </div>
                    <button class="rounded-full bg-slate-100 px-4 py-1.5 text-sm font-semibold text-slate-900 opacity-60" disabled>
                        Follow
                    </button>
                </div>
            @empty
                <p class="text-sm text-slate-400">No users yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
