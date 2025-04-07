<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    public function pelanggan(): BelongsTo{
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'id_admin');
    }
    protected $fillable = [
        'id',
        'harga',
        'daftar_produk',
        'tanggal',
        'id_pelanggan',
        'id_admin',
    ];
    protected $table = "transaksi";
    public $timestamps = false;
}
