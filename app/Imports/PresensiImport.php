<?php

namespace App\Imports;

use App\Models\Presensi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PresensiImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index == 0) continue; // Lewati header

            Presensi::create([
                'siswa_id' => $row[0],   // Kolom pertama: ID Siswa
                'tanggal'  => $row[1],   // Kolom kedua: Tanggal
                'status'   => $row[2],   // Kolom ketiga: Status (Hadir/Izin/Sakit/Alpa)
            ]);
        }
    }
}
