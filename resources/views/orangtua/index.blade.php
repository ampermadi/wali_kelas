@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Orang Tua</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('orangtua.create') }}" class="btn btn-primary mb-3">Tambah Orang Tua</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Orang Tua</th>
                <th>Email</th>
                <th>Nama Anak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orangtua as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->siswa->nama ?? '-' }}</td>
                    <td>
                        <a href="{{ route('orangtua.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('orangtua.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
