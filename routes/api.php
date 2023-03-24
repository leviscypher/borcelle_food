<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\UserInfoController;


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


// admin api
Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'adminLogin']);
    Route::prefix('/user-info')->group(function () {
        Route::get('/all', [UserInfoController::class, 'index']);
        Route::post('/create/{id}', [UserInfoController::class, 'create']);
        Route::get('/edit/{id}', [UserInfoController::class, 'edit']);
        Route::post('/update/{id}', [UserInfoController::class, 'update']);
        Route::post('/delete/{id}', [UserInfoController::class, 'delete']);
    })->middleware(['isAdmin', 'auth:sanctum']);
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user-login', [AuthController::class, 'userInfo']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// customer api
