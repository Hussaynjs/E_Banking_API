<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\PinController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function(){
    Route::post('/register', [AuthenticationController::class, 'register']);
    Route::post('/login', [AuthenticationController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function(){
        Route::get('/user', [AuthenticationController::class, 'user']);
        Route::post('/logout', [AuthenticationController::class, 'logout']);
    });
});

Route::prefix('onboarding')->group(function(){
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/setup-pin', [PinController::class, 'setupPin']);
        Route::post('/validate-pin', [PinController::class, 'validatePin']);
    });
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
