<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;

class IsAuthenticatedMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('is-authenticated')){
            return redirect()->route('show-login-from')->withErrors(['not-authenticated' => 'You are not authenticated. please login first']);
        }
        return $next($request);
    }
}
