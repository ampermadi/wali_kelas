@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Orang Tua</h3>

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('orangtua.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Orang Tua</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email Orang Tua</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pilih Anak (Siswa)</label>
            <select name="siswa_id" class="form-select" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach ($siswa as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('orangtua.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
