<?php

namespace App\Models\Landing;

use App\Interfaces\IVerificationModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioProjects extends Model implements IVerificationModel{
    use HasFactory;

    public static function getValidatorTemplate()
    {
        return [

        ];
    }
}
