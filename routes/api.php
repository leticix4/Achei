<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AvaliacaoController;
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

Route::post('/stores', [StoreController::class, 'create']);
Route::get('/stores', [StoreController::class, 'index']);
Route::get('/stores/{id}', [StoreController::class, 'show']);
Route::get('/stores/{store}/avaliacao', [AvaliacaoController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('/user/notifications', [AuthController::class, 'notifications']);
    Route::post('/user/notifications/mark-read', [AuthController::class, 'markNotificationsRead']);

    Route::get('/notifications/stream', [SSEController::class, 'stream']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::put('/stores/{id}', [StoreController::class, 'update']);
    Route::delete('/stores/{id}', [StoreController::class, 'destroy']);

    Route::get('/unread-messages-count', [MessageController::class, 'getUnreadMessagesCount']);

    Route::post('/stores/{store}/avaliacao', [AvaliacaoController::class, 'store']);

    Route::group(['prefix' => 'products'], function () {
        Route::post('/', [ProductController::class, 'store']);
        Route::put('/{id}', [ProductController::class, 'update']);

        Route::get('/{product}/messages/store/{user}', [MessageController::class, 'storeMessages']);
        Route::post('/{product}/messages/store/{user}', [MessageController::class, 'create']);
    });
});
