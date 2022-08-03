<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\Auth\LoginController::class , 'showLoginFrom'])->name('show-login-from');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class , 'login'])->name('login');

Route::get('log-view' , [\App\Http\Controllers\LogViewerController::class , 'index'])->name('log-view')->middleware('is-auth');
Route::post('log-view' , [\App\Http\Controllers\LogViewerController::class , 'showLog'])->middleware('is-auth');
