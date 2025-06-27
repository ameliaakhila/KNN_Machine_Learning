<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\variabelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    // Halaman dashboard
    Route::view('/', 'dashboard.dashboard')->name('dashboard');

    // CRUD Variabel
    Route::resource('dataVariabel', variabelController::class);

    // CRUD Sample
    Route::resource('dataSample', SampleController::class);

    // Hasil perhitungan
    Route::get('hasilPerhitungan', [SampleController::class, 'hasilPerhitungan']);

});
