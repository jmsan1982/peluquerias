<?php

use App\Http\Controllers\FirmasController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\PeluqueriasController;
use App\Http\Controllers\ProductosController;
use Illuminate\Support\Facades\Route;


Auth::routes(["register" => false]);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//municipios
Route::resource('municipios', MunicipiosController::class);
//peluquerias
Route::resource('peluquerias', PeluqueriasController::class);
Route::get('/peluqueria/actualizarUltimaVisita/{id}', [PeluqueriasController::class, 'actualizarUltimaVisita']);
Route::get('/peluqueria/actualizarInteresa/{id}', [PeluqueriasController::class, 'actualizarInteresa']);
//firmas
Route::resource('firmas', FirmasController::class);
//productos
Route::resource('productos', ProductosController::class);

