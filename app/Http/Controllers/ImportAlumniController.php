<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;

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
            'file_csv' => 'required|mimes:csv|max:10240',  // max:10240 berarti max 10MB
        ]);

        try {
            // Membaca file CSV
            $file = $request->file('file_csv');
            $data = array_map('str_getcsv', file($file));

            // Looping melalui data CSV dan menyimpannya ke database
            foreach ($data as $row) {
                // Skip header row (Baris pertama yang biasanya berisi nama kolom)
                if ($row[0] == 'NIM') continue;

                // Proses import data ke database
                Alumni::create([
                    'nim' => $row[0],  // NIM dari kolom pertama
                    'nama' => $row[1], // Nama dari kolom kedua
                    'tahun_masuk' => $row[2], // Tahun Masuk dari kolom ketiga
                    'tahun_lulus' => $row[3], // Tahun Lulus dari kolom keempat
                    'fakultas' => $row[4], // Fakultas dari kolom kelima
                    'program_studi' => $row[5], // Program Studi dari kolom keenam
                ]);
            }

            // Redirect ke halaman alumni.index dengan pesan sukses
            return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diimpor.');

        } catch (\Exception $e) {
            // Menangani error jika terjadi kesalahan pada proses import
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }
}
