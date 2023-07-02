<?php
Route::prefix('customer')->middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('customer.index');
    })->name('customer.dashboard');

});