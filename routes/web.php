<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PrestasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('siswa/cetak-pdf', [SiswaController::class, 'cetakPdf'])->name('siswa.cetak-pdf');
Route::get('siswa/export-excel', [SiswaController::class, 'exportExcel'])->name('siswa.export-excel');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('siswa', SiswaController::class);
    Route::resource('presensi', PresensiController::class)->only(['index', 'create', 'store']);
    Route::resource('pelanggaran', PelanggaranController::class)->only(['index', 'create', 'store']);
    Route::resource('prestasi', PrestasiController::class)->only(['index', 'create', 'store']);
});

require __DIR__.'/auth.php';
