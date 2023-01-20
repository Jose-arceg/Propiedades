<?php

use App\Http\Controllers\administrador\PropiedadController;
use App\Http\Controllers\user\PropiedadesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/mispropiedades', [PropiedadesController::class,'mispropiedades']);
Route::get('/crearpropiedades', [PropiedadesController::class,'crearpropiedades']);
Route::post('/insertarpropiedades', [PropiedadesController::class,'insertarpropiedades']);
Route::delete('/propiedades/{id}/deshabilitar', [PropiedadesController::class,'deshabilitar'])->name('deshabilitar');
Route::middleware('administrador')->group(function () {
    route::resource('/propiedades', PropiedadController::class);
});
