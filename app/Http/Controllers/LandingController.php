<?php

namespace App\Http\Controllers;

use App\Classes\Constants;
use App\Models\Landing\PortfolioProjects;
use App\Models\Landing\TechStack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Valuestore\Valuestore;

class LandingController extends Controller
{
    function index()
    {
        $mainSettings = Valuestore::make(Storage::path("public/").Constants::LANDING_BASE_CONFIG_PATH)
            ->all();

        $stack = TechStack::all()
            ->take(10);

        $projects = PortfolioProjects::all()
            ->take(5);

        return view("landing", ["settings"=>$mainSettings, "techStack"=>$stack, "projects"=>$projects]);
    }

}
