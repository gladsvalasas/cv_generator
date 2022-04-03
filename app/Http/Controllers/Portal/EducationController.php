<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $countries = Countries::all();
        return view("portal.education", ["countries"=>$countries]);
    }
}
