<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Redirect if user is not logged in
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login first');
        }

        // Redirect if user does not have the required role
        if (!in_array(Auth::user()->role, $roles)) {
            return redirect('/')->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
}
