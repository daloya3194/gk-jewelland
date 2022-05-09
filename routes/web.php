<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
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

Route::redirect('/', 'en');

Route::group(['prefix' => '{language}'], function () {

    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
    Route::get('/product/{slug}', [ProductController::class, 'show'])->name('show.product');
    Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('show.category');

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product_id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{product_id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update-quantity/{product_id}', [CartController::class, 'updateQuantity'])->name('cart.update-quantity');

    Route::get('/cart/checkout', [InvoiceController::class, 'index'])->name('checkout');
    Route::post('/cart/checkout', [InvoiceController::class, 'checkout'])->name('checkout-submit');
    Route::get('/cart/process-transaction', [InvoiceController::class, 'processTransaction'])->name('processTransaction');
    Route::get('/cart/success-transaction', [InvoiceController::class, 'successTransaction'])->name('successTransaction');
    Route::get('/cart/cancel-transaction', [InvoiceController::class, 'cancelTransaction'])->name('cancelTransaction');




    Route::get('/login', [AuthController::class, 'loginIndex'])->middleware(['guest'])->name('login-index');
    Route::post('/login', [AuthController::class, 'login'])->middleware(['guest'])->name('login');
    Route::get('/register', [AuthController::class, 'registerIndex'])->middleware(['guest'])->name('register-index');
    Route::post('/register', [AuthController::class, 'register'])->middleware(['guest'])->name('register');
    Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth'])->name('logout');

    Route::get('/account/{section?}', [AccountController::class, 'index'])->middleware(['auth'])->name('account');


    Route::group(['prefix' => 'admin'], function () {

        Route::get('/login', [LoginController::class, 'index'])->middleware(['guest'])->name('admin');
        Route::post('/login', [LoginController::class, 'authenticate'])->middleware(['guest'])->name('admin.login');
        Route::get('/logout', [LoginController::class, 'logout'])->middleware(['admin'])->name('admin.logout');

        Route::get('/', [DashboardController::class, 'dashboard'])->middleware(['admin'])->name('admin.dashboard');
        Route::get('/products', [AdminProductController::class, 'index'])->middleware(['admin'])->name('admin.products');
        Route::get('/products/create', [AdminProductController::class, 'create'])->middleware(['admin'])->name('admin.products.create');
        Route::post('/products/store', [AdminProductController::class, 'store'])->middleware(['admin'])->name('admin.products.store');

        Route::get('/categories', [AdminCategoryController::class, 'index'])->middleware(['admin'])->name('admin.categories');
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])->middleware(['admin'])->name('admin.categories.create');
        Route::post('/categories/store', [AdminCategoryController::class, 'store'])->middleware(['admin'])->name('admin.categories.store');

    });

});

/*Route::get('/invalidate-session', function () {
    session()->invalidate();
})->name('invalidate-session');*/

Route::post('upload', [\App\Http\Controllers\UploadController::class, 'store']);

Route::post('delete', [\App\Http\Controllers\UploadController::class, 'delete']);
