@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Prestasi</h3>

    <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="{{ $prestasi->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="siswa_id" class="form-label">Nama Siswa</label>
            <select name="siswa_id" class="form-select" required>
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}" {{ $prestasi->siswa_id == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="prestasi" class="form-label">Prestasi</label>
            <input type="text" class="form-control" name="prestasi" value="{{ $prestasi->prestasi }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
