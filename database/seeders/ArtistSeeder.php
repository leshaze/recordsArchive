<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'name' => 'King Crimson', 'description' => NULL],
            ['id' => '2', 'created_at' => Carbon::now(), 'name' => 'Sabaton', 'description' => NULL],
            ['id' => '3', 'created_at' => Carbon::now(), 'name' => 'Gov`t Mule', 'description' => NULL],
            ['id' => '4', 'created_at' => Carbon::now(), 'name' => 'KRAFTWERK', 'description' => NULL],
            ['id' => '5', 'created_at' => Carbon::now(), 'name' => 'The DOORS', 'description' => NULL],
            ['id' => '6', 'created_at' => Carbon::now(), 'name' => 'The ROLLING STONES', 'description' => NULL],
            ['id' => '7', 'created_at' => Carbon::now(), 'name' => 'SCORPIONS', 'description' => NULL],
            ['id' => '8', 'created_at' => Carbon::now(), 'name' => 'Chicken Shack', 'description' => NULL],
            ['id' => '9', 'created_at' => Carbon::now(), 'name' => 'FREEDOM', 'description' => NULL],
            ['id' => '10', 'created_at' => Carbon::now(), 'name' => 'BOB DYLAN', 'description' => NULL],
            ['id' => '11', 'created_at' => Carbon::now(), 'name' => 'Roger Chapman & The Shortlist', 'description' => NULL],
        ]);  

    }
}
