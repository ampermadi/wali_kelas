@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="text-center">
        <h1 class="mb-4">Selamat Datang di Aplikasi Wali Kelas</h1>
        <p class="lead mb-5">Silakan pilih jenis login sesuai kebutuhan Anda</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="card shadow-lg h-100 text-center border-primary">
                <div class="card-body">
                    <h4 class="card-title text-primary mb-3">Login Admin</h4>
                    <p class="card-text">Khusus untuk guru wali kelas sebagai admin pengelola data siswa, presensi, pelanggaran, dan prestasi.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3">Login Admin</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-lg h-100 text-center border-success">
                <div class="card-body">
                    <h4 class="card-title text-success mb-3">Login Orang Tua</h4>
                    <p class="card-text">Untuk orang tua melihat data kehadiran, prestasi, dan pelanggaran anak secara mandiri.</p>
                    <a href="{{ route('orangtua.login') }}" class="btn btn-success btn-lg mt-3">Login Orang Tua</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
