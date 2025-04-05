<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'nama',
        'no_telp',
        'alamat',
    ];
    protected $table = "pelanggan";
    public $timestamps = false;
}
