<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'users'
    ],
    function()
    {
        Route::post('/register', [UserController::class, 'register']);
        Route::post('/login', [UserController::class, 'login']);
    }
);

Route::group(
    [
        'prefix' => 'users',
        'middleware' => 'auth:sanctum'
    ],
    function()
    {
        Route::post('/logout', [UserController::class, 'logout']);
        Route::get('/me', [UserController::class, 'get']);
        Route::put('/me', [UserController::class, 'update']);
    }
);