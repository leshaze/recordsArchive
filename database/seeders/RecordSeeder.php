<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'kind' => 'CD', 'artist_id' => '1', 'title' => 'Name 1', 'label_id' => '1', 'country_id' => '1', 'platform_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '50', 'grading_cover' => '90', 'current_price' => '250', 'buy_price' => '25' ],
            ['id' => '2', 'created_at' => Carbon::now(), 'kind' => 'LP', 'artist_id' => '2', 'title' => 'Name 2', 'label_id' => '3', 'country_id' => '2', 'platform_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '80', 'current_price' => '20', 'buy_price' => '20' ],
            ['id' => '3', 'created_at' => Carbon::now(), 'kind' => 'CD', 'artist_id' => '3', 'title' => 'Name 3', 'label_id' => '4', 'country_id' => '2', 'platform_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '90', 'current_price' => '140', 'buy_price' => '80' ],
            ['id' => '4', 'created_at' => Carbon::now(), 'kind' => 'CD', 'artist_id' => '4', 'title' => 'Name 4', 'label_id' => '4', 'country_id' => '4', 'platform_id' => '2', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '90', 'current_price' => '140', 'buy_price' => '80' ],
            ['id' => '5', 'created_at' => Carbon::now(), 'kind' => 'LP', 'artist_id' => '6', 'title' => 'Name 5', 'label_id' => '5', 'country_id' => '4', 'platform_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '50', 'grading_cover' => '60', 'current_price' => '90', 'buy_price' => '120' ],
            ['id' => '6', 'created_at' => Carbon::now(), 'kind' => 'LP', 'artist_id' => '7', 'title' => 'Name 6', 'label_id' => '3', 'country_id' => '3', 'platform_id' => '3', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '90', 'grading_cover' => '90', 'current_price' => '50', 'buy_price' => '70' ],
            ['id' => '7', 'created_at' => Carbon::now(), 'kind' => 'LP', 'artist_id' => '8', 'title' => 'Name 7', 'label_id' => '2', 'country_id' => '2', 'platform_id' => '3', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '100', 'grading_cover' => '100', 'current_price' => '20', 'buy_price' => '6' ],
            ['id' => '8', 'created_at' => Carbon::now(), 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 8', 'label_id' => '1', 'country_id' => '1', 'platform_id' => '3', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '9', 'created_at' => Carbon::now(), 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 9', 'label_id' => '1', 'country_id' => '1', 'platform_id' => '2', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '10', 'created_at' => Carbon::now(), 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 10', 'label_id' => '1', 'country_id' => '1', 'platform_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '11', 'created_at' => Carbon::now(), 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 11', 'label_id' => '1', 'country_id' => '1', 'platform_id' => '2', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '12', 'created_at' => Carbon::now(), 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 12', 'label_id' => '1', 'country_id' => '1', 'platform_id' => '2', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '13', 'created_at' => Carbon::now(), 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 13', 'label_id' => '1', 'country_id' => '1', 'platform_id' => '2', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '14', 'created_at' => Carbon::now(), 'kind' => 'LP', 'artist_id' => '2', 'title' => 'Name 14', 'label_id' => '2', 'country_id' => '4', 'platform_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '80', 'grading_cover' => '90', 'current_price' => '400', 'buy_price' => '50' ],
         ]);
    }
}