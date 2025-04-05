<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'id',
        'harga',
        'daftar_produk',
        'tanggal',
        'id_pelanggan',
    ];
    protected $table = "transaksi";
    public $timestamps = false;
}
