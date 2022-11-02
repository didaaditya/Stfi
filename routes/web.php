<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\AbsenController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/export', [ExcelController::class, 'ExportExcel']);
Route::get('/ab', [AbsenController::class, 'AbsenExport']);
Route::resource('excel', ExcelController::class);
Route::resource('absen', AbsenController::class);
