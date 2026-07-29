<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/checkout/payment', function () {
    return view('payment');
});

Route::get('/checkout/success', function () {
    return view('success');
});


