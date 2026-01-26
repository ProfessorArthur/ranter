<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $name = $request->input('name');
        $username = $request->input('username');
        $displayName = $request->input('display_name');
        $email = $request->input('email');

            $request->merge([
                'name' => is_string($name) ? trim($name) : $name,
                'username' => is_string($username) ? strtolower(trim($username)) : $username,
                'display_name' => is_string($displayName) ? trim($displayName) : $displayName,
                'email' => is_string($email) ? strtolower(trim($email)) : $email,
            ]);

            if (is_string($displayName) && trim($displayName) === '') {
                $request->merge(['display_name' => null]);
            }

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:30', 'alpha_dash', 'unique:'.User::class],
                'display_name' => ['nullable', 'string', 'max:60'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
                'display_name' => $request->display_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}
