<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'id',
        'nama_barang',
        'stok',
        'kategori',
        'harga',
    ];
    protected $table = "barang";
    public $timestamps = false;
}
