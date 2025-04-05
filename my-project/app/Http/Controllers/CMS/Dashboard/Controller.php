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
        return view('body.home')->with('isUser',true);
    }
    public function ProdukScreen(){
        return view('body.home')->with('isProduk',true);
    }
    public function PelangganScreen(){
        return view('body.home')->with('isPelanggan',true);
    }
    public function TransaksiScreen(){
        return view('body.home')->with('isTransaksi',true);
    }
}
