<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CategoryApiController;

// LOGIN
Route::post('/login', [AuthController::class, 'getToken']);

// PRODUCT
Route::get('/product', [ProductApiController::class, 'index']);
Route::get('/product/{id}', [ProductApiController::class, 'show']);

// CATEGORY
Route::get('/category', [CategoryApiController::class, 'index']);
Route::get('/category/{id}', [CategoryApiController::class, 'show']);

// AUTH
Route::middleware('auth:sanctum')->group(function () {

    // PRODUCT
    Route::post('/product', [ProductApiController::class, 'store']);
    Route::put('/product/{id}', [ProductApiController::class, 'update']);
    Route::delete('/product/{id}', [ProductApiController::class, 'destroy']);

    // CATEGORY
    Route::post('/category', [CategoryApiController::class, 'store']);
    Route::put('/category/{id}', [CategoryApiController::class, 'update']);
    Route::delete('/category/{id}', [CategoryApiController::class, 'destroy']);
});