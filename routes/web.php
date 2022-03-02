<?php

use App\Http\Controllers\FirmasController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\PeluqueriasController;
use App\Http\Controllers\productosController;
use Illuminate\Support\Facades\Route;


Auth::routes(["register" => false]);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//municipios
Route::resource('municipios', MunicipiosController::class);
//peluquerias
Route::resource('peluquerias', PeluqueriasController::class);
//firmas
Route::resource('firmas', FirmasController::class);
//productos
Route::resource('productos', productosController::class);

