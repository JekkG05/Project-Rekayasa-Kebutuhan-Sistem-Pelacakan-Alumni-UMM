<?php

namespace App\Imports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class AlumniImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Validasi data yang ada pada setiap baris, jika perlu
            Alumni::updateOrCreate(
                ['nim' => $row['nim']],
                [
                    'nama' => $row['nama_lulusan'] ?? null,
                    'tahun_masuk' => $row['tahun_masuk'] ?? null,
                    'tahun_lulus' => $row['tahun_lulus'] ?? null,
                    'fakultas' => $row['fakultas'] ?? null,
                    'program_studi' => $row['program_studi'] ?? null,
                    'status' => $row['status'] ?? 'Belum Ditemukan'
                ]
            );
        }
    }
}
