<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Permissions extends Migration
{
    public function up()
    {
        Schema::create("permissions", function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->string("name_permission")->nullable(false);
            $table->integer("code")->nullable(false);
        });

        DB::table("permissions")
            ->insert([
                [
                    "name_permission" => "User",
                    "code" => 001
                ],
                [
                    "name_permission" => "Moderator",
                    "code" => 101
                ],
                [
                    "name_permission" => "Administrator",
                    "code" => 301
                ]
            ]);
    }

    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
