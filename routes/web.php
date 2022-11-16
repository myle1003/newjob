<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AccountController;

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
    return view('welcome');
});
Route::post('/members', [MemberController::class, 'store'])->name('storeMember');
Route::get('/members', [MemberController::class, 'index'])->name('indexMember');
Route::get('/members/{id}', [MemberController::class, 'show'])->name('showMember');
Route::post('/members/{id}', [MemberController::class, 'update'])->name('updateMember');
Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('destroyMember');

Route::post('/accounts', [AccountController::class, 'store'])->name('storeAccount');
Route::get('/accounts/{id}', [AccountController::class, 'index'])->name('indexAccount');
Route::get('/account/{id}', [AccountController::class, 'show'])->name('showAccount');
Route::post('/account/{id}', [AccountController::class, 'update'])->name('updateAccount');
Route::delete('/account/{id}', [AccountController::class, 'destroy'])->name('destroyAccount');
