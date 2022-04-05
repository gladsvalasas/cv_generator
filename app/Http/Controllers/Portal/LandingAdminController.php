<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingAdminController extends Controller
{
    function index()
    {
        return view("portal.landingAdmin");
    }

}
