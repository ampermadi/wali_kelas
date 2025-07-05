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

    public function edit($id)
    {
        $presensi = Presensi::findOrFail($id);
        $siswa = Siswa::all();
        return view('presensi.edit', compact('presensi', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'siswa_id' => 'required',
            'status' => 'required|in:Hadir,Izin,Sakit,Alpa',
        ]);

        Presensi::where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'siswa_id' => $request->siswa_id,
            'status' => $request->status,
        ]);

        return redirect()->route('presensi.index')->with('success', 'Data presensi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Presensi::destroy($id);
        return redirect()->route('presensi.index')->with('success', 'Data presensi berhasil dihapus.');
    }

}
