@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pelanggaran</h2>

    <form action="{{ route('pelanggaran.store') }}" method="POST">
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
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
