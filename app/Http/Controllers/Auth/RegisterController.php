<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
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
            'invite' => ['required', 'string', 'max:255'],
            'dateBirth' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "phone_number"=>['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo_path'=>['required'],
            "company"=>["required", "integer"]
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
        DB::table("invites")
            ->where("code", "=", $data["invite"])
            ->update(["isActive"=> 0]);

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'position' => $data['position'],
            'birthday' => $data['dateBirth'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            "company_id" => $data["company"]

        ]);
        $fileTempPrefix = Str::random(15);
        $avatar = \request()->file("photo_path")->getClientOriginalName();
        \request()->file("photo_path")->storeAs("public/pictures", $user->id."/avatar/".$fileTempPrefix."_".$avatar, "");

        $mainImage = Image::make(Storage::path("public/pictures")."/".$user->id."/avatar/".$fileTempPrefix."_".$avatar);
        $badgeImage = $mainImage;
        $mainImage->widen(700);
        $mainImage->save();
        if (!File::isDirectory(Storage::path("public/pictures")."/".$user->id."/badges/")) {
            File::makeDirectory(Storage::path("public/pictures")."/".$user->id."/badges/");
        }
        $badgeImage->resize(1000, 1000);
        $badgeImage->save(Storage::path("public/pictures")."/".$user->id."/badges/".$fileTempPrefix."_".$avatar);

        $user->update(["photo_path"=>$fileTempPrefix."_".$avatar]);

        return $user;
    }
}
