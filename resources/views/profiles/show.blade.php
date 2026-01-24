<x-layouts.app>
    <x-slot:title>{{ $user->display_name ?: $user->name }}</x-slot:title>

    <div class="border-b border-slate-800">
        <div class="h-32 bg-slate-900"></div>

        <div class="px-6 pb-5">
            <div class="-mt-10 flex items-end justify-between">
                <div class="h-20 w-20 rounded-full border-4 border-slate-950 bg-slate-700"></div>
                <button class="rounded-full bg-slate-100 px-4 py-1.5 text-sm font-semibold text-slate-900 opacity-60" disabled>
                    Follow
                </button>
            </div>

            <div class="mt-3">
                <h1 class="text-xl font-semibold text-slate-100">{{ $user->display_name ?: $user->name }}</h1>
                <p class="text-sm text-slate-400">@{{ $user->username }}</p>

                @if ($user->bio)
                    <p class="mt-3 text-sm text-slate-200">{{ $user->bio }}</p>
                @endif

                <div class="mt-4 flex items-center gap-6 text-sm text-slate-400">
                    <span><span class="font-semibold text-slate-100">{{ $posts->total() }}</span> Posts</span>
                    <span><span class="font-semibold text-slate-100">{{ $user->followers_count }}</span> Followers</span>
                    <span><span class="font-semibold text-slate-100">{{ $user->following_count }}</span> Following</span>
                </div>
            </div>
        </div>
    </div>

    <div class="divide-y divide-slate-800">
        @forelse ($posts as $post)
            <section class="px-6 py-5">
                <div class="flex items-center justify-between text-sm text-slate-400">
                    <span>{{ $post->created_at?->diffForHumans() }}</span>
                    <a href="{{ route('posts.show', $post) }}" class="hover:text-slate-200">View</a>
                </div>

                <p class="mt-2 whitespace-pre-wrap text-base text-slate-200">{{ $post->body }}</p>

                <div class="mt-3 flex items-center gap-6 text-sm text-slate-400">
                    <span>💬 {{ $post->replies_count }}</span>
                    <span>❤️ {{ $post->likes_count }}</span>
                </div>
            </section>
        @empty
            <div class="px-6 py-8 text-sm text-slate-400">No posts yet.</div>
        @endforelse
    </div>

    <div class="px-6 py-6">
        {{ $posts->links() }}
    </div>
</x-layouts.app>