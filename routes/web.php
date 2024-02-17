<?php

use App\Http\Controllers\DailySheet;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CosteoController;
use App\Http\Controllers\ProveedoresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home')->middleware('auth');

// Auth
Route::get('/registro', [RegistroController::class, 'index'])->name('registro')->middleware('guest');
Route::post('/registro', [RegistroController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Ventas
Route::get('/ventas', [DailySheet::class, 'index'])->name('hoja.index');

// Proveedores
Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores.index');
Route::get('/generar-pdf',[ProveedoresController::class, 'generarPDF'])->name('export.pdf');
Route::get('/generar-excel',[ProveedoresController::class, 'generarExcel'])->name('export.excel');

Route::get('/proveedores/create', [ProveedoresController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores/store', [ProveedoresController::class, 'store'])->name('proveedores.store');

// Editar proveedor
Route::get('/proveedores/{proveedor}/edit', [ProveedoresController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{proveedor}', [ProveedoresController::class, 'update'])->name('proveedores.update');

// Elimniar proveedor
Route::delete('/proveedores/{proveedor}', [ProveedoresController::class, 'destroy'])->name('proveedores.destroy');

// Productos
Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [ProductosController::class, 'store'])->name('productos.store');

// Editar Producto
Route::get('/productos/{producto}/edit', [ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductosController::class, 'update'])->name('productos.update');
// Eliminar producto
Route::delete('/productos/{producto}', [ProductosController::class, 'destroy'])->name('productos.destroy');

// Categorias
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');

// Costeo de Productos
Route::get('/costeo-productos', [CosteoController::class, 'index'])->name('costeo.index');
Route::get('/costeo-productos/inventario', [CosteoController::class, 'indexInventario'])->name('costeo.inventario');
Route::get('/costeo-productos/inventario/{fecha}', [CosteoController::class, 'show'])->name('productos.por.fecha');
// Eliminar costeoDeProductos
Route::delete('/costeo-productos/inventario/{fecha}', [CosteoController::class, 'destroy'])->name('costeo.destroy');