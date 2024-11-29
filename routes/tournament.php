<?php

use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'tournaments',
    ],
    function ()
    {
        Route::get('/', [TournamentController::class, 'getList']);
        Route::get('/disciplines', [TournamentController::class, 'getDisciplines']);
    }
);