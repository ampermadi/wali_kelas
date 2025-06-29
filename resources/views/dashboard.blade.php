@extends('layouts.app')

@section('content')


<div class="container">
    <h2>Dashboard</h2>

    <form method="GET" action="{{ route('dashboard') }}" class="row mb-4">
    <div class="col-md-3">
        <label for="bulan" class="form-label">Pilih Bulan</label>
        <input type="month" name="bulan" id="bulan" class="form-control" value="{{ request('bulan') }}">
    </div>
    <div class="col-md-3">
        <label for="tanggal" class="form-label">Pilih Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ request('tanggal') }}">
    </div>
    <div class="col-md-3 align-self-end">
        <button class="btn btn-primary">Filter</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Reset</a>
    </div>
    </form>

    {{-- Kotak Informasi --}}
    <div class="row mt-4">
        <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Jumlah Siswa</h5>
                    <h3>{{ $jumlahSiswa }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Jumlah Prestasi</h5>
                    <h3>{{ $jumlahPrestasi }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Jumlah Pelanggaran</h5>
                    <h3>{{ $jumlahPelanggaran }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Jumlah Hadir</h5>
                    <h3>{{ $jumlahHadir }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5>Jumlah Izin</h5>
                    <h3>{{ $jumlahIzin }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h5>Jumlah Sakit</h5>
                    <h3>{{ $jumlahSakit }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5>Jumlah Alpa</h5>
                    <h3>{{ $jumlahAlpa }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-5">
    <h4>Grafik Lingkaran Kehadiran</h4>
    <canvas id="kehadiranChart"></canvas>
</div>

<div class="mt-5">
    <h4>Grafik Batang Total Siswa, Prestasi, Pelanggaran & Kehadiran</h4>
    <canvas id="statusChart"></canvas>
</div>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Grafik Lingkaran Kehadiran
    const ctx1 = document.getElementById('kehadiranChart').getContext('2d');
    new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Hadir', 'Izin', 'Sakit', 'Alpa'],
            datasets: [{
                data: [{{ $jumlahHadir }}, {{ $jumlahIzin }}, {{ $jumlahSakit }}, {{ $jumlahAlpa }}],
                backgroundColor: [
                    'rgba(40, 167, 69, 0.7)',
                    'rgba(255, 193, 7, 0.7)',
                    'rgba(23, 162, 184, 0.7)',
                    'rgba(220, 53, 69, 0.7)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } }
        }
    });

    // Grafik Batang Total Siswa, Prestasi, Pelanggaran & Kehadiran
    const ctx2 = document.getElementById('statusChart').getContext('2d');
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Siswa', 'Prestasi', 'Pelanggaran', 'Hadir', 'Izin', 'Sakit', 'Alpa'],
            datasets: [{
                label: 'Jumlah',
                data: [{{ $jumlahSiswa }}, {{ $jumlahPrestasi }}, {{ $jumlahPelanggaran }}, {{ $jumlahHadir }}, {{ $jumlahIzin }}, {{ $jumlahSakit }}, {{ $jumlahAlpa }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.7)',  // Siswa
                    'rgba(40, 167, 69, 0.7)',   // Prestasi
                    'rgba(220, 53, 69, 0.7)',   // Pelanggaran
                    'rgba(0, 123, 255, 0.7)',   // Hadir
                    'rgba(255, 193, 7, 0.7)',   // Izin
                    'rgba(23, 162, 184, 0.7)',  // Sakit
                    'rgba(108, 117, 125, 0.7)'  // Alpa
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endsection
