<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormKonsultasiController;
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

//Powered by Rizqi Nur Andi Putra
Route::get('/', [LandingController::class, 'index']);
Route::get('/formkonsultasi', function () {
    return view('form.form_konsultasi');
});
//login route
Route::get('/masuk', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/masuk', [LoginController::class, 'login']);

//form konsultasi route
Route::post('/formkonsultasi', [FormKonsultasiController::class, 'store'])->name('konsultasi.store');

Route::group(['middleware' => 'IsLogin'], function () {

    //dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //konsultasi route
    Route::get('/konsultasi', [KonsultasiVirtualController::class, 'index'])->name('konsultasi.index');
    Route::delete('/konsultasi/{id}', [KonsultasiVirtualController::class, 'destroy'])->name('konsultasi.destroy');


    //logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

