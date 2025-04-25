<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class product extends Controller
{
    public function list()
    {
        $data = [
            ['id' => 101, 'produk' => 'Laptop Gaming ASUS ROG'],
        ];

        return view('list_product', ['data' => $data]);
    }
}
