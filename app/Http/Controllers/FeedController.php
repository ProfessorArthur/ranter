<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->with('user')
            ->withCount(['replies', 'likes'])
            ->whereNull('in_reply_to_post_id')
            ->latest()
            ->paginate(20);

        return view('feed.home', [
            'posts' => $posts,
        ]);
    }
}
