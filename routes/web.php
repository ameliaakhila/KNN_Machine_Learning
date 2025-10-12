<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\DataController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\VariabelController;

//! ================== AUTH ==================
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//! ================== AUTHENTICATED ROUTES ==================
// Route::middleware('auth')->group(function () {

    //! Dashboard
    Route::view('/', 'dashboard.dashboard')->name('dashboard');

    //! Data Variabel (CRUD)
    Route::resource('dataVariabel', VariabelController::class);

    //! Data Sample (CRUD + Klasifikasi)
    Route::resource('dataSample', SampleController::class);

    //! Hasil Perhitungan KNN
    Route::get('hasilPerhitungan', [SampleController::class, 'hasilPerhitungan'])->name('hasil.perhitungan');
// });
