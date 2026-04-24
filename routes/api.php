<?php

use App\Http\Controllers\PaymentController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::group(['prefix'=>'v1','middleware'=>'throttle:60,1'],function(){
    //authentication
    Route::post('/register',[AuthenticationController::class,'register'])->middleware('guest');
    Route::post('/login',[AuthenticationController::class,'login'])->middleware('guest');
    Route::post('/logout',[AuthenticationController::class,'logout'])->middleware('auth:sanctum');
    Route::get('/notAuthenticated',function(){
        return response()->json([
            'message'=>'You are not authenticated',
        ],401);
    })->name('login');

    Route::middleware('auth:sanctum')->group(function(){
        //user Relations
        Route::get('/users/{user}/products',[UserController::class,'userProducts']);
        Route::get('/users/{user}/orders',[UserController::class,'userOrders']);
        Route::get('/users/{user}/cart',[UserController::class,'userCart']);
        //users
        Route::apiResource('users', UserController::class);

        //products
        Route::apiResource('products', ProductController::class);
        Route::get('/products/{product}/category',[ProductController::class,'productCategory']);
        //categories
        Route::apiResource('categories', CategoryController::class);
        Route::get('/categories/{category}/products',[CategoryController::class,'categoryProducts']);
        //carts
        Route::delete('/carts/deleteProduct/{product_id}',[CartController::class,'deletingProductFromCart']);
        Route::patch('/carts',[CartController::class,'update']);
        Route::get('/carts/activeCart',[CartController::class,'activeCart']);
        Route::post('/carts/addProduct',[CartController::class,'AddProduct']);
        Route::delete('/carts',[CartController::class,'destroy']);
        Route::apiResource('carts', CartController::class);
        //orders
        Route::post('/webhook', [PaymentController::class, 'webhook']);
        Route::post('/orders', [OrderController::class, 'store']);
    });

});