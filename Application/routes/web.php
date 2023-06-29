<?php

use App\Http\Controllers\GasProcessController;
use App\Http\Controllers\MonitoringController;
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/monitoring', GasProcessController::class);
    Route::post('/update-monitoring-values', [MonitoringController::class, 'updateMonitoringValues'])->name('update-monitoring-values');
});




//Route::get('/moders-user', function () {
//    return "11";
//})->name('moders-user');
