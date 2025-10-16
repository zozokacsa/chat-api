<?php

use App\Auth\Http\Controllers\AuthController;
use App\Friendship\Http\Controllers\FriendshipController;
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
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group([
        'prefix' => 'auth',
        'as' => 'auth.'
    ], function () {
        Route::get('me', [AuthController::class, 'me']);
    });

    Route::group([
        'prefix' => 'friends',
        'as' => 'friends.'
    ], function () {
        Route::get('/', [FriendshipController::class, 'index']);
        Route::delete('/{id}', [FriendshipController::class, 'destroy']);

        Route::group([
            'prefix' => 'requests',
            'as' => 'requests.'
        ], function () {
            Route::post('/', [FriendshipController::class, 'store']);
            Route::get('/received', [FriendshipController::class, 'receivedRequests']);
            Route::get('/sent', [FriendshipController::class, 'sentRequests']);
            Route::post('/{id}/accept', [FriendshipController::class, 'accept']);
            Route::post('/{id}/reject', [FriendshipController::class, 'reject']);
        });
    });
});
