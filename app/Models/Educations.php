<?php

namespace App\Models;

use App\Interfaces\IVerificationModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educations extends Model implements IVerificationModel
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
        "speciality",
        "start_at",
        "ended",
        "country",
        "city",
        "user_id"
    ];

    public static function getValidatorTemplate()
    {
        return [
            "name"=>["required", "string"],
            "speciality"=>["required", "string"],
            "start_at"=>["required", "date"],
            "ended"=>["nullable", "date"],
            "country"=>["required", "string"],
            "city"=>["required", "string"]
        ];
    }
}
