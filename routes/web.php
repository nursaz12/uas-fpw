<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan dashboard (menggunakan MahasiswaController)
Route::get('/dashboard', [MahasiswaController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk menampilkan form input data mahasiswa (GET)
Route::get('/mahasiswa/form', [MahasiswaController::class, 'create'])->middleware('auth')->name('mahasiswa.mahasiswas');

// Route untuk menyimpan data mahasiswa (POST)
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->middleware('auth')->name('mahasiswa.store');

// Route untuk menampilkan daftar mahasiswa (GET)
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('auth')->name('mahasiswa.index');

// Route untuk menghapus data mahasiswa (DELETE)
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->middleware('auth')->name('mahasiswa.destroy');

// Route untuk mengedit data mahasiswa (GET)
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->middleware('auth')->name('mahasiswa.edit');

// Route untuk update data mahasiswa (PUT)
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->middleware('auth')->name('mahasiswa.update');

// Route untuk Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';