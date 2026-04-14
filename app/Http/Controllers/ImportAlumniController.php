<?php

namespace App\Http\Controllers;

use App\Imports\AlumniImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
            // Proses import menggunakan Maatwebsite Excel dengan chunking
            Excel::import(new AlumniImport, $request->file('file_excel'))->chunkSize(1000);  // Menentukan ukuran chunk

            // Redirect ke halaman alumni.index dengan pesan sukses
            return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diimpor.');

        } catch (\Exception $e) {
            // Menangani error jika terjadi kesalahan pada proses import
            return back()->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }
}
