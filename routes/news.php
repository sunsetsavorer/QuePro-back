<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'news'
    ],
    function()
    {
        Route::get('/', [NewsController::class, 'getList']);
        Route::get('/{slug}', [NewsController::class, 'getBySlug']);
    }
);