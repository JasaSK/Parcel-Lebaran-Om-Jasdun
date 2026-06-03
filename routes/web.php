<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Guest\LandingController;
use App\Http\Controllers\Guest\ProductListController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/product', [ProductListController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductListController::class, 'detail'])->name('product.detail');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::get('admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::put('admin/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::delete('admin/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product.index');
