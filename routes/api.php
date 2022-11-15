<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AccountController;

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
Route::post('/login', [AccountController::class, 'login']);
Route::post('/members', [MemberController::class, 'store']);
Route::get('/members', [MemberController::class, 'index']);
Route::get('/members/{id}', [MemberController::class, 'show']);
Route::put('/members/{id}', [MemberController::class, 'update']);
Route::delete('/members/{id}', [MemberController::class, 'destroy']);

Route::post('/roles', [RoleController::class, 'store']);

Route::post('/accounts', [AccountController::class, 'store']);
Route::get('/accounts/{id}', [AccountController::class, 'index']);
Route::put('/accounts/{id}', [AccountController::class, 'update']);
Route::delete('/accounts/{id}', [AccountController::class, 'destroy']);

