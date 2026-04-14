<?php

namespace App\Imports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumniImport implements ToModel
{
    // Fungsi untuk mengonversi baris Excel menjadi model Alumni
    public function model(array $row)
    {
        // Sesuaikan kolom dengan nama kolom yang ada di file Excel
        return new Alumni([
            'nim' => $row['nim'],               // Misal nim ada di kolom pertama
            'nama' => $row['nama_lulusan'],      // Nama alumni di kolom kedua
            'tahun_masuk' => $row['tahun_masuk'], // Tahun masuk di kolom ketiga
            'tanggal_lulus' => $row['tanggal_lulus'], // Tanggal lulus di kolom keempat
            'fakultas' => $row['fakultas'],      // Fakultas di kolom kelima
            'program_studi' => $row['program_studi'], // Program studi di kolom keenam
        ]);
    }
}
