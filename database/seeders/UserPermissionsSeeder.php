<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
}
