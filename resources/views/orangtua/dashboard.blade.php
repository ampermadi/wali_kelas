@extends('orangtua.layout')

@section('content')
<h3>Selamat Datang, {{ auth('orangtua')->user()->nama }}</h3>
<p>Data Anak: <strong>{{ $siswa->nama }}</strong></p>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header bg-success text-white">Presensi</div>
            <div class="card-body">
                @foreach ($presensi as $item)
                    <p>{{ $item->tanggal }} - {{ ucfirst($item->status) }}</p>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header bg-warning text-dark">Pelanggaran</div>
            <div class="card-body">
                @foreach ($pelanggaran as $item)
                    <p>{{ $item->jenis }} - {{ $item->keterangan }}</p>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header bg-info text-white">Prestasi</div>
            <div class="card-body">
                @foreach ($prestasi as $item)
                    <p>{{ $item->jenis }} - {{ $item->keterangan }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
