<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = Http::get("https://restcountries.com/v3.1/all")
            ->json();

        $countriesList = [];
        foreach ($countries as $country) {
            $countriesList[] = [
                "name"=>$country["name"]["common"],
                "code"=>$country["cca2"],
                "official_name"=>$country["name"]["official"],
                "flag_url"=>$country["flags"]["svg"]
            ];
        }
        array_multisort($countriesList);

        DB::table("countries")
            ->insert($countriesList);
    }
}
