<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (empty($roles)) {
            return $next($request);
        }

        $user = $request->user();

        if (!$user) {
            if (in_array(User::ROLE_GUEST, $roles, true)) {
                return $next($request);
            }

            if ($request->expectsJson()) {
                abort(401, 'Unauthenticated.');
            }

            return redirect()->route('login');
        }

        $userRole = $user->role ?? User::ROLE_USER;

        if ($this->isAuthorized($userRole, $roles)) {
            return $next($request);
        }

        abort(403, 'Forbidden.');
    }

    /**
     * Determine if a role is authorized for the required roles.
     */
    private function isAuthorized(string $userRole, array $roles): bool
    {
        $ranks = [
            User::ROLE_GUEST => 10,
            User::ROLE_USER => 40,
            User::ROLE_MODERATION => 60,
            User::ROLE_ADMIN => 80,
            User::ROLE_SUPERADMIN => 100,
        ];

        $userRank = $ranks[$userRole] ?? $ranks[User::ROLE_USER];

        foreach ($roles as $role) {
            $requiredRank = $ranks[$role] ?? null;

            if ($requiredRank === null) {
                continue;
            }

            if ($userRank >= $requiredRank) {
                return true;
            }
        }

        return false;
    }
}
