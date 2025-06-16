<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function(){
    Route::controller(CategoryController::class)->prefix('category')->group(function(){
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::put('/{id}', 'visible');
    });

    Route::controller(ImageController::class)->prefix('image')->group(function(){
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::delete('/{id}', 'visible');
    });

    Route::controller(ProductController::class)->prefix('product')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::put('/', 'reorder');
        Route::put('/{id}', 'visible');
    });

    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::put('/{id}', 'visible');
    });

    Route::controller(OrderProductController::class)->prefix('orderproduct')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::put('/{id}', 'visible');
    });

    Route::controller(OrderItemController::class)->prefix('orderitem')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::put('/{id}', 'visible');
    });

    Route::controller(PaymentController::class)->prefix('payment')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::put('/{id}', 'visible');
    });

    Route::controller(ReviewController::class)->prefix('review')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::put('/{id}', 'visible');
    });

    Route::controller(CartController::class)->prefix('cart')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::put('/{id}', 'visible');
    });

    Route::controller(ShippingController::class)->prefix('shipping')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::put('/{id}', 'visible');
    });

    Route::controller(WishlistController::class)->prefix('wishlist')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::put('/{id}', 'visible');
    });

    Route::controller(CouponController::class)->prefix('coupon')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'create');
        Route::post('/{id}', 'update');
        Route::put('/{id}', 'visible');
    });
});