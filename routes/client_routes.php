<?php

use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\GoogleController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\EmailController;
use App\Mail\TestEmailTemplate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('client/layout-master', function (){
    return view('client.layout.master');
});

Route::get('client/home',[HomeController::class, 'index'])->name('client.home');

//Cart
Route::get('cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::get('cart/add-product-to-cart/{product}', [CartController::class, 'addProductToCart'])
->name('cart.add-product-to-cart')->middleware('auth');
Route::get('checkout', [CartController::class,'checkout'])->middleware('auth')->name('checkout');
Route::post('place-order', [CartController::class, 'placeOrder'])->name('client.cart.place-order')->middleware('auth');

//Google Sign In
Route::get('google/redirect', [GoogleController::class, 'redirect'])->name('client.google.redirect');
Route::get('google/callback', [GoogleController::class, 'callback'])->name('client.google.callback');


//Send Mail
Route::get('test-mail', function(){
    Mail::to('sotreduch26022001@gmail.com')->send(new TestEmailTemplate());
});
Route::get('/send-email', [EmailController::class, 'sendEmail']);
