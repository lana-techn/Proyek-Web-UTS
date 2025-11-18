<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

Route::resource('mahasiswa', MahasiswaController::class);

// Additional routes for different views
Route::get('/mahasiswa-card', [MahasiswaController::class, 'indexCard'])->name('mahasiswa.index.card');
Route::get('/mahasiswa-table', [MahasiswaController::class, 'indexTable'])->name('mahasiswa.index.table');

