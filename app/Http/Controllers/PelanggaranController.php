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

    public function edit($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $siswa = Siswa::all();
        return view('pelanggaran.edit', compact('pelanggaran', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'siswa_id' => 'required',
            'pelanggaran' => 'required|string|max:255',
        ]);

        Pelanggaran::where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'siswa_id' => $request->siswa_id,
            'pelanggaran' => $request->pelanggaran,
        ]);

        return redirect()->route('pelanggaran.index')->with('success', 'Data pelanggaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Pelanggaran::destroy($id);
        return redirect()->route('pelanggaran.index')->with('success', 'Data pelanggaran berhasil dihapus.');
    }

}
