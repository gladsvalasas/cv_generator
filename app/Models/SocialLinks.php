<?php

namespace App\Models;

use App\Interfaces\IVerificationModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLinks extends Model implements IVerificationModel
{
    use HasFactory;

    public static function getValidatorTemplate()
    {
        return [
            "name"=>["require", "string"],
            "link"=>["require", "string"]
        ];
    }
}
