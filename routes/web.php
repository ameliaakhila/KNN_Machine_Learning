<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\variabelController;
use App\Models\Variabel;
use Illuminate\Support\Facades\Route;

// Halaman utama arahkan ke dashboard
Route::view('/', 'dashboard.dashboard');

Route::resource('dataVariabel', variabelController::class);

Route::resource('dataSample', SampleController::class);

Route::get('hasilPerhitungan', [SampleController::class, 'hasilPerhitungan']);
