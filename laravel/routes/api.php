<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IncrementUserResponse;

Route::middleware(IncrementUserResponse::class)->group(function () {

    Route::prefix('user')->group(function () {

        Route::get('/{user}?', [UserController::class, 'index']);

        Route::post('/', [UserController::class, 'store']);

        Route::put('/{user}', [UserController::class, 'update']);

        Route::delete('/{user}', [UserController::class, 'destroy']);
    });

    Route::prefix('project')->group(function () {

        Route::get('/{project}?', [ProjectController::class, 'index']);

        Route::post('/', [ProjectController::class, 'store']);

        Route::put('/{project}', [ProjectController::class, 'update']);

        Route::delete('/{project}', [ProjectController::class, 'destroy']);
    });
});
