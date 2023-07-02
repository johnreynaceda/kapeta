<?php
Route::prefix('seller')->middleware(['auth'])->group(function(){

Route::get('/dashboard', function(){
return view('seller.index');
})->name('seller.dashboard');
Route::get('/product', function(){
    return view('seller.product.index');
    })->name('seller.product');


});
