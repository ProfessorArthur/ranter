<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Request $request, Post $post)
    {
        $user = $request->user();
        if (!$user) {
            $user = User::query()->first();
        }

        if (!$user) {
            $user = User::query()->create([
                'name' => 'Demo User',
                'username' => 'demo',
                'email' => 'demo@example.com',
                'password' => 'password',
            ]);
        }

        $existing = Like::query()
            ->where('user_id', $user->id)
            ->where('post_id', $post->id)
            ->first();

        if ($existing) {
            $existing->delete();
        } else {
            Like::query()->create([
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);
        }

        return redirect()->back();
    }
}
