<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $orangTua = auth('orangtua')->user();
        $siswa = $orangTua->siswa;
        $presensi = $siswa->presensi;
        $pelanggaran = $siswa->pelanggaran;
        $prestasi = $siswa->prestasi;

        return view('orangtua.dashboard', compact('siswa', 'presensi', 'pelanggaran', 'prestasi'));
    }
}
