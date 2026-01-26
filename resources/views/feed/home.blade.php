<x-app-layout>
  <x-slot:title>Ranter | Home</x-slot:title>

  <header class="sticky top-0 z-10 border-b border-slate-800 bg-slate-950/80 px-4 py-4 backdrop-blur sm:px-6">
    <h1 class="text-xl font-semibold">Home</h1>
  </header>

  <section class="flex gap-3 border-b border-slate-800 px-4 py-5 sm:gap-4 sm:px-6">
    <div class="h-10 w-10 rounded-full bg-slate-700 sm:h-12 sm:w-12"></div>
    <div class="flex-1 min-w-0">
      <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <textarea
          name="body"
          placeholder="What's happening?"
          rows="3"
          class="w-full resize-none bg-transparent text-lg text-slate-100 placeholder:text-slate-500 focus:outline-none"
        >{{ old('body') }}</textarea>

        @error('body')
          <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror

        <div class="mt-3 flex flex-wrap items-center justify-between gap-3">
          <div class="flex items-center gap-3 text-xl">
            <button
              type="button"
              id="camera-trigger"
              class="inline-flex items-center justify-center rounded-full p-1 hover:bg-slate-900"
              aria-label="Open Camera"
            >
              📷
            </button>

            <label class="inline-flex cursor-pointer items-center rounded-full p-1 hover:bg-slate-900" aria-label="Open File">
              🖼️
              <input type="file" accept="image/*" class="sr-only" />
            </label>

            <button
              type="button"
              class="trigger inline-flex items-center justify-center rounded-full p-1 hover:bg-slate-900"
              aria-label="Pick an emoji"
            >
              😊
            </button>
          </div>
          <button class="w-full rounded-full bg-sky-500 px-5 py-2 text-sm font-semibold text-white hover:bg-sky-400 sm:w-auto">
            Post
          </button>
        </div>
      </form>
    </div>
  </section>

  @forelse ($posts as $post)
    <section class="flex gap-3 border-b border-slate-800 px-4 py-5 sm:gap-4 sm:px-6">
      <div class="h-10 w-10 rounded-full bg-slate-700 sm:h-12 sm:w-12"></div>
      <div class="flex-1 min-w-0">
        <div class="flex flex-wrap items-center gap-2 text-sm text-slate-400">
          <strong class="text-slate-100">{{ $post->user->display_name ?: $post->user->name }}</strong>
          @if ($post->user->username)
            <span>{{ '@' . $post->user->username }}</span>
          @endif
          <span>•</span>
          <span>{{ $post->created_at?->diffForHumans() }}</span>
        </div>

        <p class="mt-2 whitespace-pre-wrap wrap-break-word text-base text-slate-200">{{ $post->body }}</p>

        <div class="mt-4 flex flex-wrap items-center gap-6 text-sm text-slate-400">
          <span>💬 {{ $post->replies_count }}</span>
          <form method="POST" action="{{ route('posts.like', $post) }}">
            @csrf
            <button type="submit" class="inline-flex items-center gap-2 hover:text-slate-200">
              <span>❤️</span>
              <span>{{ $post->likes_count }}</span>
            </button>
          </form>
        </div>
      </div>
    </section>
  @empty
    <div class="px-4 py-8 text-sm text-slate-400 sm:px-6">
      No posts yet. Create your first one above.
    </div>
  @endforelse

  @if (isset($posts) && method_exists($posts, 'links'))
    <div class="px-4 py-6 sm:px-6">
      {{ $posts->links() }}
    </div>
  @endif
</x-app-layout>