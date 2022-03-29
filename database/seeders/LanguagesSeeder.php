<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = Http::get("https://gist.githubusercontent.com/piraveen/fafd0d984b2236e809d03a0e306c8a4d/raw/4258894f85de7752b78537a4aa66e027090c27ad/languages.json")
            ->json();
        $languagesList = [];

        foreach ($languages as $code=>$lang) {
            $languagesList[] = [
                "name"=>$lang["name"],
                "nativeName"=>$lang["nativeName"],
                "code"=>$code,
            ];
        }

        DB::table("languages")
            ->insert($languagesList);
    }
}
