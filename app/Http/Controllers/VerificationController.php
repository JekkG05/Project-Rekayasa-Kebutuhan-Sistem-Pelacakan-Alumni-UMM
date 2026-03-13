<?php

namespace App\Http\Controllers;

use App\Models\TrackingResult;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        $trackingResults = TrackingResult::with('alumni')
            ->where('status_verifikasi', 'Perlu Verifikasi')
            ->latest()
            ->get();

        return view('verifikasi.index', compact('trackingResults'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'status_verifikasi' => 'required'
        ]);

        $trackingResult = TrackingResult::with('alumni')->findOrFail($id);

        $trackingResult->update([
            'status_verifikasi' => $request->status_verifikasi
        ]);

        if ($trackingResult->alumni) {
            $trackingResult->alumni->update([
                'status_pelacakan' => $request->status_verifikasi
            ]);
        }

        return redirect()->route('verifikasi.index')->with('success', 'Status verifikasi berhasil diperbarui');
    }
}
