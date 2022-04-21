<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
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


    Route::group(['prefix' => 'admin'], function () {

        Route::get('/login', [LoginController::class, 'index'])->name('admin');
        Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.login');
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

        Route::get('/', [DashboardController::class, 'dashboard'])->middleware(['admin'])->name('admin.dashboard');
        Route::get('/products', [DashboardController::class, 'products'])->middleware(['admin'])->name('admin.products');
        Route::get('/products/create', [ProductController::class, 'create'])->middleware(['admin'])->name('admin.products.create');
        Route::post('/products/store', [ProductController::class, 'store'])->middleware(['admin'])->name('admin.products.store');

    });

});

Route::post('upload', [\App\Http\Controllers\UploadController::class, 'store']);

Route::post('delete', [\App\Http\Controllers\UploadController::class, 'delete']);
