<?php

use App\Http\Controllers\Cardapio\OrderController;
use App\Http\Controllers\Cardapio\CartController;
use App\Http\Controllers\Cardapio\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'menu.'], function() {
    Route::get('/', HomeController::class)->name('home');

    Route::get('cart', [CartController::class,'index'])->name('cart');
    Route::get('cart/add/{product}', [CartController::class,'store'])->name('cart.add');
    Route::get('cart/remove/{index}', [CartController::class,'destroy'])->name('cart.remove');

    Route::post('cart/checkout',[OrderController::class, 'store'])->name('cart.checkout');
});
