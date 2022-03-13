<?php


namespace App\Classes;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FileUtilites
{
    static function createDirIfNotExist($path)
    {
        if (!File::isDirectory($path)) {
            File::makeDirectory($path);
        }
    }
}
