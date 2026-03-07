<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\IngredientController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\OrderItemController;

use function Laravel\Prompts\grid;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'profile']);
    Route::Group(['prefix' => 'categories'], function () {
        Route::get('', [CategoryController::class, 'index']);
        Route::get('{id}', [CategoryController::class, 'show']);
        Route::post('', [CategoryController::class, 'store']);
        Route::put('{id}', [CategoryController::class, 'update']);
        Route::delete('{id}', [CategoryController::class, 'destroy']);
    });
    Route::Group(['prefix' => 'foods'], function () {
        Route::get('', [FoodController::class, 'index']);
        Route::get('{id}', [FoodController::class, 'show']);
        Route::post('', [FoodController::class, 'store']);
        Route::put('{id}', [FoodController::class, 'update']);
        Route::delete('{id}', [FoodController::class, 'destroy']);
    });
    Route::Group(['prefix' => 'ingredients'], function () {
        Route::get('', [IngredientController::class, 'index']);
        Route::get('{id}', [IngredientController::class, 'show']);
        Route::post('', [IngredientController::class, 'store']);
        Route::put('{id}', [IngredientController::class, 'update']);
        Route::delete('{id}', [IngredientController::class, 'destroy']);
    });
    Route::Group(['prefix' => 'orders'], function () {
        Route::get('', [OrderController::class, 'index']);
        Route::get('{id}', [OrderController::class, 'show']);
        Route::post('', [OrderController::class, 'store']);
        Route::put('{id}', [OrderController::class, 'update']);
        Route::delete('{id}', [OrderController::class, 'destroy']);
    });
    Route::Group(['prefix' => 'order-items'], function () {
        Route::get('', [OrderItemController::class, 'index']);
        Route::get('{id}', [OrderItemController::class, 'show']);
        Route::post('', [OrderItemController::class, 'store']);
        Route::put('{id}', [OrderItemController::class, 'update']);
        Route::delete('{id}', [OrderItemController::class, 'destroy']);
    });
});
