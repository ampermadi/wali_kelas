<?php

namespace App\Http\Controllers\OrangTua;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrangTua;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        $siswa = Siswa::all();
        return view('orangtua.register', compact('siswa'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'email'     => 'required|email|unique:orang_tuas,email',
            'password'  => 'required|string|confirmed|min:6',
            'siswa_id'  => 'required|exists:siswas,id',
        ]);

        OrangTua::create([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'siswa_id'  => $request->siswa_id,
        ]);

        return redirect()->route('orangtua.login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }
}
