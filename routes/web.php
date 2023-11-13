<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiccionarioController;
use App\Http\Controllers\SenasFavoritasController;
use App\Http\Controllers\ListaSenasController;
use App\Http\Controllers\DonacionesController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\CategoriaController;

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

Route::get('/diccionario/send-mail', [DiccionarioController::class, 'send']);



Route::get('/admin/categorias/crear_categoria', [CategoriaController::class, 'create']);

Route::post('/admin/categorias/update', [CategoriaController::class, 'update']);

Route::resource('/admin/categorias', CategoriaController::class);

Route::get('/admin/dashboard', [PanelController::class, 'dashboard']);

Route::get('/admin/usuarios', [PanelController::class, 'usuarios']);

Route::resource('/admin', PanelController::class);


Route::post('/admin/check_login', [PanelController::class, 'check_login'])->name('check_login');

Route::post('/admin/salir', [PanelController::class, 'log_out'])->name('log_out');

Route::get('/admin/activo', [PanelController::class, 'activo']);

Route::get('/admin/inactivo', [PanelController::class, 'inactivo']);

Route::get('/admin/pendiente', [PanelController::class, 'pendiente']);

Route::get('/admin/editar/{id}', [PanelController::class, 'editar']);

Route::post('/admin/actualizar/{id}', [PanelController::class, 'update']);

Route::get('/admin/{seccion}/{ordenar}', [PanelController::class, 'order']);

Route::get('/admin/{seccion}/{ordenar}', [PanelController::class, 'order']);


Route::get('/admin/crear_categoria', [CategoriaController::class, 'update']);

Route::get('admin/editar_categoria/{id}', [CategoriaController::class, 'editar_categoria']);


Route::get('/senasfavoritas', [SenasFavoritasController::class, 'index'])->name('senasfavoritas')->middleware('auth');

Route::get('/listasenas', [ListaSenasController::class, 'index'])->name('listasenas')->middleware('auth');

Route::post('/listasenas/MostrarLetra', [ListaSenasController::class, 'MostrarLetra']);


Route::get('/donatusena', [DonacionesController::class, 'index']);

Route::post('/donaciones/guardar', [DonacionesController::class, 'guardar']);

Route::post('/donaciones/Verificar', [DonacionesController::class, 'Verificar']);
