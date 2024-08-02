<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UnionController;
use App\Http\Controllers\UpazilaController;
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
Route::post('user/registration', [UserController::class, 'apiUserRegistration']);

Route::middleware('auth:sanctum', 'ability:admin', 'throttle:1000,1')->group(function () {

    Route::group(['prefix' => 'profession'], function () {
        Route::get('/list', [ProfessionController::class, 'apiIndex']);
        Route::post('/create', [ProfessionController::class, 'apiCreate']);
        Route::get('/edit/{id}', [ProfessionController::class, 'apiEdit']);
        Route::post('/edit/{id}', [ProfessionController::class, 'apiUpdate']);
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::post('/setting-update', [SettingController::class, 'apiSettingUpdate']);
    });
});
Route::middleware('auth:sanctum', 'ability:user', 'throttle:1000,1')->group(function () {
    Route::get('/address-search', [HomeController::class, 'apiAddressSearch']);
});


Route::middleware('auth:sanctum', 'throttle:1000,1')->group(function () {
    Route::get('/user', [UserController::class, 'apiUserInfo']);
    Route::post('/user-profile-update', [UserController::class, 'apiUserProfileUpdate']);

    Route::prefix('common')->group(function () {
        Route::get('/get-division', [HomeController::class, 'getDivision']);
        Route::get('/get-district', [DistrictController::class, 'apiGetDistrict']);
        Route::get('/get-sub-district', [UpazilaController::class, 'apiGetSubDistrict']);
        Route::get('/get-unions', [UnionController::class, 'getUnionBySubDistrict']);
        Route::get('/setting', [SettingController::class, 'apiSetting']);
    });
});

Route::get('/professions', [ProfessionController::class, 'apiIndex']);
Route::get('/home-search', [HomeController::class, 'apiHomeSearch']);
