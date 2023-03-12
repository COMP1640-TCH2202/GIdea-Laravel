<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);

// temporary moved out to by pass authentication
Route::get('user', [AuthController::class, 'user']);
Route::post('logout', [AuthController::class, 'logout']);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('departments', DepartmentController::class);
Route::apiResource('users', UserController::class);

Route::middleware('auth:sanctum')->group(function () {
    // Content temporary moved out
});
