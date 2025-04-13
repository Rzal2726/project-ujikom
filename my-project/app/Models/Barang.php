<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    public function kategori(): BelongsTo{
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    protected $fillable = [
        'id',
        'nama_barang',
        'stok',
        'id_kategori',
        'harga',
    ];
    protected $table = "barang";
    public $timestamps = false;
}
