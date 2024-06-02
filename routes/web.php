<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KandidatController;

Route::resource('kandidats', KandidatController::class);
Route::get('kandidats/calculate', [KandidatController::class, 'calculate']);