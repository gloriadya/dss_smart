<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\NilaiController;


Route::get('kandidat/create', 'KandidatController@create');
Route::post('kandidat', 'KandidatController@store')->name('kandidat.store');

Route::get('/register-kandidat', [KandidatController::class, 'create'])->name('register-kandidat');
Route::post('/register-kandidat', [KandidatController::class, 'store'])->name('kandidat.store');

// Route::get('kandidat/create', 'KandidatController@create');
Route::resource('kandidats', KandidatController::class);
// Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
Route::post('nilai', 'App\Http\Controllers\NilaiController@store')->name('nilai.store');
Route::post('/nilai/store', [NilaiController::class, 'store'])->name('nilai.store');


// Route::get('index', function () {
//     return view('index');
// })->name('index');

Route::get('/register-kandidat', [KandidatController::class, 'create'])->name('register-kandidat');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/kandidat', [KandidatController::class, 'index'])->name('kandidat.index');
    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('/rank', [KandidatController::class, 'rank'])->name('kandidat.rank');
});

Route::get('/kandidat/{id}/criteria', [KandidatController::class, 'createCriteria'])->name('kandidat.createCriteria');
Route::post('/kandidat/{id}/criteria', [KandidatController::class, 'storeCriteria'])->name('kandidat.storeCriteria');
Route::get('/kandidat/rank', [KandidatController::class, 'rank'])->name('kandidat.rank');


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/kandidat/create', [KandidatController::class, 'create'])->name('kandidat.create');
Route::get('/penilaian', [PenilaianController::class, 'index'])->middleware(['auth', 'verified'])->name('penilaian.index');
//Route::get('/kandidat/rank/export', [KandidatController::class, 'exportRanking'])->name('kandidat.rank.export');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';