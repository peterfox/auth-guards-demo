<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateWhenRequestIsSigned
{
    public function handle(Request $request, Closure $next, string $parameterName, string $guard = null)
    {
        if ($request->hasValidSignature()) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
            Auth::guard($guard)->loginUsingId($request->route()->parameter($parameterName));
        }

        return $next($request);
    }
}
