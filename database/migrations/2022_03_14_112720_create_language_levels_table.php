<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_levels', function (Blueprint $table) {
            $table->id();
            $table->string("CEFR")->nullable();
            $table->string("cambridge")->nullable();
        });

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_levels');
    }
}
