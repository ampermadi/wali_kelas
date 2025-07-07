@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Input Presensi Massal</h3>

    <div class="mb-3">
        <label for="pilihSemua" class="form-label">Pilih Semua Status</label>
        <select id="pilihSemua" class="form-select" style="max-width: 300px;">
            <option value="">-- Pilih --</option>
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
            <option value="Alpa">Alpa</option>
        </select>
    </div>

    <form action="{{ route('presensi.storeMassal') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $index => $s)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>
                            <select name="status[{{ $s->id }}]" class="form-select status-presensi" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Hadir">Hadir</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                                <option value="Alpa">Alpa</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Simpan Presensi</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('pilihSemua').addEventListener('change', function() {
    const semuaStatus = document.querySelectorAll('.status-presensi');
    semuaStatus.forEach(function(select) {
        select.value = event.target.value;
    });
});
</script>
@endsection
