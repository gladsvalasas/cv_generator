<?php

namespace App\Models\Landing;

use App\Interfaces\IVerificationModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechStack extends Model implements IVerificationModel
{
    use HasFactory;

    protected $fillable = [
        "tech_link",
        "logotype_path"
    ];

    public static function getValidatorTemplate()
    {
        return [
            "tech_link"=>["nullable", "string"],
            "logotype_path"=>["required"]
        ];
    }
}
