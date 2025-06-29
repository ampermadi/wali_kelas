@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Presensi</h2>
    <a href="{{ route('presensi.create') }}" class="btn btn-primary mb-3">Tambah Presensi</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($presensi as $p)
            <tr>
                <td>{{ $p->siswa->nama }}</td>
                <td>{{ $p->tanggal }}</td>
                <td>{{ $p->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
