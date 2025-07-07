<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\OrangTua\LoginController as OrangTuaLogin;
use App\Http\Controllers\OrangTua\DashboardController as OrangTuaDashboard;
use App\Http\Controllers\OrangTua\RegisterController as OrangTuaRegister;
use App\Http\Controllers\OrangTua\OrangTuaController;

// ================== Tampilan Awal ==================

Route::get('/', function () {
    return view('welcome');
})->name('home');

// ================== Admin (Guard web) ==================

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['verified'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

    Route::resource('siswa', SiswaController::class)->except(['show']);
    Route::get('siswa/cetak-pdf', [SiswaController::class, 'cetakPdf'])->name('siswa.cetak-pdf');
    Route::get('siswa/export-excel', [SiswaController::class, 'exportExcel'])->name('siswa.export-excel');
    Route::post('siswa/import-excel', [SiswaController::class, 'importExcel'])->name('siswa.import-excel');

    Route::resource('presensi', PresensiController::class);
    Route::get('presensi/cetak-pdf', [PresensiController::class, 'cetakPdf'])->name('presensi.cetak-pdf');
    Route::get('presensi/export-excel', [PresensiController::class, 'exportExcel'])->name('presensi.export-excel');
    Route::post('presensi/import-excel', [PresensiController::class, 'importExcel'])->name('presensi.import-excel');
    Route::get('presensi/massal', [PresensiController::class, 'createMassal'])->name('presensi.massal');
Route::post('presensi/massal', [PresensiController::class, 'storeMassal'])->name('presensi.storeMassal');



    Route::resource('pelanggaran', PelanggaranController::class);
    Route::get('pelanggaran/cetak-pdf', [PelanggaranController::class, 'cetakPdf'])->name('pelanggaran.cetak-pdf');
    Route::get('pelanggaran/export-excel', [PelanggaranController::class, 'exportExcel'])->name('pelanggaran.export-excel');

    Route::resource('prestasi', PrestasiController::class);
    Route::get('prestasi/cetak-pdf', [PrestasiController::class, 'cetakPdf'])->name('prestasi.cetak-pdf');
    Route::get('prestasi/export-excel', [PrestasiController::class, 'exportExcel'])->name('prestasi.export-excel');

    Route::resource('orangtua', OrangTuaController::class)->except(['show']);
});

// Login Admin
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminLoginController::class, 'login']);

// ================== Orang Tua (Guard orangtua) ==================

Route::prefix('orangtua')->group(function () {
    
    Route::get('/login', [OrangTuaLogin::class, 'showLoginForm'])->name('orangtua.login');
    Route::post('/login', [OrangTuaLogin::class, 'login']);
    Route::get('/register', [OrangTuaRegister::class, 'showRegisterForm'])->name('orangtua.register');
    Route::post('/register', [OrangTuaRegister::class, 'register']);
    Route::post('/logout', [OrangTuaLogin::class, 'logout'])->name('orangtua.logout');

    Route::middleware('auth:orangtua')->group(function () {
        Route::get('/dashboard', [OrangTuaDashboard::class, 'index'])->name('orangtua.dashboard');
    });
});
