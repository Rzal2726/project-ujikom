<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    //
    public function barang(): HasMany{
        return $this->hasMany(Barang::class, 'id__kategori');
    }
    protected $fillable = [
        'id',
        'nama',
    ];
    protected $table = "kategori";
    public $timestamps = false;
}
