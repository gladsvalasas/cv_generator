<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("nativeName");
            $table->string("code");
        });

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
