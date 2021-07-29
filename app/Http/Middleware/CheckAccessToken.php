<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckAccessToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token_expiration_date = Carbon::parse(Auth::user()->token()->expires_at);
        $today = Carbon::now();
        if ($today > $token_expiration_date) {
            Auth::user()->token()->revoke();
            return response()->json('Unauthorized.', Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }
}
