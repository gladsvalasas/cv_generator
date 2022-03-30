<?php

namespace App\Http\Middleware;

use App\Classes\Constants;
use App\Classes\UsersUtilities;
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
            $privileges = UsersUtilities::checkPrivilegesForToken($request->user());

            $token = $request->user()->createToken(Constants::COOKIE_TOKEN_NAME, $privileges);

            Cookie::queue(Constants::COOKIE_TOKEN_NAME, $token->plainTextToken, 3265, null, null, false, false);

//            return $next($request)->cookie("_APIBEARER", $token->plainTextToken, 3265);
        }

        return $next($request);
    }
}
