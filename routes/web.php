<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\product;
use App\Http\Controllers\ListProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/list_product', [product::class, 'list']);

Route::get('/home', function () {
    return view('pages.home');
});

// Fixed routes for product management
Route::get('/listproduk', [ListProdukController::class, 'show'])->name('produk.index');
Route::post('/listproduk', [ListProdukController::class, 'simpan'])->name('produk.simpan');
Route::delete('/listproduk/{id}', [ListProdukController::class, 'delete'])->name('produk.delete');
Route::put('/listproduk/{id}', [ListProdukController::class, 'update'])->name('produk.update');
Route::get('/listproduk/edit/{id}', [ListProdukController::class, 'edit'])->name('produk.edit');