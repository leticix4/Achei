<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StoreController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SearchController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\SSEController;

use Illuminate\Support\Facades\Route;

Route::get('/search', [SearchController::class, 'searchProducts']);
Route::get('/search/nearby', [SearchController::class, 'searchNearby']);
Route::get('/categories', [SearchController::class, 'getCategories']);
Route::get('/brands', [SearchController::class, 'getBrands']);
Route::get('/stores', [StoreController::class, 'index']);
Route::get('/stores/{id}', [StoreController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/products/{id}/messages', [MessageController::class, 'index']);
Route::post('/products/{id}/messages', [MessageController::class, 'create']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/stores', [StoreController::class, 'store']);
    Route::put('/stores/{id}', [StoreController::class, 'update']);
    Route::delete('/stores/{id}', [StoreController::class, 'destroy']);

    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
});
