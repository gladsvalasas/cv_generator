<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

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
        return view("portal.skills");
    }
}
