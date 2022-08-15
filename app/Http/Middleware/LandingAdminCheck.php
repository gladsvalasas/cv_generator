<?php

namespace App\Http\Middleware;

use App\Classes\Constants;
use Closure;
use Illuminate\Http\Request;

class LandingAdminCheck
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
        if ($request->user()->tokenCan(Constants::USER_API_PERMISSIONS[3])) {
            return $next($request);
        }

        return response(["message"=>"You don't have permission"], 403);
    }
}
