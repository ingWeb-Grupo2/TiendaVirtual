<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidosController;

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
    return view('auth.login'); 
});

/* 
//  ARTICULO
Route::get('/articulo', function () {
    return view('articulo.index'); 
});

Route::get('/articulo/create',[ArticuloController::class, 'create']);

//  PROVEEDOR
Route::get('/proveedor', function () {
    return view('proveedor.index'); 
});

Route::get('/proveedor/create',[ProveedorController::class, 'create']);

//  CATEGORIA
Route::get('/categoria', function () {
    return view('categoria.index'); 
});

Route::get('/categoria/create',[CategoriaController::class, 'create']);
*/


Route::resource('proveedor', ProveedorController::class)->middleware('auth'); //respeta autenticidad
Route::resource('articulo', ArticuloController::class)->middleware('auth');
Route::resource('categoria', CategoriaController::class)->middleware('auth');
Route::resource('pedido', PedidosController::class)->middleware('auth');

Auth::routes();
//Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [ArticuloController::class, 'index'])->name('home');
Route::get('/home', [ProveedorController::class, 'index'])->name('home');
Route::get('/home', [CategoriaController::class, 'index'])->name('home');
Route::get('/home', [PedidosController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function () {
    Route::get('/', [ArticuloController::class, 'index'])->name('home');
    Route::get('/', [ProveedorController::class, 'index'])->name('home');
    Route::get('/', [CategoriaController::class, 'index'])->name('home');
    Route::get('/', [PedidosController::class, 'index'])->name('home');
});