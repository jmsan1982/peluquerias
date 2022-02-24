<?php

use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\PeluqueriasController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\tipoProductoController;
use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//municipios
Route::resource('municipios', MunicipiosController::class);
//peluquerias
Route::resource('peluquerias', PeluqueriasController::class);
//tipo_producto
Route::resource('tipo_producto', tipoProductoController::class);
//productos
Route::resource('productos', productosController::class);

