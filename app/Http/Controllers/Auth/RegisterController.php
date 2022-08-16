<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Constants;
use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Models\Invites;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Classes\FileUtilites;
use App\Classes\ImageUtilites;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    protected function showRegistrationForm()
    {
        $companies = Companies::where("isHidden", 0)
            ->get();

        $inviteCode = \request()->get("invite") ?? "";

        return view('auth.register', ["companies"=>$companies, "invite"=>$inviteCode]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'dateBirth' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "phone_number"=>['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo_path'=>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'position' => $data['position'],
            'birthday' => $data['dateBirth'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password'])

        ]);
        $fileTempPrefix = Str::random(15);
        $avatar = \request()->file("photo_path")->getClientOriginalName();
        \request()->file("photo_path")->storeAs("public/pictures", $user->id."/avatar/".$fileTempPrefix."_".$avatar, "");

        $mainPath = Storage::path("public/pictures")."/".$user->id."/avatar/";
        $subPath = Storage::path("public/pictures")."/".$user->id."/badges/";

        $fileName = $fileTempPrefix."_".$avatar;

        FileUtilites::createDirIfNotExist($subPath);
        ImageUtilites::createAvatars(["main"=>$mainPath, "sub"=>$subPath], $fileName);

        $user->update(["photo_path"=>$fileName]);

        $token = $user->createToken(Constants::COOKIE_TOKEN_NAME, ["main:user"]);
        Cookie::queue(Constants::COOKIE_TOKEN_NAME, $token->plainTextToken, 3265, null, null, false, false);

        return $user;
    }
}
