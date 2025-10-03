<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('isWriter')->group(function () {
        Route::apiResource('posts',PostController::class)->only(['store', 'update']);
    });
    Route::middleware('isAdmin')->group(function () {
        Route::apiResource('categories',CategoryController::class);
        Route::apiResource('tags',TagController::class);
        Route::apiResource('posts',PostController::class)->except(['store', 'update']);
    });
});
Route::post('/auth',LoginController::class)->name('login');
