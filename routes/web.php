<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BillController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\InfoPageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CategoryController as ClientCategoryController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\UserController;

// use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

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
            Route::get('index', [PostController::class, 'index']);
            Route::get('create', [PostController::class, 'create']);
            Route::post('create', [PostController::class, 'store']);
            Route::get('show/{post}', [PostController::class, 'show']);
            Route::get('edit/{post}', [PostController::class, 'edit']);
            Route::post('edit/{post}', [PostController::class, 'update']);
            Route::DELETE('destroy', [PostController::class, 'destroy']);
        });
        Route::prefix('bills')->group(function(){
            Route::get('customer', [BillController::class, 'index'])->name('bill.customer');
            Route::get('view/{id}', [BillController::class, 'show'])->name('detail.customer');
            Route::get('active/{id}', [BillController::class, 'activeBill'])->name('active.bill');
            Route::get('new', [BillController::class, 'billNew'])->name('bill.new');
            Route::get('ship', [BillController::class, 'billShip'])->name('bill.ship');
            Route::get('done', [BillController::class, 'billDone'])->name('bill.done');
            // Route::get('alert', [BillController::class, 'billAlert'])->name('bill.alert');
        });
        Route::prefix('contacts')->group(function(){
            Route::get('index', [AdminContactController::class, 'index']);
        });
        Route::prefix('users')->group(function(){
            Route::get('index', [AdminController::class, 'index']);
            Route::get('create', [AdminController::class, 'create']);
            Route::post('create', [AdminController::class, 'store']);
            Route::get('show/{product}', [AdminController::class, 'show']);
            Route::get('edit/{product}', [AdminController::class, 'edit']);
            Route::post('edit/{product}', [AdminController::class, 'update']);
            Route::DELETE('destroy', [AdminController::class, 'destroy']);
        });
    });

});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/trang-chu.html', [HomeController::class, 'index'])->name('home');

Route::get('danh-muc/{id}-{slug}.html', [ClientCategoryController::class, 'index']);
Route::get('danh-muc/{id}-{slug}', [ClientCategoryController::class, 'parentCategory']);
Route::get('danh-muc/san-pham/{id}-{slug}', [ClientCategoryController::class, 'productCategory']);

Route::get('san-pham.html', [ClientProductController::class, 'index']);
Route::get('san-pham-moi-nhat', [ClientProductController::class, 'productNew'])->name('product_New');
Route::get('san-pham-ban-chay', [ClientProductController::class, 'productSold'])->name('product_Sold');
Route::get('san-pham-khuyen-mai', [ClientProductController::class, 'productSale'])->name('product_Sale');
Route::get('san-pham/{id}-{slug}.html', [ClientProductController::class, 'productDetail']);

Route::get('/lien-he.html', [ContactController::class, 'index']);
Route::post('/lien-he.html', [ContactController::class, 'store']);

Route::get('/tin-tuc', [ClientPostController::class, 'index'])->name('post');
Route::get('/tin-tuc/{id}', [ClientPostController::class, 'show'])->name('post.detail');

Route::get('/quen-mat-khau', [UserController::class, 'forgotPass'])->name('user.forgotPass');
Route::post('/quen-mat-khau', [UserController::class, 'postForgotPass']);
Route::get('/lay-mat-khau/{user}/{token}', [UserController::class, 'getPass'])->name('user.getPass');
Route::post('/lay-mat-khau/{user}/{token}', [UserController::class, 'postGetPass']);

Route::middleware('auth')->group(function () {
    Route::get('/gio-hang',[CartController::class, 'index']);
    Route::post('/gio-hang-them/{row_id}',[CartController::class, 'addCart']);
    Route::get('/gio-hang-xoa/{row_id}',[CartController::class, 'remove']);
    Route::get('/gio-hang-tang/{row_id}',[CartController::class, 'upQuantity']);
    Route::get('/gio-hang-giam/{row_id}',[CartController::class, 'downQuantity']);
    Route::get('/them-vao-gio-hang/{id}', [CartController::class, 'addProductCart']);

    Route::get('/dat-hang', [CartController::class, 'getCheckout']);
    Route::post('/dat-hang', [CartController::class, 'postCheckout'])->name('dathang');
    Route::get('/dat-hang-thanh-cong', [CartController::class, 'successfull'])->name('successfull');
    Route::get('/don-hang-cua-toi', [CartController::class, 'myBill'])->name('myBill');
    Route::get('/don-hang-chi-tiet/{id}', [CartController::class, 'myBill_Detail']);
    Route::get('/xac-nhan-da-nhan-hang/{id}', [CartController::class, 'myBill_Done']);

    Route::get('/ho-so-cua-toi', [UserController::class, 'index'])->name('profile.user');
});

require __DIR__.'/auth.php';
// -----