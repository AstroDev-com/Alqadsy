<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\NotificationApiController;
use App\Http\Controllers\Api\DashboardApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/register', [AuthApiController::class, 'register']);

// Public product routes (for user app without auth)
Route::get('/categories', [CategoryApiController::class, 'index']);
Route::get('/categories/{id}', [CategoryApiController::class, 'show']);
Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{id}', [ProductApiController::class, 'show']);
Route::get('/products/category/{categoryId}', [ProductApiController::class, 'byCategory']);
Route::get('/products/search', [ProductApiController::class, 'search']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Auth routes
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::get('/profile', [AuthApiController::class, 'profile']);
    Route::put('/profile', [AuthApiController::class, 'updateProfile']);

    // Notifications
    Route::get('/notifications', [NotificationApiController::class, 'index']);
    Route::post('/notifications/{id}/mark-as-read', [NotificationApiController::class, 'markAsRead']);
    Route::post('/notifications/mark-all-read', [NotificationApiController::class, 'markAllAsRead']);

    // Admin routes (require admin role)
    Route::middleware(['role:admin|super-admin'])->group(function () {
        // Dashboard statistics
        Route::get('/dashboard/statistics', [DashboardApiController::class, 'statistics']);

        // Categories management
        Route::post('/categories', [CategoryApiController::class, 'store']);
        Route::put('/categories/{id}', [CategoryApiController::class, 'update']);
        Route::delete('/categories/{id}', [CategoryApiController::class, 'destroy']);

        // Products management
        Route::post('/products', [ProductApiController::class, 'store']);
        Route::put('/products/{id}', [ProductApiController::class, 'update']);
        Route::delete('/products/{id}', [ProductApiController::class, 'destroy']);

        // Users management
        Route::get('/users', [UserApiController::class, 'index']);
        Route::get('/users/{id}', [UserApiController::class, 'show']);
        Route::post('/users', [UserApiController::class, 'store']);
        Route::put('/users/{id}', [UserApiController::class, 'update']);
        Route::delete('/users/{id}', [UserApiController::class, 'destroy']);
    });
});
