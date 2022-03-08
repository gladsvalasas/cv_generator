<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Companies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("companies", function (Blueprint $table){
            $table->id()->autoIncrement();
            $table->string("fullname");
            $table->string("logo_path")->nullable();
            $table->integer("isHidden")->default(0);
        });

        \Illuminate\Support\Facades\DB::table("companies")
            ->insert([
                "fullname"=>"Medialine",
                "logo_path"=>"logo_WY95Y8vO.png"
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
