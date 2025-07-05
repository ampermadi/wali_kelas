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

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $siswa = Siswa::all();
        return view('prestasi.edit', compact('prestasi', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'siswa_id' => 'required',
            'prestasi' => 'required|string|max:255',
        ]);

        Prestasi::where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'siswa_id' => $request->siswa_id,
            'prestasi' => $request->prestasi,
        ]);

        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Prestasi::destroy($id);
        return redirect()->route('prestasi.index')->with('success', 'Data prestasi berhasil dihapus.');
    }

}
