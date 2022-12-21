<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginController;
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


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/mahasiswa/excel', [MahasiswaController::class, 'excel'])->name('mahasiswa.excel')->middleware('auth');
Route::get('/mahasiswa/pdf', [MahasiswaController::class, 'pdf'])->name('mahasiswa.pdf')->middleware('auth');
Route::resource('/mahasiswa', MahasiswaController::class)->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
