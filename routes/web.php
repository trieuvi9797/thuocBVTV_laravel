<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\Users\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('/main', [MainController::class, 'index']);
        Route::prefix('menus')->group(function(){
            Route::get('add', [MenuController::class, 'create']);
            Route::get('list', [MenuController::class, 'index']);
        });
    });
});