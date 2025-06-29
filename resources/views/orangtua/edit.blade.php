@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Data Orang Tua</h3>

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('orangtua.update', $orangtua->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Orang Tua</label>
            <input type="text" name="nama" class="form-control" value="{{ $orangtua->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Email Orang Tua</label>
            <input type="email" name="email" class="form-control" value="{{ $orangtua->email }}" required>
        </div>

        <div class="mb-3">
            <label>Password Baru (Kosongkan jika tidak ganti)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Pilih Anak (Siswa)</label>
            <select name="siswa_id" class="form-select" required>
                <option value="">-- Pilih Siswa --</option>
                @foreach ($siswa as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $orangtua->siswa_id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('orangtua.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
