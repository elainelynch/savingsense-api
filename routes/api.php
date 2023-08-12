<?php

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
    Route::apiResource('users', UserController::class);
    Route::apiResource('transactions', TransactionController::class);
});
