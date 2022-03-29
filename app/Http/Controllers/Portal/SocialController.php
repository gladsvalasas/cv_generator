<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

use App\Models\SocialLinks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    //
    public function index()
    {
        $links = SocialLinks::where("user_id", Auth::id())
            ->get();
        return view("portal.social", ["links"=>$links]);
    }
}
