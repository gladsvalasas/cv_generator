<?php

namespace App\Http\Controllers;

use App\Classes\Constants;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillsController extends Controller
{
    //
    function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $skills = [];
        $skillsList = Skills::where("user_id", Auth::id())
            ->get();

        foreach ($skillsList as $skill) {
            $skills[] = [
                "id"=>$skill->id,
                "name"=>$skill->name,
                "level"=>$skill->level,
                "className"=>Constants::SKILLS_LEVEL_CLASSES[$skill->level-1]
            ];
        }

        return view("portal.skills", ["skillsList"=>$skills]);
    }
}
