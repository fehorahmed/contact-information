<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ComplainController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfessionController;
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

// Route::get('/', function () {
//     return redirect()->route('login');
//     // return view('welcome');
// });
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::post('/user-registration', [UserController::class, 'userRegistration'])->name('user.registration');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware([
    'auth:sanctum', 'admin.check',
    config('jetstream.auth_session'),
    'verified'
])->name('dashboard');
Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/my_profile', [UserController::class, 'userProfile'])->name('user.profile');
});

Route::group(['middleware' => ['auth:web', 'admin.check'], 'prefix' => 'admin'], function () {

    //Common
    Route::get('get-district', [\App\Http\Controllers\DistrictController::class, 'getDistrictByDivision'])->name('get.district');
    Route::get('get-sub-district', [\App\Http\Controllers\UpazilaController::class, 'getSubDistrictByDistrict'])->name('get.sub_district');
    Route::get('get-unions', [\App\Http\Controllers\UnionController::class, 'getUnionBySubDistrict'])->name('get.unions');


    Route::group(['prefix' => 'registration'], function () {
        Route::get('/', [UserController::class, 'registration'])->name('admin.registration.index');
        // Route::get('/create', [SettingController::class, 'create'])->name('admin.complain.create');
        // Route::post('/create', [SettingController::class, 'store'])->name('admin.complain.store');
        // Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('admin.complain.edit');
        // Route::post('/edit/{id}', [SettingController::class, 'update'])->name('admin.complain.update');
        // Route::get('/{id}/view', [SettingController::class, 'view'])->name('admin.complain.view');
        // Route::get('/export', [SettingController::class, 'export'])->name('admin.complain.export');
        // Route::post('/note-store', [SettingController::class, 'noteStore'])->name('admin.complain.note-store');
    });
    Route::group(['prefix' => 'approved'], function () {
        Route::get('/', [UserController::class, 'approvedUser'])->name('admin.approved.index');
    });
    Route::group(['prefix' => 'configure'], function () {

        Route::group(['prefix' => 'profession'], function () {
            Route::get('/', [ProfessionController::class, 'index'])->name('admin.config.profession.index');
            Route::get('/create', [ProfessionController::class, 'create'])->name('admin.config.profession.create');
            Route::post('/create', [ProfessionController::class, 'store'])->name('admin.config.profession.store');
            Route::get('/edit/{id}', [ProfessionController::class, 'edit'])->name('admin.config.profession.edit');
            Route::post('/edit/{id}', [ProfessionController::class, 'update'])->name('admin.config.profession.update');
        });
    });
    Route::group(['prefix' => 'setting'], function () {

        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
        Route::post('/update', [SettingController::class, 'update'])->name('admin.setting.update');
    });

    Route::group(['prefix' => 'admin'], function () {
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
