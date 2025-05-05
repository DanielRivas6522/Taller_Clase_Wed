<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCategoriaController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    // Listar todas las categorías
    Route::get('/categorias', [ApiCategoriaController::class, 'index']);

    // Crear una nueva categoría
    Route::post('/categorias', [ApiCategoriaController::class, 'store']);

    // Mostrar una categoría específica
    Route::get('/categorias/{id}', [ApiCategoriaController::class, 'show']);

    // Actualizar una categoría
    Route::put('/categorias/{id}', [ApiCategoriaController::class, 'update']);
    Route::patch('/categorias/{id}', [ApiCategoriaController::class, 'update']);

    // Eliminar una categoría
    Route::delete('/categorias/{id}', [ApiCategoriaController::class, 'destroy']);
});
