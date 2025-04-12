<?php

namespace App\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsManager
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user || !$user->hasRole('Manager')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}
