<?php

use App\Models\RouteItems;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuItemController;

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
    $items = RouteItems::select('*')
        ->get();
    foreach ($items as $item) {
        Route::{$item->method}($item->uri, [$item->route, $item->action])->name($item->name)->middleware($item->permission);
    }
//    Route::group(['middleware' => ['permission:Create member']], function () {
//        Route::post('/members', [MemberController::class, 'store'])->name('storeMember');
//    });
//    Route::get('/members', [MemberController::class, 'index'])->name('indexMember')->middleware('permission:Create member');
//    Route::group(['middleware' => ['permission:Edit member']], function () {
//        Route::get('/members/{id}', [MemberController::class, 'show'])->name('showMember');
//        Route::post('/members/{id}', [MemberController::class, 'update'])->name('updateMember');
//    });
//    Route::group(['middleware' => ['permission:Delete member']], function () {
//        Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('destroyMember');
//    });


//Route::group(['middleware' => ['role:Super admin|Admin']], function () {
//    Route::group(['middleware' => ['permission:Create admin|Create super admin']], function () {
//        Route::post('/accounts', [AccountController::class, 'store'])->name('storeAccount');
//    });
//    Route::group(['middleware' => ['role:Super admin|Admin']], function () {
//        Route::get('/accounts/{id}', [\App\Http\Controllers\AccountController::class, 'index'])->name('indexAccount');
//Route::get('/accounts/{id}', 'AccountController@index')->name('indexAccount');
//    });
//    Route::group(['middleware' => ['permission:Edit admin|Edit super admin']], function () {
//        Route::get('/account/{id}', [AccountController::class, 'show'])->name('showAccount');
//        Route::post('/account/{id}', [AccountController::class, 'update'])->name('updateAccount');
//    });
//    Route::group(['middleware' => ['permission:Delete admin|Delete super admin']], function () {
//        Route::delete('/account/{id}', [AccountController::class, 'destroy'])->name('destroyAccount');
//    });

//    Route::get('/permission/admin', [PermissionController::class, 'getPermissonAdmin'])->name('getPermissonAdmin');
//    Route::get('/permission/role', [PermissionController::class, 'show'])->name('show');
//    Route::get('/permission/superadmin', [PermissionController::class, 'getPermissonSuperadmin'])->name('getPermissonSuperadmin');
//    Route::group(['middleware' => ['role:Super admin|Admin']], function () {
//        Route::post('/permission', [PermissionController::class, 'index'])->name('indexPermission');
//        Route::post('/permission/{id}', [PermissionController::class, 'update'])->name('updatePermission');
//    });
//Route::post('/authlogin', [AccountController::class, 'login'])->name('login');
//Route::get('/', [AccountController::class, 'getlogin']);

