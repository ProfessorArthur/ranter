<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user() ?: User::query()->first();

        return view('settings.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user() ?: User::query()->first();

        if (!$user) {
            return redirect()->route('settings.edit');
        }

        $displayName = $request->input('display_name');
        $username = $request->input('username');
        $bio = $request->input('bio');

        $request->merge([
            'display_name' => is_string($displayName) ? trim($displayName) : $displayName,
            'username' => is_string($username) ? strtolower(trim($username)) : $username,
            'bio' => is_string($bio) ? trim($bio) : $bio,
        ]);

        if (is_string($displayName) && trim($displayName) === '') {
            $request->merge(['display_name' => null]);
        }

        if (is_string($bio) && trim($bio) === '') {
            $request->merge(['bio' => null]);
        }

        $validated = $request->validate([
            'display_name' => ['nullable', 'string', 'max:60'],
            'username' => [
                'required',
                'string',
                'max:30',
                'alpha_dash',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'bio' => ['nullable', 'string', 'max:160'],
        ]);

        $user->update($validated);

        return redirect()
            ->route('settings.edit')
            ->with('status', 'Settings saved.');
    }
}
