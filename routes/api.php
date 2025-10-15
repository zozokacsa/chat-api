<?php

use App\Auth\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
    ->middleware(['signed'])
    ->name('verification.verify');

Route::group([
    'prefix' => 'auth',
    'as' => 'auth.'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
        Route::get('me', [AuthController::class, 'me']);
    });
});
