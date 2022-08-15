<?php

namespace App\Http\Controllers\Portal;

use App\Classes\Constants;
use App\Http\Controllers\Controller;
use App\Models\Landing\TechStack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Valuestore\Valuestore;

class LandingAdminController extends Controller
{
    function index()
    {
        $config = Valuestore::make(Storage::path("public/").Constants::LANDING_BASE_CONFIG_PATH)
            ->all();

        $stackElements = TechStack::all()
            ->take(10);

        return view("portal.landingAdmin", ["config"=>$config,"stackElements"=>$stackElements]);
    }

}
