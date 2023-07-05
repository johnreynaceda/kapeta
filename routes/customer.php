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

    Route::get('/checkout', function () {
        return view('customer.checkout');
    })->name('customer.checkout');

    Route::get('/placed-order', function () {
        return view('customer.place-order');
    })->name('customer.place-order');

    Route::get('/my-orders', function () {
        return view('customer.my-order');
    })->name('customer.my-order');

    Route::get('/my-profille', function () {
        return view('customer.profile');
    })->name('customer.profile');

    Route::get('/locate-shops', function () {
        return view('customer.locate-shops');
    })->name('customer.location');

});