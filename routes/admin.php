<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CollaboratorController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TypePaymentController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', HomeController::class)->name('index');
    Route::resource('collaborators', CollaboratorController::class)->parameters([
        'collaborators' => 'user'
    ])->except('show');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('type-payments', TypePaymentController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('orders', OrderController::class);

    Route::resource('configurations', ConfigurationController::class)->only('index', 'update');
});
