<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

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