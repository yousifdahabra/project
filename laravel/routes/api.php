<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {

    Route::get('/{user}?', [UserController::class, 'index']);

    Route::post('/', [UserController::class, 'store']);

    Route::get('/{user}', [UserController::class, 'show']);

    Route::put('/{user}', [UserController::class, 'update']);

    Route::delete('/{user}', [UserController::class, 'destroy']);
});