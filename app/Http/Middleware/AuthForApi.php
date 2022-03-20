<?php

namespace App\Http\Middleware;

use App\Classes\Constants;
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
            $privileges = ["main:user"];

            if ($request->user()->permission_id === Constants::MODER_PRIVILEGE) $privileges[] = "main:moder";
            if ($request->user()->permission_id === Constants::ADMIN_PRIVILEGE) $privileges[] = "main:admin";

            $token = $request->user()->createToken("APITOKEN", $privileges);

            Cookie::queue("_APIBEARER", $token->plainTextToken, 3265, null, null, false, false);

//            return $next($request)->cookie("_APIBEARER", $token->plainTextToken, 3265);
        }

        return $next($request);
    }
}
