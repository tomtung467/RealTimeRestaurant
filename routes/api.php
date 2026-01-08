<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;

// Register broadcast authentication routes (must be outside any prefix group)
Broadcast::routes(['middleware' => ['auth:api']]);

Route::group([

   // 'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
    Route::get('me', [App\Http\Controllers\AuthController::class, 'profile']);
    Route::get('checkout/{tablenumber}', [App\Http\Controllers\Admin\OrderController::class, 'getUnpaidOrdersByTable']);
    Route::get('tables', [App\Http\Controllers\TableController::class, 'all']);
    Route::post('place-order/{tablenumber}', [App\Http\Controllers\Admin\OrderController::class, 'placeOrder']);
    Route::post('paid/{orderId}', [App\Http\Controllers\Admin\OrderController::class, 'paidOrder']);
});

