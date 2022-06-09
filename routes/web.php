<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminLabelController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    Route::post('/', [WelcomeController::class, 'sendContactUsMessage'])->name('send-contact-us-message');
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

    Route::get('/account/{section?}/{section_2?}', [AccountController::class, 'index'])->middleware(['auth'])->name('account');
    Route::post('/account/account/update', [AccountController::class, 'updateAccount'])->middleware(['auth'])->name('account-update');
    Route::post('/account/password/update', [AccountController::class, 'updatePassword'])->middleware(['auth'])->name('password-update');
    Route::post('/account/address/add', [AccountController::class, 'addAddress'])->middleware(['auth'])->name('address-add');
    Route::post('/account/address/update/{address_id}', [AccountController::class, 'updateAddress'])->middleware(['auth'])->name('address-update');
    Route::get('/account/address/standard/{address_id}', [AccountController::class, 'standardAddress'])->middleware(['auth'])->name('address-standard');
    Route::get('/account/address/delete/{address_id}', [AccountController::class, 'deleteAddress'])->middleware(['auth'])->name('address-delete');

    Route::get('/product/wishlist/add/{slug}', [ProductController::class, 'addToWishlist'])->middleware(['auth'])->name('add-to-wishlist');
    Route::get('/product/wishlist/remove/{slug}', [ProductController::class, 'removeToWishlist'])->middleware(['auth'])->name('remove-to-wishlist');


    Route::group(['prefix' => 'admin'], function () {

        Route::get('/login', [LoginController::class, 'index'])->middleware(['guest'])->name('admin');
        Route::post('/login', [LoginController::class, 'authenticate'])->middleware(['guest'])->name('admin.login');
        Route::get('/logout', [LoginController::class, 'logout'])->middleware(['admin'])->name('admin.logout');

        Route::get('/', [DashboardController::class, 'dashboard'])->middleware(['admin'])->name('admin.dashboard');

        Route::get('/products', [AdminProductController::class, 'index'])->middleware(['admin'])->name('admin.products');
        Route::get('/products/create', [AdminProductController::class, 'create'])->middleware(['admin'])->name('admin.products.create');
        Route::post('/products/store', [AdminProductController::class, 'store'])->middleware(['admin'])->name('admin.products.store');
        Route::get('/products/edit/{slug}', [AdminProductController::class, 'edit'])->middleware(['admin'])->name('admin.products.edit');
        Route::post('/products/update/{product}', [AdminProductController::class, 'update'])->middleware(['admin'])->name('admin.products.update');
        Route::get('/products/delete/{product}', [AdminProductController::class, 'delete'])->middleware(['admin'])->name('admin.products.delete');

        Route::get('/categories', [AdminCategoryController::class, 'index'])->middleware(['admin'])->name('admin.categories');
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])->middleware(['admin'])->name('admin.categories.create');
        Route::post('/categories/store', [AdminCategoryController::class, 'store'])->middleware(['admin'])->name('admin.categories.store');
        Route::get('/categories/edit/{slug}', [AdminCategoryController::class, 'edit'])->middleware(['admin'])->name('admin.categories.edit');
        Route::post('/categories/update/{category}', [AdminCategoryController::class, 'update'])->middleware(['admin'])->name('admin.categories.update');
        Route::get('/categories/delete/{category}', [AdminCategoryController::class, 'delete'])->middleware(['admin'])->name('admin.categories.delete');

        Route::get('/labels', [AdminLabelController::class, 'index'])->middleware(['admin'])->name('admin.labels');
        Route::get('/labels/create', [AdminLabelController::class, 'create'])->middleware(['admin'])->name('admin.labels.create');
        Route::post('/labels/store', [AdminLabelController::class, 'store'])->middleware(['admin'])->name('admin.labels.store');
        Route::get('/labels/edit/{slug}', [AdminLabelController::class, 'edit'])->middleware(['admin'])->name('admin.labels.edit');
        Route::post('/labels/update/{label}', [AdminLabelController::class, 'update'])->middleware(['admin'])->name('admin.labels.update');
        Route::get('/labels/delete/{label}', [AdminLabelController::class, 'delete'])->middleware(['admin'])->name('admin.labels.delete');

        Route::post('/delete-image', [UploadController::class, 'delete_image'])->middleware(['admin'])->name('admin.image.delete');

    });
});

/*Route::get('/invalidate-session', function () {
    session()->invalidate();
})->name('invalidate-session');*/

Route::post('upload', [UploadController::class, 'store']);

Route::post('delete', [UploadController::class, 'delete']);
