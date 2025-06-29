<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nis', 'nama', 'kelas'];

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

}
