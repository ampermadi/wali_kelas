@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Pelanggaran</h3>

    <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="{{ $pelanggaran->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="siswa_id" class="form-label">Nama Siswa</label>
            <select name="siswa_id" class="form-select" required>
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}" {{ $pelanggaran->siswa_id == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pelanggaran" class="form-label">Pelanggaran</label>
            <input type="text" class="form-control" name="pelanggaran" value="{{ $pelanggaran->pelanggaran }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
