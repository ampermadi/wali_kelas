<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrangTuaController extends Controller
{
    public function index()
    {
        $orangtua = OrangTua::with('siswa')->get();
        return view('orangtua.index', compact('orangtua'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        return view('orangtua.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'email'     => 'required|email|unique:orang_tuas,email',
            'password'  => 'required|string|min:6',
            'siswa_id'  => 'required|exists:siswas,id',
        ]);

        OrangTua::create([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'siswa_id'  => $request->siswa_id,
        ]);

        return redirect()->route('orangtua.index')->with('success', 'Data Orang Tua berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $orangtua = OrangTua::findOrFail($id);
        $siswa = Siswa::all();
        return view('orangtua.edit', compact('orangtua', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $orangtua = OrangTua::findOrFail($id);

        $request->validate([
            'nama'      => 'required|string|max:255',
            'email'     => 'required|email|unique:orang_tuas,email,' . $orangtua->id,
            'password'  => 'nullable|string|min:6',
            'siswa_id'  => 'required|exists:siswas,id',
        ]);

        $orangtua->nama = $request->nama;
        $orangtua->email = $request->email;
        $orangtua->siswa_id = $request->siswa_id;

        if ($request->filled('password')) {
            $orangtua->password = Hash::make($request->password);
        }

        $orangtua->save();

        return redirect()->route('orangtua.index')->with('success', 'Data Orang Tua berhasil diupdate.');
    }

    public function destroy($id)
    {
        OrangTua::destroy($id);
        return redirect()->route('orangtua.index')->with('success', 'Data Orang Tua berhasil dihapus.');
    }
}
