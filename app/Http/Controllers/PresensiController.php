<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Siswa;

class PresensiController extends Controller
{
    public function index()
    {
        $presensi = Presensi::with('siswa')->latest()->get();
        return view('presensi.index', compact('presensi'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('presensi.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpa',
        ]);

        Presensi::create($request->all());
        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil ditambahkan.');
    }
}
