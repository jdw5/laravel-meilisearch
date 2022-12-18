<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "id" => 1,
            "name" => "Name",
            "email" => "test@example.com",
            "email_verified_at" => null,
            "password" => "$2y$10$4pFHTLi.PFTSMu.gHwpKieSkofZQUI0JWaFM1pG1Lhqj/iIy2JWW2",
            "remember_token" => null
        ]);

        DB::table('users')->insert([
            "id" => 2,
            "name" => "Name 2",
            "email" => "example@example.com",
            "email_verified_at" => null,
            "password" => "$2y$10$4pFHTLi.PFTSMu.gHwpKieSkofZQUI0JWaFM1pG1Lhqj/iIy2JWW2",
            "remember_token" => null
        ]);
    }
}
