<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'v1'], function () {

    // Route::group(['prefix' => 'users', 'namespace' => 'Api\Http\Controllers\Api'], function() {
    //     Route::get('/', [UserController::class, 'index']);
    //     Route::get('/id', [UserController::class, 'show']);
    // });

    Route::post('/login', [AuthController::class, 'login']);

    // Route::apiResource('users', UserController::class);
    // users
    Route::group(['prefix' => 'users'], function() {
            Route::get('/', [UserController::class, 'index']);
            Route::get('/{id}', [UserController::class, 'show']);
            Route::post('/', [UserController::class, 'store']);
            Route::patch('/{id}', [UserController::class, 'update']);
            Route::delete('/{id}', [UserController::class, 'destroy']);
        });

    // Route::apiResource('transactions', TransactionController::class);
    // transactions

    Route::group(['prefix' => 'transactions'], function() {
        Route::get('/', [TransactionController::class, 'index']);
        Route::get('/{id}', [TransactionControllerController::class, 'show']);
        Route::post('/', [TransactionController::class, 'store'])->middleware(['auth:sanctum', 'ability:createTransaction']);
        Route::patch('/{id}', [TransactionController::class, 'update']);
        Route::delete('/{id}', [TransactionController::class, 'destroy']);

        // Route::post('/', [TransactionController::class, 'store'])->middleware(['auth:sanctum', 'ability:createTransaction']);
        // Route::patch('/{id}', [TransactionController::class, 'update'])->middleware(['auth:sanctum', 'ability:editTransaction']);
        // Route::delete('/{id}', [TransactionController::class, 'destroy'])->middleware(['auth:sanctum', 'ability:deleteTransaction']);
    });

});
