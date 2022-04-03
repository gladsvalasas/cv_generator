<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view("portal.employment", ["countries"=>Countries::all()]);
    }
}
