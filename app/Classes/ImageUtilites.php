<?php


namespace App\Classes;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageUtilites
{
    static function createAvatars($path, $fileName)
    {
        $mainImage = Image::make($path["main"].$fileName);
        $badgeImage = $mainImage;
        $mainImage->widen(700);
        $mainImage->save();

        $badgeImage->resize(1000, 1000);
        $badgeImage->save($path["sub"].$fileName);
    }
}
