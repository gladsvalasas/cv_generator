<?php

namespace App\Http\Controllers\Portal;

use App\Classes\AbstractVerifyModel;
use App\Classes\Crud;
use App\Http\Controllers\Controller;
use App\Models\LanguageLevel;
use App\Models\Languages;
use App\Models\LanguagesUser;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguagesController extends Controller
{
    //
    function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $userLanguages = LanguagesUser::where("user_id", Auth::id())
            ->join("languages", "languages.id", "=", "languages_users.languages_id")
            ->join("language_levels", "language_levels.id", "=", "languages_users.language_level_id")
            ->get(["languages_users.id", "languages_users.user_id", "languages.name", "languages.id AS lang_id", "language_levels.id AS level_id",  "language_levels.CEFR", "language_levels.cambridge"]);

        $languages = Languages::all();
        $levels = LanguageLevel::all();

        return view("portal.languages", [
            "userLanguages"=>$userLanguages,
            "languagesInfo"=>[
                "languages"=>$languages,
                "levels"=>$levels
            ]
        ]);
    }

}
