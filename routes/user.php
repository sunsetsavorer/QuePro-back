<?php

use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'users'
    ],
    function()
    {
        Route::post('/signup', [UserController::class, 'register']);
        Route::post('/signin', [UserController::class, 'login']);
    }
);

Route::group(
    [
        'prefix' => 'users',
        'middleware' => 'auth:sanctum'
    ],
    function()
    {
        Route::post('/signout', [UserController::class, 'logout']);
        Route::get('/me', [UserController::class, 'get']);
        Route::put('/me', [UserController::class, 'update']);
        Route::get('/me/tournaments', [TournamentController::class, 'getUserList']);
    }
);