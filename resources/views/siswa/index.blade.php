@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Siswa</h2>
    <a href="{{ route('siswa.create') }}" class="btn btn-success mb-3">Tambah Siswa</a>
    <a href="{{ route('siswa.cetak-pdf') }}" class="btn btn-danger mb-3">Cetak PDF</a>
    <a href="{{ route('siswa.export-excel') }}" class="btn btn-success mb-3">Export Excel</a>

    <form action="{{ route('siswa.import-excel') }}" method="POST" enctype="multipart/form-data" class="mb-3">
    @csrf
    <div class="row g-2">
        <div class="col-md-4">
            <input type="file" name="file" class="form-control" required>
        </div>
        <div class="col-md-2">
            <button class="btn btn-success">Import Excel</button>
        </div>
    </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
        @foreach ($siswa as $s)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $s->nis }}</td>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->kelas }}</td>
            <td>
                <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
