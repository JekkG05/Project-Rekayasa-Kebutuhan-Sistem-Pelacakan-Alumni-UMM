<?php

namespace App\Imports;

use App\Models\Alumni;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumniImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $tanggalLulus = null;
            $tahunLulus = null;

            if (!empty($row['tanggal_lulus'])) {
                try {
                    $tanggalLulus = Carbon::parse($row['tanggal_lulus'])->format('Y-m-d');
                    $tahunLulus = Carbon::parse($row['tanggal_lulus'])->format('Y');
                } catch (\Throwable $e) {
                    $tanggalLulus = null;
                    $tahunLulus = null;
                }
            }

            Alumni::updateOrCreate(
                ['nim' => $row['nim'] ?? null],
                [
                    'nama' => $row['nama_lulusan'] ?? null,
                    'tahun_masuk' => $row['tahun_masuk'] ?? null,
                    'tanggal_lulus' => $tanggalLulus,
                    'tahun_lulus' => $tahunLulus,
                    'fakultas' => $row['fakultas'] ?? null,
                    'prodi' => $row['program_studi'] ?? null,
                    'status' => 'Belum Ditelusuri',
                ]
            );
        }
    }
}
