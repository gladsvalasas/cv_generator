<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table("companies")
            ->insert([
                "fullname"=>"Medialine",
                "logo_path"=>"logo_WY95Y8vO.png"
            ]);
    }
}
