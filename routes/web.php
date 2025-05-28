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

Route::get('/listproduk', [ListProdukController::class, 'show']);
Route::post('/listproduk', [ListProdukController::class, 'simpan'])->name('produk.simpan');