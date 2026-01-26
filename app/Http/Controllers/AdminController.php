<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Media;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'users' => User::count(),
            'posts' => Post::count(),
            'likes' => Like::count(),
            'media' => Media::count(),
            'notifications' => Notification::count(),
            'follows' => DB::table('follows')->count(),
        ];

        $chartSource = [
            ['label' => 'Users', 'value' => $stats['users']],
            ['label' => 'Posts', 'value' => $stats['posts']],
            ['label' => 'Likes', 'value' => $stats['likes']],
            ['label' => 'Media', 'value' => $stats['media']],
            ['label' => 'Follows', 'value' => $stats['follows']],
        ];

        $maxValue = max(1, ...array_map(fn ($item) => $item['value'], $chartSource));

        $chart = array_map(function ($item) use ($maxValue) {
            return [
                ...$item,
                'percent' => (int) round(($item['value'] / $maxValue) * 100),
            ];
        }, $chartSource);

        $recentUsers = User::latest()->take(5)->get(['id', 'name', 'username', 'role', 'created_at']);
        $recentPosts = Post::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'chart', 'recentUsers', 'recentPosts'));
    }

    public function users()
    {
        $users = User::latest()->paginate(20);

        return view('admin.users', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users-create');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', Rule::in([
                User::ROLE_USER,
                User::ROLE_MODERATION,
                User::ROLE_ADMIN,
                User::ROLE_SUPERADMIN,
            ])],
        ]);

        User::create($validated);

        return redirect()->route('admin.users')->with('status', 'User created.');
    }

    public function editUser(User $user)
    {
        return view('admin.users-edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8'],
            'role' => ['required', Rule::in([
                User::ROLE_USER,
                User::ROLE_MODERATION,
                User::ROLE_ADMIN,
                User::ROLE_SUPERADMIN,
            ])],
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users')->with('status', 'User updated.');
    }

    public function destroyUser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('status', 'User deleted.');
    }

    public function posts()
    {
        $posts = Post::with('user')->latest()->paginate(20);

        return view('admin.posts', compact('posts'));
    }

    public function editPost(Post $post)
    {
        return view('admin.posts-edit', compact('post'));
    }

    public function updatePost(Request $request, Post $post)
    {
        $validated = $request->validate([
            'body' => ['required', 'string', 'max:2000'],
        ]);

        $post->update($validated);

        return redirect()->route('admin.posts')->with('status', 'Post updated.');
    }

    public function destroyPost(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts')->with('status', 'Post deleted.');
    }

    public function reports()
    {
        return view('admin.reports');
    }

    public function moderation()
    {
        return view('admin.moderation');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
