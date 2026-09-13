<?php

use App\Http\Controllers\Api\Admin\AdminProductController;
use App\Http\Controllers\Api\Admin\AdminStoreController;
use App\Http\Controllers\Api\Admin\PosOrderController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DeliveryFeeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentMethodController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\StoreController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/stores', [StoreController::class, 'index']);
Route::get('/stores/{store}', [StoreController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/payment-methods', [PaymentMethodController::class, 'index']);
Route::post('/delivery-fee', [DeliveryFeeController::class, 'calculate']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/{order}', [OrderController::class, 'show']);

    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/stores', [AdminStoreController::class, 'index']);
        Route::put('/stores/{store}', [AdminStoreController::class, 'update']);
        Route::post('/stores/{store}/stock', [AdminStoreController::class, 'updateStock']);

        Route::get('/products', [AdminProductController::class, 'index']);
        Route::post('/products', [AdminProductController::class, 'store']);
        Route::put('/products/{product}', [AdminProductController::class, 'update']);

        Route::get('/pos/orders', [PosOrderController::class, 'index']);
        Route::post('/pos/orders', [PosOrderController::class, 'store']);
    });
});
