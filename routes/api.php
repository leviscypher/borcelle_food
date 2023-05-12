<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\UserInfoController;
use App\Http\Controllers\Api\Admin\CategoriesController;
use App\Http\Controllers\Api\Admin\GenderController;
use App\Http\Controllers\Api\Admin\ProductsController;
use App\Http\Controllers\Api\Admin\PositionController;
use App\Http\Controllers\Api\Admin\RolesController;
use App\Http\Controllers\Api\Admin\ProductStatusController;
use App\Http\Controllers\Api\Admin\OrderController;


use App\Http\Controllers\Api\Customer\CustomerUserInfoController;
use App\Http\Controllers\Api\Customer\AddressController;
use App\Http\Controllers\Api\Customer\CustomerOrderController;
use App\Http\Controllers\Api\Customer\CustomerProductController;
use App\Http\Controllers\Api\Customer\CustomerCategoryController;
use App\Http\Controllers\Api\Customer\SearchController;
use App\Http\Controllers\Api\Customer\MapController;

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


// AUTH API - DÀNH CHO NGƯỜI DÙNG.
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
// 
Route::post('check-email', [AuthController::class, 'checkEmail']);
Route::post('check-token', [AuthController::class, 'checkToken']);
Route::post('change-password', [AuthController::class, 'changePassword']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user-login', [AuthController::class, 'userLogin']);
    Route::post('logout', [AuthController::class, 'logout']);
});


// ADMIN API
Route::prefix('admin')->group(function () {
    Route::post('login', [AuthController::class, 'adminLogin']);

    Route::middleware(['isAdmin', 'auth:sanctum'])->group(function () {
        // THÊM SỬA XÓA TÀI KHOẢN.
        Route::prefix('/user')->group(function () {
            Route::get('all', [UserController::class, 'index']);
            Route::post('create', [UserController::class, 'create']);
            Route::get('edit/{id}', [UserController::class, 'edit']);
            Route::post('update/{id}', [UserController::class, 'update']);
            Route::delete('delete/{id}', [UserController::class, 'delete']);
        });

        // THÊM SỬA XÓA THÔNG TIN TÀI KHOẢN.
        Route::prefix('/user-info')->group(function () {
            Route::get('all', [UserInfoController::class, 'index']);
            Route::get('edit/{user_id}', [UserInfoController::class, 'edit']);
            Route::post('update/{user_id}', [UserInfoController::class, 'update']);
            Route::delete('delete/{id}', [UserInfoController::class, 'delete']);
        });

        // THÊM SỬA XÓA DANH MỤC SẢN PHẨM.
        Route::prefix('/categories')->group(function () {
            Route::get('all', [CategoriesController::class, 'index']);
            Route::post('create', [CategoriesController::class, 'create']);
            Route::get('edit/{id}', [CategoriesController::class, 'edit']);
            Route::post('update/{id}', [CategoriesController::class, 'update']);
            Route::delete('delete/{id}', [CategoriesController::class, 'delete']);
        });

        // THÊM SỬA XÓA SẢN PHẨM.
        Route::prefix('product')->group(function () {
            Route::get('all', [ProductsController::class, 'index']);
            Route::post('create', [ProductsController::class, 'create']);
            Route::get('edit/{id}', [ProductsController::class, 'edit']);
            Route::post('update/{id}', [ProductsController::class, 'update']);
            Route::delete('delete/{id}', [ProductsController::class, 'delete']);
        });

        // THÊM XÓA CHỨC VỤ.
        Route::prefix('position')->group(function () {
            Route::get('all', [PositionController::class, 'index']);
            Route::post('create', [PositionController::class, 'create']);
            Route::delete('delete/{id}', [PositionController::class, 'delete']);
        });

        Route::get('role/all', [RolesController::class, 'index']);
        Route::get('product-status/all', [ProductStatusController::class, 'index']);
        Route::get('gender/all', [GenderController::class, 'index']);


        // ORDER
        Route::prefix('order')->group(function () {
            Route::get('all/{status}', [OrderController::class, 'index']);
            Route::get('order-detail/{order_id}', [OrderController::class, 'orderDetail']);
            Route::post('update-status/{order_id}', [OrderController::class, 'updateStatus']);
            Route::get('detail/{order_id}', [OrderController::class, 'orderDetail']);
        });
    });
});


// CUSTOMER API

// THÊM SỬA THÔNG TIN TÀI KHOẢN CỦA NGƯỜI DÙNG - KHÔNG CÓ QUYỀN XÓA.
Route::middleware('auth:sanctum')->prefix('customer')->group(function () {

    Route::prefix('user-info')->group(function () {
        Route::get('edit/{user_id}', [CustomerUserInfoController::class, 'edit']);
        Route::post('update/{user_id}', [CustomerUserInfoController::class, 'update'])->middleware('enterAdressRole');
    });

    Route::prefix('address')->group(function () {
        Route::get('{user_id}', [AddressController::class, 'index']);
        Route::get('create/{user_id}', [AddressController::class, 'create']);
        Route::post('store/{user_id}', [AddressController::class, 'store']);
        Route::get('edit/{id}', [AddressController::class, 'edit']);
        Route::get('active/{user_id}', [AddressController::class, 'active']);
        Route::post('update/{id}', [AddressController::class, 'update']);
        Route::post('update/active/{address_id}', [AddressController::class, 'activeAddress']);
        Route::delete('delete/{id}', [AddressController::class, 'delete']);
    });

    Route::get('get/city', [MapController::class, 'getCity']);
    Route::get('get/district/{city_id}', [MapController::class, 'getDistricts']);
    Route::get('get/ward/{district_id}', [MapController::class, 'getWards']);
    

    Route::prefix('order')->middleware('isActive')->group(function() {
        Route::get('all/{user_id}', [CustomerOrderController::class, 'index']);
        Route::get('detail/{order_id}', [CustomerOrderController::class, 'orderDetail']);
        Route::post('create/{user_id}', [CustomerOrderController::class, 'createOrder']);
    });
});

Route::get('customer/get/product/all', [CustomerProductController::class, 'index']);
Route::get('customer/get/categories/all', [CustomerCategoryController::class, 'index']);
Route::get('customer/get/product/get-product/{id}', [CustomerProductController::class, 'getProduct']);
Route::post('customer/search/{query}', [SearchController::class, 'search']);
Route::post('customer/search-category/{category_id}', [SearchController::class, 'searchCategory']);


