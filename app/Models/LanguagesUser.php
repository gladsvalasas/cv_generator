<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguagesUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "languages_id",
        "language_level_id",
        "user_id"
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Languages::class);
    }

    public function level(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LanguageLevel::class);
    }
}
