<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('language_levels')
            ->insert([
                [
                    "CEFR"=>"A1",
                    "cambridge"=>"Beginner"
                ],
                [
                    "CEFR"=>"A1+",
                    "cambridge"=>"Elementary"
                ],
                [
                    "CEFR"=>"A2",
                    "cambridge"=>"Pre Intermediate"
                ],
                [
                    "CEFR"=>"B1",
                    "cambridge"=>"Intermediate"
                ],
                [
                    "CEFR"=>"B2",
                    "cambridge"=>"Upper Intermediate"
                ],
                [
                    "CEFR"=>"C1",
                    "cambridge"=>"Advanced"
                ],
                [
                    "CEFR"=>"C2",
                    "cambridge"=>"Proficiency"
                ],
                [
                    "CEFR"=>"",
                    "cambridge"=>"Native Speaker"
                ]
            ]);
    }
}
