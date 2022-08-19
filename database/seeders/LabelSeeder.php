<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'name' => 'Robert Fripp', 'description' => NULL],
            ['id' => '2', 'created_at' => Carbon::now(), 'name' => 'Nuclear Blast', 'description' => NULL],
            ['id' => '3', 'created_at' => Carbon::now(), 'name' => 'Volcano', 'description' => NULL],
            ['id' => '4', 'created_at' => Carbon::now(), 'name' => 'EMI', 'description' => NULL],
            ['id' => '5', 'created_at' => Carbon::now(), 'name' => 'Rhino', 'description' => NULL],
            ['id' => '6', 'created_at' => Carbon::now(), 'name' => 'Back to Black', 'description' => NULL],
            ['id' => '7', 'created_at' => Carbon::now(), 'name' => 'BRAIN Metronome', 'description' => NULL],
            ['id' => '8', 'created_at' => Carbon::now(), 'name' => 'BLUE HORIZON', 'description' => NULL],
            ['id' => '9', 'created_at' => Carbon::now(), 'name' => 'Vertigo Swirl', 'description' => NULL],
            ['id' => '10', 'created_at' => Carbon::now(), 'name' => 'Columbia', 'description' => NULL],
        ]);
    }
}
