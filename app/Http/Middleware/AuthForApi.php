<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class AuthForApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && !Cookie::has("_APIBEARER")) {
            $request->user()->tokens()->delete();
            $token = $request->user()->createToken("APITOKEN", ["main:user"]);

            Cookie::queue("_APIBEARER", $token->plainTextToken, 3265, null, null, false, false);

//            return $next($request)->cookie("_APIBEARER", $token->plainTextToken, 3265);
        }

        return $next($request);
    }
}
