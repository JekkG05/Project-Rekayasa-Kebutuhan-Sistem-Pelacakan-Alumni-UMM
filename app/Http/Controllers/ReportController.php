<?php

namespace App\Http\Controllers;

use App\Models\Alumni;

class ReportController extends Controller
{
    public function index()
    {
        $totalAlumni = Alumni::count();
        $teridentifikasi = Alumni::where('status_pelacakan', 'Teridentifikasi')->count();
        $perluVerifikasi = Alumni::where('status_pelacakan', 'Perlu Verifikasi')->count();
        $belumDitemukan = Alumni::where('status_pelacakan', 'Belum Ditemukan')->count();
        $alumni = Alumni::latest()->get();

        return view('laporan.index', compact(
            'totalAlumni',
            'teridentifikasi',
            'perluVerifikasi',
            'belumDitemukan',
            'alumni'
        ));
    }
}
