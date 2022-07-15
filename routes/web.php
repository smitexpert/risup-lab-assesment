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

Route::get('login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::post('login', [App\Http\Controllers\LoginController::class, 'attempt'])->name('login.attempt');

Route::middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('index');

    Route::prefix('users')->name('users.')->middleware('can:admin')->group(function(){
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
        Route::get('create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
        Route::post('create', [App\Http\Controllers\UserController::class, 'store'])->name('store');
        Route::get('{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
        Route::post('{id}/edit', [App\Http\Controllers\UserController::class, 'update'])->name('update');
        Route::get('{id}/show', [App\Http\Controllers\UserController::class, 'show'])->name('show');
        Route::get('{id}/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('delete');
    });

    Route::prefix('attendance')->name('attendance.')->group(function(){
        Route::get('/', [App\Http\Controllers\AttendanceController::class, 'index'])->name('index');
        Route::post('/', [App\Http\Controllers\AttendanceController::class, 'store'])->name('store');
        Route::get('show', [App\Http\Controllers\AttendanceController::class, 'show'])->name('show');
    });

});
