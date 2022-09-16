<?php

use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Client\ProductController;

use Illuminate\Support\Facades\Route;

Route::redirect('/', 'products');
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index')->name('products.index');
    Route::get('/{product}', 'show')->name('products.show');
});

Route::controller(ProductAdminController::class)->prefix('admin/products')->group(function () {
    Route::get('/', 'index')->name('admin.products.index');
    Route::get('/{product}', 'show')->name('admin.products.show');
    Route::post('/', 'store')->name('admin.products.store');
    Route::patch('/{product}', 'update')->name('admin.products.update');
    Route::post('/{product}/images', 'storeImages')->name('admin.products.images.store');
});




