<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $post->load('user')->loadCount(['likes', 'replies']);

        $replies = $post->replies()
            ->with('user')
            ->withCount(['likes', 'replies'])
            ->latest()
            ->paginate(25);

        return view('posts.show', [
            'post' => $post,
            'replies' => $replies,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => ['required', 'string', 'max:500'],
        ]);

        $user = $request->user();
        if (!$user) {
            $user = User::query()->first();
        }

        if (!$user) {
            $user = User::query()->create([
                'name' => 'Demo User',
                'username' => 'demo',
                'email' => 'demo@example.com',
                'password' => Hash::make('password'),
            ]);
        }

        Post::query()->create([
            'user_id' => $user->id,
            'body' => $validated['body'],
        ]);

        return redirect()->route('home');
    }
}
