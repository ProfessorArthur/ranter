<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            $user = User::query()->first();
        }

        $notifications = $user
            ? $user->notifications()->latest()->paginate(25)
            : collect();

        return view('notifications.index', [
            'user' => $user,
            'notifications' => $notifications,
        ]);
    }
}
