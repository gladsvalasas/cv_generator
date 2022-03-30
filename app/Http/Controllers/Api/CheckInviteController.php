<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckInviteController extends Controller
{
    //

    function get(Request $request)
    {
        $code = $request->get("code");
        $id = $request->get("company_id");
        $count = DB::table("invites")
            ->where("code", "=", $code)
            ->where("company_id", "=", $id)
            ->where("isActive", "=", "1")
            ->count("*");

        if ($count == 0) {
            return \response()->json(["success"=>false, "error"=>["message"=>"This code has already taken"]]);
        }

        return \response()->json(["success"=>true, "data"=>["message"=>""]]);
    }

    function add(Request $request)
    {
        if (!Auth::check()) {
            return \response()->json(["success"=>false, "error"=>["message"=>"You not autorized"]]);
        }
    }
}
