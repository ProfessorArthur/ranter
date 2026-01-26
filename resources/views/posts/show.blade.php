<x-app-layout>
    <x-slot:title>Post</x-slot:title>

    <div class="border-b border-slate-800 px-4 py-4 sm:px-6">
        <a href="{{ url()->previous() }}" class="text-sm text-slate-400 hover:text-slate-200">← Back</a>
    </div>

    <section class="border-b border-slate-800 px-4 py-5 sm:px-6">
        <div class="flex flex-wrap items-center gap-2 text-sm text-slate-400">
            <strong class="text-slate-100">{{ $post->user->display_name ?: $post->user->name }}</strong>
            @if ($post->user->username)
                <span>@{{ $post->user->username }}</span>
            @endif
            <span>•</span>
            <span>{{ $post->created_at?->diffForHumans() }}</span>
        </div>

        <p class="mt-3 whitespace-pre-wrap wrap-break-word text-base text-slate-200">{{ $post->body }}</p>

        <div class="mt-4 flex flex-wrap items-center gap-6 text-sm text-slate-400">
            <span>💬 {{ $post->replies_count }}</span>
            <span>❤️ {{ $post->likes_count }}</span>
        </div>
    </section>

    <div class="px-4 py-5 sm:px-6">
        <h2 class="text-sm font-semibold text-slate-200">Replies</h2>
    </div>

    <div class="divide-y divide-slate-800">
        @forelse ($replies as $reply)
            <section class="px-4 py-5 sm:px-6">
                <div class="flex flex-wrap items-center gap-2 text-sm text-slate-400">
                    <strong class="text-slate-100">{{ $reply->user->display_name ?: $reply->user->name }}</strong>
                    @if ($reply->user->username)
                        <span>@{{ $reply->user->username }}</span>
                    @endif
                    <span>•</span>
                    <span>{{ $reply->created_at?->diffForHumans() }}</span>
                </div>

                <p class="mt-2 whitespace-pre-wrap wrap-break-word text-base text-slate-200">{{ $reply->body }}</p>

                <div class="mt-3 flex flex-wrap items-center gap-6 text-sm text-slate-400">
                    <span>💬 {{ $reply->replies_count }}</span>
                    <span>❤️ {{ $reply->likes_count }}</span>
                </div>
            </section>
        @empty
            <div class="px-4 py-8 text-sm text-slate-400 sm:px-6">No replies yet.</div>
        @endforelse
    </div>

    <div class="px-4 py-6 sm:px-6">
        {{ $replies->links() }}
    </div>
</x-app-layout>
