<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/pdf/{id}', [PDFController::class, 'createPDF'])->name('products.createPDF');
Route::resources([
    'category' => CategoryController::class,
    'products' => ProductController::class,
    'users' => UserController::class,
]);

Route::get('/product', [ProductController::class, 'products'])->name('product.products');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
