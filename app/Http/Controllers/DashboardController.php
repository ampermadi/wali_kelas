<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Presensi;
use App\Models\Prestasi;
use App\Models\Pelanggaran;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $bulan = request('bulan');
        $tanggal = request('tanggal');

        $queryPresensi = Presensi::query();
        $queryPrestasi = Prestasi::query();
        $queryPelanggaran = Pelanggaran::query();

        if ($bulan) {
            $queryPresensi->whereMonth('tanggal', substr($bulan, 5, 2))
                        ->whereYear('tanggal', substr($bulan, 0, 4));
            $queryPrestasi->whereMonth('tanggal', substr($bulan, 5, 2))
                        ->whereYear('tanggal', substr($bulan, 0, 4));
            $queryPelanggaran->whereMonth('tanggal', substr($bulan, 5, 2))
                            ->whereYear('tanggal', substr($bulan, 0, 4));
        }

        if ($tanggal) {
            $queryPresensi->whereDate('tanggal', $tanggal);
            $queryPrestasi->whereDate('tanggal', $tanggal);
            $queryPelanggaran->whereDate('tanggal', $tanggal);
        }

        $jumlahSiswa = Siswa::count();
        $jumlahHadir = (clone $queryPresensi)->where('status', 'Hadir')->count();
        $jumlahIzin = (clone $queryPresensi)->where('status', 'Izin')->count();
        $jumlahSakit = (clone $queryPresensi)->where('status', 'Sakit')->count();
        $jumlahAlpa = (clone $queryPresensi)->where('status', 'Alpa')->count();
        $jumlahPrestasi = $queryPrestasi->count();
        $jumlahPelanggaran = $queryPelanggaran->count();

        return view('dashboard', compact(
            'jumlahSiswa', 'jumlahHadir', 'jumlahIzin', 'jumlahSakit',
            'jumlahAlpa', 'jumlahPrestasi', 'jumlahPelanggaran', 'bulan', 'tanggal'
        ));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}