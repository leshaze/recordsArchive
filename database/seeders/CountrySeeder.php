<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'name' => 'EEC'],
            ['id' => '2', 'created_at' => Carbon::now(), 'name' => 'GERMANY'],
            ['id' => '3', 'created_at' => Carbon::now(), 'name' => 'USA'],
            ['id' => '4', 'created_at' => Carbon::now(), 'name' => 'UK'],
            ['id' => '5', 'created_at' => Carbon::now(), 'name' => 'Germany'],
            ['id' => '6', 'created_at' => Carbon::now(), 'name' => 'Austria'],
            ['id' => '7', 'created_at' => Carbon::now(), 'name' => 'DE'],
            ['id' => '8', 'created_at' => Carbon::now(), 'name' => 'EU'],
            ['id' => '9', 'created_at' => Carbon::now(), 'name' => 'Holland'],
        ]);
    }
}
