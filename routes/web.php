<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\ProductController;
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

    Route::get('/', function () {

        return view('welcome');

    })->name('welcome');


    Route::group(['prefix' => 'admin'], function () {

        Route::get('/login', [LoginController::class, 'index'])->name('admin');
        Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.login');
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

        Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/products', [DashboardController::class, 'products'])->name('admin.products');
        Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');

    });

});

Route::post('upload', [\App\Http\Controllers\UploadController::class, 'store']);

Route::post('delete', [\App\Http\Controllers\UploadController::class, 'delete']);
