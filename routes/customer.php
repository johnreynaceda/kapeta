<?php
Route::prefix('customer')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('customer.index');
    })->name('customer.dashboard');
    Route::get('/shops/{name}', function () {
        return view('customer.shop.index');
    })->name('customer.shop');

    //cart
    Route::get('/cart', function () {
        return view('customer.cart');
    })->name('customer.cart');

});
