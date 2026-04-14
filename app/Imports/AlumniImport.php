<?php

namespace App\Imports;

use App\Models\Alumni;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Collection;

class AlumniImport
{
    /**
     * Mengolah data Excel dan mengimpor ke database
     *
     * @param \Illuminate\Support\Collection $rows
     * @return void
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Skip header row jika ada (Baris pertama yang biasanya berisi nama kolom)
            if ($row['A'] == 'NIM') continue;

            // Proses import data ke database
            Alumni::updateOrCreate(
                ['nim' => $row['A']], // NIM dari kolom A
                [
                    'nama' => $row['B'] ?? null, // Nama dari kolom B
                    'tahun_masuk' => $row['C'] ?? null, // Tahun Masuk dari kolom C
                    'tahun_lulus' => $row['D'] ?? null, // Tahun Lulus dari kolom D
                    'fakultas' => $row['E'] ?? null, // Fakultas dari kolom E
                    'program_studi' => $row['F'] ?? null, // Program Studi dari kolom F
                    'status' => $row['G'] ?? 'Belum Ditemukan' // Status dari kolom G
                ]
            );
        }
    }

    /**
     * Membaca file Excel dan mengembalikan koleksi data
     *
     * @param string $filePath
     * @return \Illuminate\Support\Collection
     */
    public function loadFile($filePath)
    {
        // Membaca file Excel menggunakan PhpSpreadsheet
        $spreadsheet = IOFactory::load($filePath);

        // Mengambil data dari sheet pertama
        $sheet = $spreadsheet->getActiveSheet();

        // Mengubah data sheet ke array (Baris menjadi array)
        $rows = $sheet->toArray(null, true, true, true);

        // Mengembalikan koleksi data
        return collect($rows);
    }
}
