<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class ExploreController extends Controller
{
    public function index()
    {
        $topPosts = Post::query()
            ->with('user')
            ->withCount(['likes', 'replies'])
            ->whereNull('in_reply_to_post_id')
            ->orderByDesc('likes_count')
            ->latest()
            ->limit(10)
            ->get();

        $newUsers = User::query()
            ->latest()
            ->limit(10)
            ->get();

        return view('feed.explore', [
            'topPosts' => $topPosts,
            'newUsers' => $newUsers,
        ]);
    }
}
