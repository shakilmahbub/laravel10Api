<?php

use App\Http\Controllers\Api\AuthenticationController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['prefix' => 'v1'], function () {
    Route::middleware('guest')->group(function () {
        Route::post('register', [AuthenticationController::class,'register'])->name('register');
        Route::post('login', [AuthenticationController::class,'login'])->name('login');
    });
    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [AuthenticationController::class,'logout'])->name('logout');
    });
});
