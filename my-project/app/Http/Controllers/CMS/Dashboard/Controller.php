<?php

namespace App\Http\Controllers\CMS\Dashboard;

use App\Http\Controllers\Controller as controllers;
use Illuminate\Http\Request;

class Controller extends controllers
{
    //
    public function HomeScreen(){
        return view('body.home')->with('isHome',true);
    }
    public function UserScreen(){
        return view('body.user')->with('isUser',true);
    }
    public function ProdukScreen(){
        return view('body.produk')->with('isProduk',true);
    }
    public function PelangganScreen(){
        return view('body.pelanggan')->with('isPelanggan',true);
    }
    public function TransaksiScreen(){
        return view('body.transaksi')->with('isTransaksi',true);
    }
}
