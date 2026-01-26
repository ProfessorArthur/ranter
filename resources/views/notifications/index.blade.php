<x-app-layout>
    <x-slot:title>Notifications</x-slot:title>

    <div class="border-b border-slate-800 px-4 py-4 sm:px-6">
        <h1 class="text-xl font-semibold">Notifications</h1>
        <p class="mt-1 text-sm text-slate-400">Recent activity on your account.</p>
    </div>

    @if (!$user)
        <div class="px-4 py-8 text-sm text-slate-400 sm:px-6">
            No user found yet. Create a post first, then like it from another user later once auth is enabled.
        </div>
    @else
        <div class="divide-y divide-slate-800">
            @forelse ($notifications as $notification)
                <div class="px-4 py-5 sm:px-6">
                    @php($data = (array) $notification->data)

                    @if (($data['type'] ?? null) === 'post_liked')
                        <div class="text-sm text-slate-200">
                            <span class="font-semibold">{{ $data['actor_name'] ?? 'Someone' }}</span>
                            <span class="text-slate-400">
                                (@{{ $data['actor_username'] ?? 'unknown' }}) liked your post
                            </span>
                        </div>
                    @else
                        <div class="text-sm text-slate-200">
                            New notification
                        </div>
                    @endif

                    <div class="mt-1 text-xs text-slate-500">
                        {{ $notification->created_at?->diffForHumans() }}
                    </div>
                </div>
            @empty
                <div class="px-4 py-8 text-sm text-slate-400 sm:px-6">
                    No notifications yet.
                </div>
            @endforelse
        </div>

        @if (method_exists($notifications, 'links'))
            <div class="px-4 py-6 sm:px-6">
                {{ $notifications->links() }}
            </div>
        @endif
    @endif
</x-app-layout>
