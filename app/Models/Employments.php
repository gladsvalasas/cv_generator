<?php

namespace App\Models;

use App\Interfaces\IVerificationModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employments extends Model implements IVerificationModel
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "name",
        "position",
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
            "position"=>["required", "string"],
            "start_at"=>["required", "date"],
            "ended"=>["nullable", "date"],
            "country"=>["required", "string"],
            "city"=>["required", "string"],
        ];
    }
}
