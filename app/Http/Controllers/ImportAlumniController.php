<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Alumni;
use Illuminate\Support\Facades\Log;

class ImportAlumniController extends Controller
{
    // Fungsi untuk menampilkan form import alumni
    public function index()
    {
        return view('alumni.import');
    }

    // Fungsi untuk menangani proses import alumni
    public function store(Request $request)
    {
        // Validasi file yang di-upload
        $request->validate([
            'file_excel' => 'required|mimes:xlsx,xls,csv|max:10240',  // max:10240 berarti max 10MB
        ]);

        try {
            // Membaca file Excel
            $file = $request->file('file_excel');
            $spreadsheet = IOFactory::load($file);  // Memuat file Excel

            // Mengambil data dari sheet pertama
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray(null, true, true, true);  // Mengambil data dalam bentuk array

            // Proses untuk menyimpan data ke database
            foreach ($rows as $row) {
                // Skip header row (Baris pertama yang biasanya berisi nama kolom)
                if ($row['A'] == 'NIM') continue;

                // Debug: Log data yang diambil dari Excel
                Log::info('Row data: ', $row);

                // Validasi data sebelum disimpan
                if (empty($row['A']) || empty($row['B']) || empty($row['C'])) {
                    continue;  // Lewati baris jika data NIM, Nama, atau Tahun Masuk kosong
                }

                // Proses import data ke database
                Alumni::create([
                    'nim' => $row['A'],  // NIM dari kolom A
                    'nama' => $row['B'], // Nama dari kolom B
                    'tahun_masuk' => $row['C'], // Tahun Masuk dari kolom C
                    'tahun_lulus' => $row['D'], // Tahun Lulus dari kolom D
                    'fakultas' => $row['E'], // Fakultas dari kolom E
                    'program_studi' => $row['F'], // Program Studi dari kolom F
                ]);
            }

            // Redirect ke halaman alumni.index dengan pesan sukses
            return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diimpor.');

        } catch (\Exception $e) {
            // Menangani error jika terjadi kesalahan pada proses import
            Log::error('Error during alumni import: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }
}
