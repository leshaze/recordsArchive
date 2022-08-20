<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PriceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('price_history')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'price' => '20', 'platform_id' => '1', 'record_id' => '1'],
            ['id' => '2', 'created_at' => Carbon::now(), 'price' => '24', 'platform_id' => '1', 'record_id' => '1'],
            ['id' => '3', 'created_at' => Carbon::now(), 'price' => '26', 'platform_id' => '1', 'record_id' => '1'],
            ['id' => '4', 'created_at' => Carbon::now(), 'price' => '18', 'platform_id' => '1', 'record_id' => '1'],
            ['id' => '5', 'created_at' => Carbon::now(), 'price' => '20', 'platform_id' => '1', 'record_id' => '3'],
            ['id' => '6', 'created_at' => Carbon::now(), 'price' => '24', 'platform_id' => '1', 'record_id' => '3'],
            ['id' => '7', 'created_at' => Carbon::now(), 'price' => '26', 'platform_id' => '1', 'record_id' => '3'],
            ['id' => '8', 'created_at' => Carbon::now(), 'price' => '18', 'platform_id' => '1', 'record_id' => '3'],
            ['id' => '9', 'created_at' => Carbon::now(), 'price' => '20', 'platform_id' => '2', 'record_id' => '2'],
            ['id' => '10', 'created_at' => Carbon::now(), 'price' => '24', 'platform_id' => '3', 'record_id' => '2'],
            ['id' => '11', 'created_at' => Carbon::now(), 'price' => '26', 'platform_id' => '1', 'record_id' => '2'],
            ['id' => '12', 'created_at' => Carbon::now(), 'price' => '18', 'platform_id' => '1', 'record_id' => '2'],
        ]);
    }
}
