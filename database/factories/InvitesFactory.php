<?php

namespace Database\Factories;

use App\Models\Invites;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InvitesFactory extends Factory
{

    protected $model = Invites::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "code" => Str::random(10),
            "company_id"=>1
        ];
    }
}
