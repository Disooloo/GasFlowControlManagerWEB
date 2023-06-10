<?php

use App\Http\Controllers\GasProcessController;
use Illuminate\Support\Facades\Route;

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


Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    // code
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Route::get('/monitoring', [App\Http\Controllers\GasProcessController::class, 'index'])->name('monitoring');

    Route::resource('/monitoring', GasProcessController::class);
    Route::group(['middleware' => ['is_admin']], function () {
        // code
    });
});


