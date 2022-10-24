<?php

use App\Http\Controllers\ChartJsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/grafici', function () {
    return view('grafici');
});
Route::get('/form', function () {
    return view('form');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/insert', [App\Http\Controllers\HomeController::class, 'insert'])->name('form.insert');

//Rotte grafici
Route::get('chart', [ChartJsController::class, 'index']);

Route::get('chart2', [ChartJsController::class, 'chartjs']);