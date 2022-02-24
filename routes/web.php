<?php

use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\PeluqueriasController;
use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//municipios
Route::resource('municipios', MunicipiosController::class);
//peluquerias
Route::resource('peluquerias', PeluqueriasController::class);

