<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Siswa;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::with('siswa')->latest()->get();
        return view('prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('prestasi.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'tanggal' => 'required|date',
            'keterangan' => 'required',
        ]);

        Prestasi::create($request->all());
        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }
}
