<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ComplainController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
    // return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->name('dashboard');


Route::group(['middleware' => ['auth:web'], 'prefix' => 'admin'], function () {

    //Common
    Route::get('get-district', [\App\Http\Controllers\DistrictController::class, 'getDistrictByDivision'])->name('get.district');
    Route::get('get-sub-district', [\App\Http\Controllers\UpazilaController::class, 'getSubDistrictByDistrict'])->name('get.sub_district');
    Route::get('get-unions', [\App\Http\Controllers\UnionController::class, 'getUnionBySubDistrict'])->name('get.unions');


    Route::group(['prefix' => 'complain'], function () {
        Route::get('/', [ComplainController::class, 'index'])->name('admin.complain.index');
        Route::get('/create', [ComplainController::class, 'create'])->name('admin.complain.create');
        Route::post('/create', [ComplainController::class, 'store'])->name('admin.complain.store');
        Route::get('/edit/{id}', [ComplainController::class, 'edit'])->name('admin.complain.edit');
        Route::post('/edit/{id}', [ComplainController::class, 'update'])->name('admin.complain.update');
        Route::get('/{id}/view', [ComplainController::class, 'view'])->name('admin.complain.view');
        Route::get('/export', [ComplainController::class, 'export'])->name('admin.complain.export');
        Route::post('/note-store', [ComplainController::class, 'noteStore'])->name('admin.complain.note-store');
    });
    Route::group(['prefix' => 'configure'], function () {

        Route::group(['prefix' => 'training-venue'], function () {
            Route::get('/', [TrainingVenueController::class, 'index'])->name('admin.config.training-venue.index');
            Route::get('/create', [TrainingVenueController::class, 'create'])->name('admin.config.training-venue.create');
            Route::post('/create', [TrainingVenueController::class, 'store'])->name('admin.config.training-venue.store');
            Route::get('/edit/{id}', [TrainingVenueController::class, 'edit'])->name('admin.config.training-venue.edit');
            Route::post('/edit/{id}', [TrainingVenueController::class, 'update'])->name('admin.config.training-venue.update');
            Route::get('/export', [TrainingVenueController::class, 'export'])->name('admin.config.training-venue.export');
        });
    });
    Route::group(['prefix' => 'setting'], function () {

        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
        Route::post('/update', [SettingController::class, 'update'])->name('admin.setting.update');
    });



    Route::group(['middleware' => ['isCountryAdmin:web'], 'prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/create', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/edit/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/export', [UserController::class, 'export'])->name('admin.user.export');
        Route::get('/change-status', [UserController::class, 'changeStatus'])->name('admin.user.change-status');
    });
});


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    return 'success';
});
