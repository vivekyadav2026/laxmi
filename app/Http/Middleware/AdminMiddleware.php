<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }

        if (!auth()->user()->isAdmin()) {
            auth()->logout();
            return redirect()->route('admin.login')->withErrors([
                'email' => 'Access denied. You do not have administrator privileges.',
            ]);
        }

        return $next($request);
    }
}
