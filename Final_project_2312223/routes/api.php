<?php

use App\Http\Controllers\Api\ApiCakeController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\Admin\AdminAuthApiController;
use App\Http\Controllers\Api\Admin\AdminCakeApiController;
use App\Http\Controllers\Api\Admin\AdminCategoryApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public API Routes
|--------------------------------------------------------------------------
*/

// Categories API (Public)
Route::get('/categories', [ApiCategoryController::class, 'index']);
Route::get('/categories/{id}', [ApiCategoryController::class, 'show']);

// Cakes API (Public)
Route::get('/cakes', [ApiCakeController::class, 'index']);
Route::get('/cakes/{id}', [ApiCakeController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Admin API Routes
|--------------------------------------------------------------------------
*/

// Admin Authentication
Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminAuthApiController::class, 'login']); // Public
    Route::post('/logout', [AdminAuthApiController::class, 'logout'])->middleware('admin.api'); // Protected
    Route::get('/me', [AdminAuthApiController::class, 'me'])->middleware('admin.api'); // Protected
});

// Admin Protected Routes (Require authentication)
Route::prefix('admin')->middleware('admin.api')->group(function () {

    // Admin Cakes CRUD
    Route::get('/cakes', [AdminCakeApiController::class, 'index']);
    Route::get('/cakes/{id}', [AdminCakeApiController::class, 'show']);
    Route::post('/cakes', [AdminCakeApiController::class, 'store']);
    Route::put('/cakes/{id}', [AdminCakeApiController::class, 'update']);
    Route::delete('/cakes/{id}', [AdminCakeApiController::class, 'destroy']);

    // Admin Categories CRUD
    Route::get('/categories', [AdminCategoryApiController::class, 'index']);
    Route::get('/categories/{id}', [AdminCategoryApiController::class, 'show']);
    Route::get('/categories/{id}/cakes', [AdminCategoryApiController::class, 'cakesByCategory']);
    Route::post('/categories', [AdminCategoryApiController::class, 'store']);
    Route::put('/categories/{id}', [AdminCategoryApiController::class, 'update']);
    Route::delete('/categories/{id}', [AdminCategoryApiController::class, 'destroy']);

    // Admin Orders CRUD

});
