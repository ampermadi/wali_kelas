@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Presensi</h3>

    <form action="{{ route('presensi.update', $presensi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="{{ $presensi->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="siswa_id" class="form-label">Nama Siswa</label>
            <select name="siswa_id" class="form-select" required>
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}" {{ $presensi->siswa_id == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option {{ $presensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                <option {{ $presensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                <option {{ $presensi->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                <option {{ $presensi->status == 'Alpa' ? 'selected' : '' }}>Alpa</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
