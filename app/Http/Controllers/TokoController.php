<?php

namespace App\Http\Controllers;

use App\Models\MerchandiseProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TokoController extends Controller
{
    public function index()
    {
        $data = Cache::tags(['toko_page', 'merchandise'])->remember('toko_data', 3600, function () {
            $produk = MerchandiseProduct::all();
            return [
                'produk' => $produk
            ];
        });
        return view('pages.toko', $data);
    }
}
