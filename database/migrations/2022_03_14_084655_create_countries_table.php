<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        $countries = Http::get("https://restcountries.com/v3.1/all")
            ->json();

        $countriesList = [];
        foreach ($countries as $country) {
            $countriesList[] = ["name"=>$country["name"]["common"]];
        }
        array_multisort($countriesList);

        DB::table("countries")
            ->insert($countriesList);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
