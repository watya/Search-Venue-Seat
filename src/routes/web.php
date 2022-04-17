<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VenueController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [VenueController::class, 'index'])->name('venue.index');
Route::get('venue/pia', [VenueController::class, 'pia'])->name('venue.pia');
Route::get('venue/yokohama', [VenueController::class, 'yokohama'])->name('venue.yokohama');

