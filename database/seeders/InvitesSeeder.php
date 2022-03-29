<?php

namespace Database\Seeders;

use App\Models\Invites;
use Illuminate\Database\Seeder;

class InvitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invites::factory()
            ->count(20)
            ->create();
    }
}
