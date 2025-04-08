<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginCounter extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'id_user');
    }
    protected $fillable = [
        'id',
        'id_user',
        'tanggal',
        'ip',
    ];
    protected $table = "login_counter";
    public $timestamps = false;
}
