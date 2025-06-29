<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class OrangTua extends Authenticatable
{
    protected $table = 'orang_tuas';

    protected $fillable = [
        'nama', 'email', 'password', 'siswa_id'
    ];

    protected $hidden = [
        'password',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
