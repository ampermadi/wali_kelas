<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Siswa;

class PelanggaranController extends Controller
{
    public function index()
    {
        $pelanggaran = Pelanggaran::with('siswa')->latest()->get();
        return view('pelanggaran.index', compact('pelanggaran'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('pelanggaran.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal' => 'required|date',
            'keterangan' => 'required',
        ]);

        Pelanggaran::create($request->all());
        return redirect()->route('pelanggaran.index')->with('success', 'Pelanggaran berhasil ditambahkan.');
    }
}
