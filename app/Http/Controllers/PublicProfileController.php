<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class PublicProfileController extends Controller
{
    public function show(string $username)
    {
        $user = User::query()
            ->where('username', $username)
            ->withCount(['followers', 'following'])
            ->firstOrFail();

        $posts = Post::query()
            ->where('user_id', $user->id)
            ->withCount(['likes', 'replies'])
            ->latest()
            ->paginate(20);

        return view('profiles.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
