<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\HomeController;
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
    Route::get('/login', [AdminController::class,'showLogin'])->name('admin.showLogin');
    Route::post('/login', [AdminController::class,'login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// Category Product
Route::prefix('/category-product')->group(function () {
    Route::get('/add', [CategoryProductController::class, 'add'])->name('categoryProduct.add');
    Route::get('/all', [CategoryProductController::class, 'all'])->name('categoryProduct.all');
    Route::post('/save', [CategoryProductController::class, 'save'])->name('categoryProduct.save');
    Route::get('/unactive/{id}', [CategoryProductController::class, 'unactive'])->name('categoryProduct.unactive');
    Route::get('/active/{id}', [CategoryProductController::class, 'active'])->name('categoryProduct.active');
});
