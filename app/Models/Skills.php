<?php

namespace App\Models;

use App\Interfaces\IVerificationModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model implements IVerificationModel
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
        "level",
        "user_id"
    ];

    public static function getValidatorTemplate()
    {
        return [
            "name"=>["required", "string"],
            "level"=>["required", "integer"]
        ];
    }
}
