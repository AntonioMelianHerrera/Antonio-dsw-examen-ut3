<?php

use Illuminate\Support\Facades\Route;

Route::post('/product', [ProductController::class, 'store'])->name('product.store');
