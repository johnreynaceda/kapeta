<?php
Route::prefix('seller')->middleware(['auth'])->group(function(){

Route::get('/dashboard', function(){
return view('seller.index');
})->name('seller.dashboard');


});
