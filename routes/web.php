<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InfoPageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController as ClientProductController;

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

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('/main', [MainController::class, 'index']);

        Route::prefix('categories')->group(function(){
            Route::get('index', [CategoryController::class, 'index']);
            Route::get('create', [CategoryController::class, 'create']);
            Route::post('create', [CategoryController::class, 'store']);
            Route::get('edit/{category}', [CategoryController::class, 'show']);
            Route::post('edit/{category}', [CategoryController::class, 'update']);
            Route::DELETE('destroy', [CategoryController::class, 'destroy']);
        });

        #product
        Route::prefix('products')->group(function(){
            Route::get('index', [ProductController::class, 'index']);
            Route::get('create', [ProductController::class, 'create']);
            Route::post('create', [ProductController::class, 'store']);
            Route::get('show/{product}', [ProductController::class, 'show']);
            Route::get('edit/{product}', [ProductController::class, 'edit']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #sliders
        Route::prefix('sliders')->group(function(){
            Route::get('index', [SliderController::class, 'index']);
            Route::get('create', [SliderController::class, 'create']);
            Route::post('create', [SliderController::class, 'store']);
            Route::get('edit/{slider}', [SliderController::class, 'edit']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });   
        Route::prefix('infoPages')->group(function(){
            Route::get('index', [InfoPageController::class, 'index']);
            Route::get('edit/{infoPage}', [InfoPageController::class, 'edit']);
            Route::post('edit/{infoPage}', [InfoPageController::class, 'update']);
            Route::DELETE('destroy', [InfoPageController::class, 'destroy']);
        });
        Route::prefix('posts')->group(function(){
            Route::get('index', [InfoPageController::class, 'index']);
            Route::get('create', [SliderController::class, 'create']);
            Route::post('create', [SliderController::class, 'store']);
            Route::get('edit/{infoPage}', [InfoPageController::class, 'edit']);
            Route::post('edit/{infoPage}', [InfoPageController::class, 'update']);
            Route::DELETE('destroy', [InfoPageController::class, 'destroy']);
        });
    });

});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/trang-chu.html', [HomeController::class, 'index'])->name('home');

Route::get('danh-muc/{id}-{slug}.html', [ClientCategoryController::class, 'index']);
Route::get('danh-muc/{id}-{slug}', [ClientCategoryController::class, 'parentCategory']);

Route::get('san-pham.html', [ClientProductController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [ClientProductController::class, 'productDetail']);

Route::post('add-cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'show']);
