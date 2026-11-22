<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'home'])
    ->name('home');

Route::get('/shop', [ProductController::class, 'index'])
    ->name('shop');

Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product.show');

Route::view('/contact', 'contact')
    ->name('contact');

Route::view('/cart', 'cart')
    ->name('cart');