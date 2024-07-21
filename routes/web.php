<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
Route::get('/kandidat/rank', [KandidatController::class, 'rank'])->name('kandidat.rank');
Route::get('/rank', [KandidatController::class, 'rank'])->name('kandidat.rank');

Route::get('kandidat/create', [NilaiController::class, 'create']);
Route::post('kandidat', [KandidatController::class, 'store'])->name('kandidat.store');
Route::get('/register-kandidat', [KandidatController::class, 'create'])->name('register-kandidat');
Route::post('/register-kandidat', [KandidatController::class, 'store'])->name('kandidat.store');
Route::resource('kandidats', KandidatController::class);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/', [PageController::class, 'welcomePage']);

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [PageController::class, 'dashboardPage'])->name('dashboard');

    // KANDIDAT ROUTE
    Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
    Route::get('/kandidat/create', [KandidatController::class, 'create'])->name('kandidat.create');
    Route::get('/register-kandidat', [KandidatController::class, 'create'])->name('register-kandidat');
    Route::get('/kandidat/{id}/criteria', [KandidatController::class, 'createCriteria'])->name('kandidat.createCriteria');
    Route::post('/kandidat/{id}/criteria', [KandidatController::class, 'storeCriteria'])->name('kandidat.storeCriteria');
    

    // NILAI ROUTE
    Route::post('nilai', [NilaiController::class, 'store'])->name('nilai.store');
    Route::post('/nilai/store', [NilaiController::class, 'store'])->name('nilai.store');

    // LOWONGAN ROUTE
    Route::get('/buat-lowongan', [LowonganController::class, 'buatLowonganView'])->name('lowongan.create');
    Route::post('/store-lowongan', [LowonganController::class, 'buatLowonganStore'])->name('lowongan.store');
    Route::get('/list-lowongan', [LowonganController::class, 'listLowonganView'])->name('lowongan.index');
    Route::get('/lowongan/{id}', [LowonganController::class, 'editLowonganView'])->name('lowongan.edit');
    Route::put('/lowongan/{id}', [LowonganController::class, 'updateLowongan'])->name('lowongan.update');
    Route::post('/lowongan/{id}/close', [LowonganController::class, 'closeLowongan'])->name('lowongan.close');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/daftar-lowongan', [LowonganController::class, 'index'])->name('user.daftar-lowongan');
    Route::get('/daftar-lowongan/{id}', [LowonganController::class, 'show'])->name('user.detail-job');

    Route::get('/isian-data-pelamar/{id}', [KandidatController::class, 'isianBerkasLamaran'])->name('isian-data-pelamar.create');
    Route::post('/isian-data-pelamar', [KandidatController::class, 'isianBerkasLamaranStore'])->name('isian-data-pelamar.store');
});

require __DIR__ . '/auth.php';