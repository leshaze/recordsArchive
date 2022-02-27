<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            ['id' => '1', 'name' => 'Testuser', 'role_id' => '1', 'username' => 'Test', 'email' => Str::random(10).'@test', 'password' => Hash::make('password'), 'created_at' => Carbon::now() ],
            ['id' => '2', 'name' => 'Testuser 2', 'role_id' => '1','username' => 'Test2', 'email' => Str::random(10).'@test', 'password' => Hash::make('password'), 'created_at' => Carbon::now() ],
            ['id' => '3', 'name' => 'Testuser 3', 'role_id' => '1','username' => 'Test3', 'email' => Str::random(10).'@test', 'password' => Hash::make('password'), 'created_at' => Carbon::now() ],
            ['id' => '4', 'name' => 'Testuser 4', 'role_id' => '1','username' => 'Test4', 'email' => Str::random(10).'@test', 'password' => Hash::make('password'), 'created_at' => Carbon::now() ],
        ]);

        DB::table('roles')->insert([
            ['id' => '1', 'name'=> 'admin'],
            ['id' => '2', 'name' => 'user']
        ]);

        DB::table('artists')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'name' => 'Artist 1', 'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.' ],
            ['id' => '2', 'created_at' => Carbon::now(), 'name' => 'Artist 2', 'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.' ],
            ['id' => '3', 'created_at' => Carbon::now(), 'name' => 'Artist 3', 'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.' ],
            ['id' => '4', 'created_at' => Carbon::now(), 'name' => 'Artist 4', 'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.' ],
            ['id' => '5', 'created_at' => Carbon::now(), 'name' => 'Artist 5', 'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.' ],
            ['id' => '6', 'created_at' => Carbon::now(), 'name' => 'Artist 6', 'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.' ],
            ['id' => '7', 'created_at' => Carbon::now(), 'name' => 'Artist 7', 'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.' ],
            ['id' => '8', 'created_at' => Carbon::now(), 'name' => 'Artist 8', 'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.' ],
            ['id' => '9', 'created_at' => Carbon::now(), 'name' => 'Artist 9', 'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.' ],
        ]);  

        DB::table('labels')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'name' => 'Label 1', 'description' => 'Lorem, ipsum'],
            ['id' => '2', 'created_at' => Carbon::now(), 'name' => 'Label 2', 'description' => 'Lorem, ipsum'],
            ['id' => '3', 'created_at' => Carbon::now(), 'name' => 'Label 3', 'description' => 'Lorem, ipsum'],
            ['id' => '4', 'created_at' => Carbon::now(), 'name' => 'Label 4', 'description' => 'Lorem, ipsum'],
            ['id' => '5', 'created_at' => Carbon::now(), 'name' => 'Label 5', 'description' => 'Lorem, ipsum'],
            ['id' => '6', 'created_at' => Carbon::now(), 'name' => 'Label 6', 'description' => 'Lorem, ipsum'],
            ['id' => '7', 'created_at' => Carbon::now(), 'name' => 'Label 7', 'description' => 'Lorem, ipsum'],
        ]);

        DB::table('countries')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'name' => 'DE'],
            ['id' => '2', 'created_at' => Carbon::now(), 'name' => 'GB'],
            ['id' => '3', 'created_at' => Carbon::now(), 'name' => 'FR'],
            ['id' => '4', 'created_at' => Carbon::now(), 'name' => 'US'],
        ]);

        DB::table('records')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '1', 'title' => 'Name 1', 'label_id' => '1', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '50', 'grading_cover' => '90', 'current_price' => '250', 'buy_price' => '25' ],
            ['id' => '2', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '1', 'title' => 'Name 2', 'label_id' => '3', 'country_id' => '2', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '80', 'current_price' => '20', 'buy_price' => '20' ],
            ['id' => '3', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '3', 'title' => 'Name 3', 'label_id' => '4', 'country_id' => '2', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '90', 'current_price' => '140', 'buy_price' => '80' ],
            ['id' => '4', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '4', 'title' => 'Name 4', 'label_id' => '4', 'country_id' => '4', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '90', 'current_price' => '140', 'buy_price' => '80' ],
            ['id' => '5', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '1', 'title' => 'Name 5', 'label_id' => '5', 'country_id' => '4', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '50', 'grading_cover' => '60', 'current_price' => '90', 'buy_price' => '120' ],
            ['id' => '6', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'CD', 'artist_id' => '5', 'title' => 'Name 6', 'label_id' => '3', 'country_id' => '3', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '90', 'grading_cover' => '90', 'current_price' => '50', 'buy_price' => '70' ],
            ['id' => '7', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'CD', 'artist_id' => '6', 'title' => 'Name 7', 'label_id' => '2', 'country_id' => '2', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '100', 'grading_cover' => '100', 'current_price' => '20', 'buy_price' => '6' ],
            ['id' => '8', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '1', 'title' => 'Name 8', 'label_id' => '1', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '9', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '2', 'title' => 'Name 9', 'label_id' => '2', 'country_id' => '4', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '80', 'grading_cover' => '90', 'current_price' => '400', 'buy_price' => '50' ],
            ['id' => '10', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '4', 'title' => 'Name 10', 'label_id' => '7', 'country_id' => '4', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '90', 'grading_cover' => '90', 'current_price' => '12', 'buy_price' => '23' ],
            ['id' => '11', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '5', 'title' => 'Name 11', 'label_id' => '6', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '40', 'current_price' => '34', 'buy_price' => '29' ],
            ['id' => '12', 'created_at' => Carbon::now(), 'user_id' => '2', 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 12', 'label_id' => '6', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '40', 'current_price' => '34', 'buy_price' => '29' ],
            ['id' => '13', 'created_at' => Carbon::now(), 'user_id' => '3', 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 12', 'label_id' => '6', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '40', 'current_price' => '34', 'buy_price' => '29' ],
            ['id' => '14', 'created_at' => Carbon::now(), 'user_id' => '2', 'kind' => 'LP', 'artist_id' => '5', 'title' => 'Name 13', 'label_id' => '6', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '40', 'current_price' => '34', 'buy_price' => '29' ],
        ]);
    }
}
