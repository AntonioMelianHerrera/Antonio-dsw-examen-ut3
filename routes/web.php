<!--Antonio Miguel Melián Herrera-->
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

//modificamos la ruta raíz para que lleve a home
Route::get('/', function () {
    return view('home');
});

//ruta para llegar al formulario de product
Route::get('/product', function () {
    return view('product');
});

Route::post('/product/store', [ProductController::class, 'create'])->name('product.store');

Route::get('/product/store', [ProductController::class, 'store'])->name('product.store');