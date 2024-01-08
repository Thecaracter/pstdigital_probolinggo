<?php

use App\Http\Controllers\CatalogBukuController;
use App\Http\Controllers\KonsultasiSelesaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CatalogController;
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
//catalog buku route
Route::get('/catalog', [CatalogBukuController::class, 'index']);

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
    Route::post('/konsultasi/{id}', [KonsultasiVirtualController::class, 'update_status'])->name('konsultasi.update_status');

    //konsultasi selesai route
    Route::get('/konsultasiselesai', [KonsultasiSelesaiController::class, 'index'])->name('konsultasi_selesai');
    //route catalog admin
    Route::get('/catalogadmin', [CatalogController::class, 'index'])->name('catalog.index');
    Route::post('/catalogadmin', [CatalogController::class, 'store'])->name('catalog.store');
    Route::delete('/catalogadmin/{id}', [CatalogController::class, 'destroy'])->name('catalog.destroy');
    Route::put('/catalogadmin/{id}', [CatalogController::class, 'update'])->name('catalog.update');
    //logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

