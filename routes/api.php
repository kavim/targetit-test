<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login',    [AuthController::class, 'login']);

Route::post('health', function () {
    return response()->json(['message' => 'API is working']);
})->name('health');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('users', UserController::class);
    Route::apiResource('addresses', AddressController::class)->only(['store']);
    Route::post('permissions', [UserController::class, 'assignPermission'])->name('permissions.update');
});
