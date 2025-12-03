<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StoreController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SearchController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\SSEController;
use App\Http\Controllers\API\ProductRatingController;

use Illuminate\Support\Facades\Route;


Route::post('/products/{id}/rate', [ProductRatingController::class, 'rate'])->middleware('auth:sanctum');
Route::get('/products/{id}/ratings', [ProductRatingController::class, 'list']);

Route::get('/search', [SearchController::class, 'searchProducts']);
Route::get('/search/nearby', [SearchController::class, 'searchNearby']);
Route::get('/categories', [SearchController::class, 'getCategories']);
Route::get('/brands', [SearchController::class, 'getBrands']);

Route::post('/stores', [StoreController::class, 'create']);
Route::get('/stores', [StoreController::class, 'index']);
Route::get('/stores/{id}', [StoreController::class, 'show']);
Route::get('/stores/{store}/avaliacao', [StoreController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/products/{id}/messages', [MessageController::class, 'index']);
Route::post('/products/{id}/messages', [MessageController::class, 'create']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::put('/stores/{id}', [StoreController::class, 'update']);
    Route::delete('/stores/{id}', [StoreController::class, 'destroy']);
    
    Route::get('/unread-messages-count', [MessageController::class, 'getUnreadMessagesCount']);


    Route::group(['prefix' => 'products'], function () {
        Route::post('/', [ProductController::class, 'store']);
        Route::put('/{id}', [ProductController::class, 'update']);

        Route::get('/{product}/messages', [MessageController::class, 'index']);
        Route::post('/{product}/messages', [MessageController::class, 'create']);

        Route::get('/{product}/messages/store/{user}', [MessageController::class, 'storeMessages']);
        Route::post('/{product}/messages/store/{user}', [MessageController::class, 'create']);
    });
});
