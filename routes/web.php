<?php

use App\Http\Controllers\Guest\LandingController;
use App\Http\Controllers\Guest\ProductListController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/product', [ProductListController::class, 'index'])->name('product.index');
