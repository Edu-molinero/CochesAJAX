<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\CategoriaController;

// Portada pública - Catálogo de coches con AJAX
Route::get('/', [CocheController::class, 'portada'])->name('portada');

// API REST para gestionar coches y categorías con JavaScript
Route::prefix('api')->group(function () {
    
    // API CRUD de Coches
    Route::get('/coches', [CocheController::class, 'list'])->name('api.coches.list');
    Route::post('/coches', [CocheController::class, 'store'])->name('api.coches.store');
    Route::delete('/coches/{id}', [CocheController::class, 'destroy'])->name('api.coches.destroy');
    Route::put('/coches/{id}', [CocheController::class, 'update'])->name('api.coches.update');
    
    // API CRUD de Categorías
    Route::get('/categorias', [CategoriaController::class, 'list'])->name('api.categorias.list');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('api.categorias.store');
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('api.categorias.destroy');
    
    Route::get('categorias/{id}/coches', [CategoriaController::class, 'coches'])->name('api.categorias.coches');

});