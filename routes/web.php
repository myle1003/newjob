<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PermissionController;

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


    Route::post('/members', [MemberController::class, 'store'])->name('storeMember');
    Route::get('/members', [MemberController::class, 'index'])->name('indexMember');
    Route::get('/members/{id}', [MemberController::class, 'show'])->name('showMember');
    Route::post('/members/{id}', [MemberController::class, 'update'])->name('updateMember');
    Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('destroyMember');

    Route::group(['middleware' => ['role:Super admin|Admin']], function () {
        Route::post('/accounts', [AccountController::class, 'store'])->name('storeAccount');
        Route::get('/accounts/{id}', [AccountController::class, 'index'])->name('indexAccount');
        Route::get('/account/{id}', [AccountController::class, 'show'])->name('showAccount');
        Route::post('/account/{id}', [AccountController::class, 'update'])->name('updateAccount');
        Route::delete('/account/{id}', [AccountController::class, 'destroy'])->name('destroyAccount');

        Route::get('/permission/admin', [PermissionController::class, 'getPermissonAdmin'])->name('getPermissonAdmin');
        Route::get('/permission/role', [PermissionController::class, 'show'])->name('show');
        Route::get('/permission/superadmin', [PermissionController::class, 'getPermissonSuperadmin'])->name('getPermissonSuperadmin');
        Route::post('/permission', [PermissionController::class, 'index'])->name('indexPermission');
        Route::post('/permission/{id}', [PermissionController::class, 'update'])->name('updatePermission');

    });
Route::post('/authlogin', [AccountController::class, 'login'])->name('login');
Route::get('/', [AccountController::class, 'getlogin']);

