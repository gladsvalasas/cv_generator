<?php

namespace App\Http\Controllers;

use App\Classes\FileUtilites;
use App\Classes\ImageUtilites;
use App\Models\Countries;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countries = Countries::all();
        $countriesList = [];

        $userInfo = User::getUser(Auth::id());

        foreach ($countries as $country) {
            $countriesList[] = [
                "name"=>$country["name"],
                "userSelected"=> $userInfo["country"] === $country["name"]
            ];
        }

        return view('home', ["userInfo"=>$userInfo, "countries"=>$countriesList]);
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255'],
            "phone_number"=>['required', 'string', 'max:255'],
            'about'=>['nullable', 'string'],
            'country'=>['nullable', 'string'],
            'city'=>['nullable', 'string'],
        ]);


        if ($validator->fails()) {
            return redirect("portal/home")->withErrors($validator);
        }

        $data = $validator->validated();

        $avatar = $request->file("photo_path");
        if ($avatar !== null) {
            $fileTempPrefix = Str::random(15);
            $avatarName = $fileTempPrefix."_".$avatar->getClientOriginalName();

            $mainPath = Storage::path("public/pictures")."/".Auth::id()."/avatar/";
            $subPath = Storage::path("public/pictures")."/".Auth::id()."/badges/";

            $avatar->storeAs("public/pictures", Auth::id()."/avatar/".$avatarName);

            FileUtilites::createDirIfNotExist($subPath);
            ImageUtilites::createAvatars(["main"=>$mainPath, "sub"=>$subPath], $avatarName);

            $data["photo_path"] = $avatarName;
        }

        User::whereId(Auth::id())->update($data);

        return redirect("portal/home");
    }
}
