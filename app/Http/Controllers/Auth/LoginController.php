<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Constants;
use App\Classes\UsersUtilities;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function authenticated(Request $request, $user)
    {
        $token = $user->createToken(Constants::COOKIE_TOKEN_NAME, UsersUtilities::checkPrivilegesForToken($user));
        Cookie::queue(Constants::COOKIE_TOKEN_NAME, $token->plainTextToken, 3265, null, null, false, false);
    }

    function loggedOut(Request $request)
    {
        Cookie::forget(Constants::COOKIE_TOKEN_NAME);
    }
}
