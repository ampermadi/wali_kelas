<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    public function create() {
        return view('siswa.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nis' => 'required|unique:siswas',
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        Siswa::create($request->all());
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa) {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa) {
        $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $siswa->id,
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        $siswa->update($request->all());
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa) {
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function cetakPdf()
    {
        $siswa = Siswa::all();
        $pdf = Pdf::loadView('siswa.cetak', compact('siswa'));
        return $pdf->download('data-siswa.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new SiswaExport, 'data-siswa.xlsx');
    }
}
