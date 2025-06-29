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
                <th>Nama Siswa</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
        @foreach($prestasi as $p)
            <tr>
                <td>{{ $p->siswa->nama }}</td>
                <td>{{ $p->tanggal }}</td>
                <td>{{ $p->keterangan }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
