<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\HomeController;
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
// Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index'])->name('home');


// Backend
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'showLogin'])->name('admin.showLogin');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Category Product
    Route::prefix('/category-product')->group(function () {
        Route::get('/add', [CategoryProductController::class, 'add'])->name('categoryProduct.add');
        Route::get('/all', [CategoryProductController::class, 'all'])->name('categoryProduct.all');
        Route::post('/save', [CategoryProductController::class, 'save'])->name('categoryProduct.save');
        Route::get('/edit/{id}', [CategoryProductController::class, 'edit'])->name('categoryProduct.edit');
        Route::post('/update/{id}', [CategoryProductController::class, 'update'])->name('categoryProduct.update');
        Route::get('/delete/{id}', [CategoryProductController::class, 'delete'])->name('categoryProduct.delete');
        Route::get('/unactive/{id}', [CategoryProductController::class, 'unactive'])->name('categoryProduct.unactive');
        Route::get('/active/{id}', [CategoryProductController::class, 'active'])->name('categoryProduct.active');
    });

    // Brand Product
    Route::prefix('/brand-product')->group(function () {
        Route::get('/add', [BrandProductController::class, 'add'])->name('brandProduct.add');
        Route::get('/all', [BrandProductController::class, 'all'])->name('brandProduct.all');
        Route::post('/save', [BrandProductController::class, 'save'])->name('brandProduct.save');
        Route::get('/edit/{id}', [BrandProductController::class, 'edit'])->name('brandProduct.edit');
        Route::post('/update/{id}', [BrandProductController::class, 'update'])->name('brandProduct.update');
        Route::get('/delete/{id}', [BrandProductController::class, 'delete'])->name('brandProduct.delete');
        Route::get('/unactive/{id}', [BrandProductController::class, 'unactive'])->name('brandProduct.unactive');
        Route::get('/active/{id}', [BrandProductController::class, 'active'])->name('brandProduct.active');
    });

    Route::prefix('/product')->group(function () {
        Route::get('/add', [ProductController::class, 'add'])->name('product.add');
        Route::get('/all', [ProductController::class, 'all'])->name('product.all');
        Route::post('/save', [ProductController::class, 'save'])->name('product.save');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/unactive/{id}', [ProductController::class, 'unactive'])->name('product.unactive');
        Route::get('/active/{id}', [ProductController::class, 'active'])->name('product.active');
    });
});
