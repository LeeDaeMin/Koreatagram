<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# Products
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/serial/{serial_number}', [ProductController::class, 'show_serial']);
Route::get('/product/name/{name}', [ProductController::class, 'show_name']);
Route::get('/product/description/{description}', [ProductController::class, 'show_description']);
Route::get('/product/price/{price}', [ProductController::class, 'show_price']);
Route::post('/product', [ProductController::class, 'create']);
Route::delete('/product/{id}', [ProductController::class, 'delete']);

# Orders
Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::post('/order', [OrderController::class, 'create']);
Route::delete('/order/{id}', [OrderController::class, 'delete']);


# OrderItems
Route::get('/orderitem', [OrderItemController::class, 'index']);
Route::get('/orderitem/{id}', [OrderItemController::class, 'show']);
Route::post('/orderitem', [OrderItemController::class, 'create']);
Route::delete('/orderitem/{id}', [OrderItemController::class, 'delete']);


# Users
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::post('/user', [UserController::class, 'create']);
Route::delete('/user/{id}', [UserController::class, 'delete']);



