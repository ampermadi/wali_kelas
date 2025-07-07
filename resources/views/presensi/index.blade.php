@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Presensi</h2>
    <a href="{{ route('presensi.create') }}" class="btn btn-primary mb-3">Tambah Presensi</a>
    <a href="{{ route('presensi.massal') }}" class="btn btn-primary mb-3">Input Presensi Massal</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('presensi.import-excel') }}" method="POST" enctype="multipart/form-data" class="d-flex mb-3">
        @csrf
        <input type="file" name="file" class="form-control me-2" required>
        <button class="btn btn-primary">Import Excel</button>
    </form>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($presensi as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->siswa->nama }}</td>
                <td>{{ $p->tanggal }}</td>
                <td>{{ $p->status }}</td>
                <td>
                    <a href="{{ route('presensi.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('presensi.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
