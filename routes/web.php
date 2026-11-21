<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('/shop', 'shop')->name('shop');

Route::view('/contact', 'contact')->name('contact');

Route::view('/cart', 'cart')->name('cart');