<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\FoodController;
use App\Http\Controllers\API\IngredientController;
use App\Http\Controllers\AuthController;

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
    });
    Route::Group(['prefix' => 'foods'], function () {
        Route::get('', [FoodController::class, 'index']);
        Route::get('{id}', [FoodController::class, 'show']);
    });
    Route::Group(['prefix' => 'ingredients'], function () {
        Route::get('', [IngredientController::class, 'index']);
        Route::get('{id}', [IngredientController::class, 'show']);
    });
});
