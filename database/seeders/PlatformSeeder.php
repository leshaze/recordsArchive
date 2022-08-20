<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platforms')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'name' => 'Discogs', 'url' => 'www.discogs.com'],
            ['id' => '2', 'created_at' => Carbon::now(), 'name' => 'ebay', 'url' => NULL],
            ['id' => '3', 'created_at' => Carbon::now(), 'name' => 'ebay Kleinanzeigen', 'url' => NULL],
            ['id' => '4', 'created_at' => Carbon::now(), 'name' => 'amazon', 'url' => NULL],
        ]);
    }
}
