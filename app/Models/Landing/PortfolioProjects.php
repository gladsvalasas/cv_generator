<?php

namespace App\Models\Landing;

use App\Interfaces\IVerificationModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioProjects extends Model implements IVerificationModel{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "link",
        "preview_path"
    ];

    public static function getValidatorTemplate()
    {
        return [
            "name" => ["required", "string"],
            "description" => ["nullable", "string"],
            "link" => ["nullable", "string"],
            "preview_path" => ["required", "file", "image"]
        ];
    }
}
