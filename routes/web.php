<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiccionarioController;
use App\Http\Controllers\SenasFavoritasController;
use App\Http\Controllers\ListaSenasController;
use App\Http\Controllers\DonacionesController;
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

//Route::resource('/diccionario',DiccionarioController::class);

//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/diccionario', [DiccionarioController::class, 'index'])->name('diccionario')->middleware('auth');

Route::post('/diccionario/MostrarLetra', [DiccionarioController::class, 'MostrarLetra']);

Route::post('/diccionario/MostrarCategoria', [DiccionarioController::class, 'MostrarCategoria']);

Route::post('/diccionario/AgregarSenaFavorita', [DiccionarioController::class, 'AgregarSenaFavorita']);

Route::post('/diccionario/QuitarSenaFavorita', [DiccionarioController::class, 'QuitarSenaFavorita']);

Route::post('/diccionario/SenaFavoritaUsuario', [DiccionarioController::class, 'SenaFavoritaUsuario']);

Route::post('/diccionario/CorazonFavorito', [DiccionarioController::class, 'CorazonFavorito']);

Route::post('/diccionario/MostrarVideo', [DiccionarioController::class, 'MostrarVideo']);

Route::post('/diccionario/Verificar', [DiccionarioController::class, 'Verificar']);

Route::get('/senasfavoritas', [SenasFavoritasController::class, 'index'])->name('senasfavoritas')->middleware('auth');

Route::get('/listasenas', [ListaSenasController::class, 'index'])->name('listasenas')->middleware('auth');

Route::post('/listasenas/MostrarLetra', [ListaSenasController::class, 'MostrarLetra']);


Route::get('/donatusena', [DonacionesController::class, 'index'])->middleware('auth');

Route::post('/donaciones/Verificar', [DonacionesController::class, 'Verificar']);
