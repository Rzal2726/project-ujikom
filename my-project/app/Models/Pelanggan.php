<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    public function transaksi(): HasMany{
        return $this->hasMany(Transaksi::class, 'id_pelanggan');
    }
    protected $fillable = [
        'id',
        'nama',
        'no_telp',
        'alamat',
    ];
    protected $table = "pelanggan";
    public $timestamps = false;
}
