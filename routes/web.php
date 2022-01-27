<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// /* Routes for records */
// Route::get('/records', [RecordController::class, 'index'])->name('records');

// Route::get('/records/create', [RecordController::class, 'create'])->name('record.create');
// Route::post('/records/create', [RecordController::class, 'store'])->name('record.store');

// Route::get('/records/{id}',[RecordController::class, 'show'])->name('record.details');
// Route::get('/records/{id}/edit',[RecordController::class, 'edit'])->name('record.edit');
// Route::get('/record/{id}/delete',[RecordController::class, 'destroy'])->name('record.destroy');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('dashboard', DashboardController::class);
Route::resource('artists', ArtistController::class);
Route::resource('records', RecordController::class);
Route::resource('login', LoginController::class);
Route::resource('logout', LogoutController::class);
Route::resource('labels', LabelController::class);
Route::resource('register', RegisterController::class);

// /* Routes for labels */
// Route::get('/label/{id}',[LabelController::class, 'show'])->name('label.show');

// /* Routes for user */
// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'store']);

// Route::post('/logout', [LogoutController::class, 'store'])->name('logout');







// 
// Route::get('/record', 'RecordController@index')->name('record.index');
// //Route::get('/records/{id}','RecordController@show')->name('record.show');

// Route::get('/record/create','RecordController@create')->name('record.create');
// Route::post('/record/create','RecordController@store')->name('record.store');
// Route::post('/record/update','RecordController@update')->name('record.update');
// Route::get('/record/api/artist','RecordController@getAutocompleteArtist'); 
// Route::get('/record/api/label','RecordController@getAutocompleteLabel'); 
// Route::get('/record/api/country','RecordController@getAutocompleteCountry'); 
// Route::get('/record/api/title','RecordController@getAutocompleteTitle'); 
// Route::get('/record/api/search','RecordController@getAutocompleteSearch'); 
// Route::get('/record/search','RecordController@Search'); 

// 
// Route::get('/artist', 'ArtistController@index')->name('artist.index');
// Route::get('/artist/create','ArtistController@create')->name('artist.create');
// Route::post('/artist/create','ArtistController@store')->name('artist.store');
// Route::post('/artist/update','ArtistController@update')->name('artist.update');
// Route::get('/artist/{id}','ArtistController@show')->name('artist.show');
// Route::get('/artist/{id}/edit','ArtistController@edit')->name('artist.edit');
// Route::get('/artist/{id}/delete','ArtistController@destroy')->name('artist.destroy');
// Route::get('/artist/{id}/print','ArtistController@print')->name('artist.print');

// 
// Route::get('/label', 'LabelController@index')->name('label.index');
// Route::get('/label/create','LabelController@create')->name('label.create');
// Route::post('/label/create','LabelController@store')->name('label.store');
// Route::post('/label/update','LabelController@update')->name('label.update');
// Route::get('/label/{id}','LabelController@show')->name('label.show');
// Route::get('/label/{id}/edit','LabelController@edit')->name('label.edit');
// Route::get('/label/{id}','LabelController@show')->name('label.show');
// Route::get('/label/{id}/delete','LabelController@destroy')->name('label.destroy');
// Route::get('/label/{id}/print','LabelController@print')->name('label.print');