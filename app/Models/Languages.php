<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    use HasFactory;

    public function language(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(LanguagesUser::class);
    }
}
