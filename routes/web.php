<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\VariabelController;

//! Dashboard
Route::view('/', 'dashboard.dashboard')->name('dashboard');

//! Data Variabel (CRUD)
Route::resource('dataVariabel', VariabelController::class);

//! Data Sample (CRUD + Klasifikasi)
Route::resource('dataSample', SampleController::class);

//! Hasil Perhitungan KNN
Route::get('hasilPerhitungan', [SampleController::class, 'hasilPerhitungan'])->name('hasil.perhitungan');
});
