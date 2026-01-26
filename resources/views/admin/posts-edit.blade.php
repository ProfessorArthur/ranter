@extends('layouts.admin', ['title' => 'Admin · Edit Post'])

@section('header', 'Admin · Edit Post')

@section('content')
    <section class="rounded-3xl border border-slate-800 bg-slate-900/50 p-6">
        <h3 class="text-xl font-semibold text-white">Edit post</h3>
        <p class="mt-2 text-sm text-slate-400">Update content for this post.</p>

        <form method="POST" action="{{ route('admin.posts.update', $post) }}" class="mt-6 grid gap-4">
            @csrf
            @method('PATCH')

            <div>
                <label class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Body</label>
                <textarea name="body" rows="6" class="mt-2 w-full rounded-2xl border border-slate-800 bg-slate-950/40 px-4 py-3 text-sm text-slate-100">{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <p class="mt-2 text-xs text-rose-300">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4 flex flex-wrap gap-3">
                <a href="{{ route('admin.posts') }}" class="rounded-full border border-slate-700 px-5 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300 hover:border-slate-500 hover:text-white">
                    Cancel
                </a>
                <button type="submit" class="rounded-full bg-sky-500 px-5 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-white hover:bg-sky-400">
                    Save changes
                </button>
            </div>
        </form>
    </section>
@endsection
