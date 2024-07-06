<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
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

Route::post('admin/login', [UserController::class, 'apiAdminLogin']);
Route::post('user/login', [UserController::class, 'apiUserLogin']);

Route::middleware('auth:sanctum', 'ability:admin', 'throttle:1000,1')->group(function () {
    Route::post('user/login', [UserController::class, 'apiUserLogin']);
});


Route::middleware('auth:sanctum', 'throttle:1000,1')->group(function () {
    Route::get('/user', [UserController::class, 'apiUserInfo']);
});
