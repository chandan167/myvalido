<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function(){
    return redirect()->route('admin.login');
});

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'showLoginPage'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
});


Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('user')->group(function(){
        Route::get('list', [UserController::class, 'index'])->name('user.list');
        Route::get('add', [UserController::class, 'showAddPage'])->name('user.add');
        Route::post('add', [UserController::class, 'add'])->name('user.add');
    });
});
