<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DivisionController;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::post('me', [AuthController::class, 'me']);
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'div'

], function ($router) {
    Route::post('create', [DivisionController::class, 'createDivision'])->middleware('auth:api');
    Route::get('/', [DivisionController::class, 'getAllDivisions']);
    Route::put('/{id}', [DivisionController::class, 'updateDivision'])->middleware('auth:api');
    Route::delete('/{id}', [DivisionController::class, 'deleteDivision'])->middleware('auth:api');
});
