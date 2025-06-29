@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Presensi</h2>

    <form action="{{ route('presensi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="siswa_id" class="form-label">Nama Siswa</label>
            <select name="siswa_id" id="siswa_id" class="form-select" required>
                <option value="">Pilih Siswa</option>
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}">{{ $s->nama }} - {{ $s->nis }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpa">Alpa</option>
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
