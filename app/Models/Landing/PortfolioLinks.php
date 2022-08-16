<?php

namespace App\Models\Landing;

use App\Interfaces\IVerificationModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioLinks extends Model implements IVerificationModel
{
    use HasFactory;

    protected $fillable = [
        "link",
        "link_name"
    ];


    public static function getValidatorTemplate()
    {
        return [
            "link" => ["required", "string"],
            "link_name" => ["required", "string"],
        ];
    }
}
