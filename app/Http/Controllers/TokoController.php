<?php

namespace App\Http\Controllers;

use App\Models\MerchandiseProduct;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $produk = MerchandiseProduct::all();
        $data = [
            'produk' => $produk
        ];
        return view('pages.toko', $data);
    }
}