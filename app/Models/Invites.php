<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invites extends Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "company_id"
    ];

    public $timestamps = false;
}
