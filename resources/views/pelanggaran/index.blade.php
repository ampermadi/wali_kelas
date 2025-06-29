@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Pelanggaran</h2>
    <a href="{{ route('pelanggaran.create') }}" class="btn btn-primary mb-3">Tambah Pelanggaran</a>

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
            </tr>
        </thead>
        <tbody>
        @foreach($pelanggaran as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->siswa->nama }}</td>
                <td>{{ $p->tanggal }}</td>
                <td>{{ $p->keterangan }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
