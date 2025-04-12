<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Manager\UserController as ManagerUserController;
use App\Http\Controllers\UserController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin routes
    Route::prefix('admin')->middleware('isAdmin')->group(function () {
        Route::apiResource('users', AdminUserController::class);
        Route::apiResource('departments', AdminDepartmentController::class);
    });

    // Manager routes
    Route::prefix('manager')->middleware('isManager')->group(function () {
        Route::get('employees', [ManagerUserController::class, 'index']);
        Route::get('employees/{user}', [ManagerUserController::class, 'show']);
    });

    // Employee routes
    Route::prefix('employee')->middleware('isEmployee')->group(function () {
        Route::get('profile', [UserController::class, 'profile']);
        Route::put('profile', [UserController::class, 'updateProfile']);
    });
});
