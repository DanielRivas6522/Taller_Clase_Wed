<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/productos', [ProductoController::class,'index'])->name('productos.index');

Route::get('/productos/create', [ProductoController::class,'create'])->name('productos.create');

Route::post('/productos', [ProductoController::class,'store'])->name('productos.store');

Route::get('/productos/{id}/edit', [ProductoController::class,'edit'])->name('productos.edit');

Route::put('/productos/{id}', [ProductoController::class,'update'])->name('productos.update');

Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::get('/productos/{id}', [ProductoController::class,'show'])->name('productos.show');


// Importante: esta línea carga las rutas de login, registro, etc.
require __DIR__.'/auth.php';