<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\UserController;
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


// AUTH API - ĐĂNG NHẬP TRANG WEB - DÀNH CHO NGƯỜI DÙNG.
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user-login', [AuthController::class, 'userLogin']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


// ADMIN API
Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'adminLogin']);

    Route::middleware(['isAdmin', 'auth:sanctum'])->group(function () {

        // THÊM SỬA XÓA TÀI KHOẢN.
        Route::prefix('/user')->group(function () {
            Route::get('/all', [UserController::class, 'index']);
            Route::post('/create', [UserController::class, 'create']);
            Route::get('/edit/{id}', [UserController::class, 'edit']);
            Route::post('/update/{id}', [UserController::class, 'update']);
            Route::delete('/delete/{id}', [UserController::class, 'delete']);
        });

        // THÊM SỬA XÓA THÔNG TIN TÀI KHOẢN.
        Route::prefix('/user-info')->group(function () {
            Route::get('/all', [UserInfoController::class, 'index']);
            Route::post('/create/{id}', [UserInfoController::class, 'create']);
            Route::get('/edit/{id}', [UserInfoController::class, 'edit']);
            Route::post('/update/{id}', [UserInfoController::class, 'update']);
            Route::delete('/delete/{id}', [UserInfoController::class, 'delete']);
        });

        // THÊM SỬA XÓA DANH MỤC SẢN PHẨM.
        Route::prefix('/categories')->group(function () {
            Route::get('/all', [CategoriesController::class, 'index']);
            Route::post('/create', [CategoriesController::class, 'create']);
            Route::get('/edit/{id}', [CategoriesController::class, 'edit']);
            Route::post('/update/{id}', [CategoriesController::class, 'update']);
            Route::delete('/delete/{id}', [CategoriesController::class, 'delete']);
        });
    });
});


// CUSTOMER API

// THÊM SỬA THÔNG TIN TÀI KHOẢN CỦA NGƯỜI DÙNG - KHÔNG CÓ QUYỀN XÓA.
Route::prefix('customer')->middleware('auth:sanctum')->group(function () {
    Route::post('/create/{id}', [UserInfoController::class, 'create']);
    Route::get('/edit/{id}', [UserInfoController::class, 'edit']);
    Route::post('/update/{id}', [UserInfoController::class, 'update']);
});
