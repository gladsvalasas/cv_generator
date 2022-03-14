<?php

namespace App\Http\Controllers;

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
        return view("portal.employment");
    }
}
