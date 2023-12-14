<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KonsultasiVirtualController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('landing');
});
Route::get('/masuk', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/masuk', [LoginController::class, 'login']);

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/konsultasi', [KonsultasiVirtualController::class, 'index'])->name('konsultasi.index');
Route::delete('/konsultasi/{id}', [KonsultasiVirtualController::class, 'destroy'])->name('konsultasi.destroy');
