<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/products', [ProductController::class,'index']);
    Route::post('/products', [ProductController::class,'store']);
    Route::put('/products/{product}', [ProductController::class,'update']);
    Route::delete('/products/{product}', [ProductController::class,'destroy']);

    Route::get('/cart', [CartController::class,'index']);
    Route::post('/cart', [CartController::class,'store']);
    Route::delete('/cart/{cartItem}', [CartController::class,'destroy']);
});
