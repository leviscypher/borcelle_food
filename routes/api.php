<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\UserInfoController;
use App\Http\Controllers\Api\Admin\CategoriesController;


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


// auth api
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user-login', [AuthController::class, 'userInfo']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


// admin api
Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'adminLogin']);

    Route::middleware(['isAdmin', 'auth:sanctum'])->group(function () {

        Route::prefix('/user-info')->group(function () {
            Route::get('/all', [UserInfoController::class, 'index']);
            Route::post('/create/{id}', [UserInfoController::class, 'create']);
            Route::get('/edit/{id}', [UserInfoController::class, 'edit']);
            Route::post('/update/{id}', [UserInfoController::class, 'update']);
            Route::delete('/delete/{id}', [UserInfoController::class, 'delete']);
        });

        Route::prefix('/categories')->group(function () {
            Route::get('/all', [CategoriesController::class, 'index']);
            Route::post('/create', [CategoriesController::class, 'create']);
            Route::get('/edit/{id}', [CategoriesController::class, 'edit']);
            Route::post('/update/{id}', [CategoriesController::class, 'update']);
            Route::delete('/delete/{id}', [CategoriesController::class, 'delete']);
        });
    });
});


// customer api
