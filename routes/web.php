<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PlatformController;
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



Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/records/api/',[SearchController::class, 'getAutocomplete'])->name('autocomplete');
Route::get('/record/{id}/delete',[RecordController::class, 'destroy'])->name('record.destroy');
Route::get('/labels/{label}/print',[LabelController::class, 'print'])->name('labels.print');
Route::get('/artists/{artist}/print',[ArtistController::class, 'print'])->name('artists.print');

Route::resource('dashboard', DashboardController::class);
Route::resource('artists', ArtistController::class);
Route::resource('records', RecordController::class);
Route::resource('platforms', PlatformController::class);
//Route::resource('login', LoginController::class);
//Route::resource('logout', LogoutController::class)->middleware('auth');
Route::resource('labels', LabelController::class);
Route::resource('images', ImageController::class);
#Route::resource('register', RegisterController::class);

//Route::get('/record/search','RecordController@Search'); 