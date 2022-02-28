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
            ['id' => '1', 'created_at' => Carbon::now(), 'name' => 'King Crimson', 'description' => 'NULL'],
            ['id' => '2', 'created_at' => Carbon::now(), 'name' => 'Sabaton', 'description' => 'NULL'],
            ['id' => '3', 'created_at' => Carbon::now(), 'name' => 'Gov`t Mule', 'description' => 'NULL'],
            ['id' => '4', 'created_at' => Carbon::now(), 'name' => 'KRAFTWERK', 'description' => 'NULL'],
            ['id' => '5', 'created_at' => Carbon::now(), 'name' => 'The DOORS', 'description' => 'NULL'],
            ['id' => '6', 'created_at' => Carbon::now(), 'name' => 'The ROLLING STONES', 'description' => 'NULL'],
            ['id' => '7', 'created_at' => Carbon::now(), 'name' => 'SCORPIONS', 'description' => 'NULL'],
            ['id' => '8', 'created_at' => Carbon::now(), 'name' => 'Chicken Shack', 'description' => 'NULL'],
            ['id' => '9', 'created_at' => Carbon::now(), 'name' => 'FREEDOM', 'description' => 'NULL'],
            ['id' => '10', 'created_at' => Carbon::now(), 'name' => 'BOB DYLAN', 'description' => 'NULL'],
            ['id' => '11', 'created_at' => Carbon::now(), 'name' => 'Roger Chapman & The Shortlist', 'description' => 'NULL'],
        ]);  

        DB::table('labels')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'name' => 'Robert Fripp', 'description' => 'NULL'],
            ['id' => '2', 'created_at' => Carbon::now(), 'name' => 'Nuclear Blast', 'description' => 'NULL'],
            ['id' => '3', 'created_at' => Carbon::now(), 'name' => 'Volcano', 'description' => 'NULL'],
            ['id' => '4', 'created_at' => Carbon::now(), 'name' => 'EMI', 'description' => 'NULL'],
            ['id' => '5', 'created_at' => Carbon::now(), 'name' => 'Rhino', 'description' => 'NULL'],
            ['id' => '6', 'created_at' => Carbon::now(), 'name' => 'Back to Black', 'description' => 'NULL'],
            ['id' => '7', 'created_at' => Carbon::now(), 'name' => 'BRAIN Metronome', 'description' => 'NULL'],
            ['id' => '8', 'created_at' => Carbon::now(), 'name' => 'BLUE HORIZON', 'description' => 'NULL'],
            ['id' => '9', 'created_at' => Carbon::now(), 'name' => 'Vertigo Swirl', 'description' => 'NULL'],
            ['id' => '10', 'created_at' => Carbon::now(), 'name' => 'Columbia', 'description' => 'NULL'],
        ]);

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

        DB::table('records')->insert([
            ['id' => '1', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'CD', 'artist_id' => '1', 'title' => 'Name 1', 'label_id' => '1', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '50', 'grading_cover' => '90', 'current_price' => '250', 'buy_price' => '25' ],
            ['id' => '2', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '2', 'title' => 'Name 2', 'label_id' => '3', 'country_id' => '2', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '80', 'current_price' => '20', 'buy_price' => '20' ],
            ['id' => '3', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'CD', 'artist_id' => '3', 'title' => 'Name 3', 'label_id' => '4', 'country_id' => '2', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '90', 'current_price' => '140', 'buy_price' => '80' ],
            ['id' => '4', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'CD', 'artist_id' => '4', 'title' => 'Name 4', 'label_id' => '4', 'country_id' => '4', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '70', 'grading_cover' => '90', 'current_price' => '140', 'buy_price' => '80' ],
            ['id' => '5', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '6', 'title' => 'Name 5', 'label_id' => '5', 'country_id' => '4', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '50', 'grading_cover' => '60', 'current_price' => '90', 'buy_price' => '120' ],
            ['id' => '6', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '7', 'title' => 'Name 6', 'label_id' => '3', 'country_id' => '3', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '90', 'grading_cover' => '90', 'current_price' => '50', 'buy_price' => '70' ],
            ['id' => '7', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '8', 'title' => 'Name 7', 'label_id' => '2', 'country_id' => '2', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '100', 'grading_cover' => '100', 'current_price' => '20', 'buy_price' => '6' ],
            ['id' => '8', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 8', 'label_id' => '1', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '9', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 8', 'label_id' => '1', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '10', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 8', 'label_id' => '1', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '11', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 8', 'label_id' => '1', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '12', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 8', 'label_id' => '1', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '13', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '9', 'title' => 'Name 8', 'label_id' => '1', 'country_id' => '1', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '20', 'grading_cover' => '50', 'current_price' => '40', 'buy_price' => '20' ],
            ['id' => '14', 'created_at' => Carbon::now(), 'user_id' => '1', 'kind' => 'LP', 'artist_id' => '2', 'title' => 'Name 9', 'label_id' => '2', 'country_id' => '4', 'catalog_number' => Str::random(10), 'matrix_number' => Str::random(8), 'barcode' => Str::random(8), 'grading_media' => '80', 'grading_cover' => '90', 'current_price' => '400', 'buy_price' => '50' ],
         ]);
    }
}
