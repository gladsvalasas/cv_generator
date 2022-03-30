<?php


namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BadgeGeneratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $userId = Auth::id();
//        print_r(User::where("id", $userId)->first());
        $currentUser = User::getUser($userId);

        $mainUserPath = "/".$currentUser["id"]."/badges/";
        $pathUserBadge = Storage::path("public/pictures").$mainUserPath;
        $badgeFile = "BADGE.png";

        //$badgeUrl = "";
        if (!File::exists($pathUserBadge.$badgeFile)) {
            $badgeImage = Image::make(Storage::path("public")."/badge_template.png");

            $avaImage = Image::make($pathUserBadge.$currentUser["photo_path"]);
            $avaImage->heighten(270);

            $companyImage = Image::make(Storage::path("public/companies")."/".$currentUser["company"]["id"]."/".$currentUser["company"]["logo_path"]);
            $companyImage->heighten(64);

            $badgeImage->insert($companyImage, "top", 0, 17);
            $badgeImage->insert($avaImage, "center", 0, -200);

            $badgeImage->text(mb_strtoupper($currentUser["name"]." ".$currentUser["surname"]), 301, 460, function ($font) {
                $font->file(Storage::path("public/fonts")."/bebra/BebasNeueCyrillic.ttf");
                $font->size(65);
                $font->align("center");
                $font->valign("center");
                $font->color("#383838");
            });

            $badgeImage->text(mb_strtoupper($currentUser["position"]), 301, 825, function ($font){
                $font->file(Storage::path("public/fonts")."/bebra/BebasNeueCyrillic.ttf");
                $font->size(55);
                $font->align("center");
                $font->valign("center");
                $font->color("#ffffff");
            });

            $badgeImage->text(mb_strtoupper($currentUser["company"]["fullname"]), 301, 904, function ($font){
                $font->file(Storage::path("public/fonts")."/bebra/BebasNeueCyrillic.ttf");
                $font->size(30);
                $font->align("center");
                $font->valign("center");
                $font->color("#ffffff");
            });

            $badgeImage->save($pathUserBadge.$badgeFile);

        }

        $badgeUrl = $mainUserPath.$badgeFile;

        return view("portal.badgegenerator", ["user"=>$currentUser, "badgeUrl"=>"storage/pictures".$badgeUrl]);
    }
}
