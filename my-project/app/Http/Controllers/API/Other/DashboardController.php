<?php

namespace App\Http\Controllers\API\Other;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\LoginCounter;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getCounter()
    {
        $data = [
            'produk'     => Barang::count(),
            'transaksi'  => Transaksi::count(),
            'pelanggan'  => Pelanggan::count(),
            'login'      => LoginCounter::count(),
        ];
    
        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data'    => $data,
        ], 200);
    }
    
}
