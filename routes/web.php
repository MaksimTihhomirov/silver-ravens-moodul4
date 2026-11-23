<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

Route::get('/', [ProductController::class, 'home'])
    ->name('home');

Route::get('/shop', [ProductController::class, 'index'])
    ->name('shop');

Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product.show');

Route::view('/contact', 'contact')
    ->name('contact');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::view('/cart', 'cart')
    ->name('cart');

Route::get('/admin/login', [AuthController::class, 'showLogin'])
    ->name('login');

    Route::get('/messages', [DashboardController::class, 'messages'])
    ->name('admin.messages');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('admin.login.store');
    
Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])
    ->name('admin.products.destroy');

Route::middleware(['auth', 'can:access-admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])
    ->name('admin.products.edit');

Route::put('/products/{product}', [AdminProductController::class, 'update'])
    ->name('admin.products.update');
        Route::get('/', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

        Route::get('/products', [AdminProductController::class, 'index'])
    ->name('admin.products.index');

    Route::post('/logout', [AuthController::class, 'logout'])
            ->name('admin.logout');
            Route::get('/products/create', [AdminProductController::class, 'create'])
    ->name('admin.products.create');

Route::post('/products', [AdminProductController::class, 'store'])
    ->name('admin.products.store');

    });