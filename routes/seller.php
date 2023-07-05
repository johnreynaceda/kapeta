<?php
Route::prefix('seller')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('seller.index');
    })->name('seller.dashboard');
    Route::get('/product', function () {
        return view('seller.product.index');
    })->name('seller.product');

    Route::get('/orders', function () {
        return view('seller.order.index');
    })->name('seller.order');

    Route::get('/orders/{id}', function () {
        return view('seller.order.manage');
    })->name('seller.order-manage');

    Route::get('/profile', function () {
        return view('seller.profile');
    })->name('seller.profile');

});