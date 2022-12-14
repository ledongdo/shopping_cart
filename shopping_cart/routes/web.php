<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('product-index');
Route::get('/products/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add-to-cart');
Route::get('/products/show-cart', [ProductController::class, 'showCart'])->name('show-cart');
Route::get('/products/update-cart', [ProductController::class, 'updateCart'])->name('update-cart');
