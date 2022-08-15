<?php

namespace App\Http\Middleware;

use App\Classes\Constants;
use Closure;
use Illuminate\Http\Request;

class CheckSuperPermission
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
        if ($request->user()->permission_id === Constants::SUPERADMIN_PRIVILEGE) {
            return $next($request);
        }

        return redirect("home");
    }
}
