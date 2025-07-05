@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Prestasi</h2>
    <a href="{{ route('prestasi.create') }}" class="btn btn-primary mb-3">Tambah Prestasi</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prestasi as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->siswa->nama }}</td>
                <td>{{ $p->tanggal }}</td>
                <td>{{ $p->keterangan }}</td>
                <td>
                <a href="{{ route('prestasi.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('prestasi.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
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
