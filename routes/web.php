<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\product;

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