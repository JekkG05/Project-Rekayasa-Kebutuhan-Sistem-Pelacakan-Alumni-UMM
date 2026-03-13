<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\TrackingResult;
use Illuminate\Http\Request;

class TrackingResultController extends Controller
{
    public function index()
    {
        $trackingResults = TrackingResult::with('alumni')->latest()->get();
        return view('tracking-results.index', compact('trackingResults'));
    }

    public function create()
    {
        $alumni = Alumni::latest()->get();
        return view('tracking-results.create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumni_id' => 'required|exists:alumni,id',
            'sumber' => 'required|string|max:255',
            'link' => 'nullable|url|max:255',
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'confidence_score' => 'required|integer|min:0|max:100',
            'tanggal_ditemukan' => 'required|date',
        ]);

        $statusVerifikasi = $this->getStatusByScore((int) $request->confidence_score);

        $tracking = TrackingResult::create([
            'alumni_id' => $request->alumni_id,
            'sumber' => $request->sumber,
            'link' => $request->link,
            'judul' => $request->judul,
            'ringkasan' => $request->ringkasan,
            'confidence_score' => $request->confidence_score,
            'status_verifikasi' => $statusVerifikasi,
            'tanggal_ditemukan' => $request->tanggal_ditemukan,
        ]);

        $this->syncAlumniStatus($tracking->alumni_id);

        return redirect()
            ->route('tracking-results.index')
            ->with('success', 'Hasil pelacakan berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $trackingResult = TrackingResult::with('alumni')->findOrFail($id);
        return view('tracking-results.show', compact('trackingResult'));
    }

    public function edit(string $id)
    {
        $trackingResult = TrackingResult::with('alumni')->findOrFail($id);
        $alumni = Alumni::latest()->get();

        return view('tracking-results.edit', compact('trackingResult', 'alumni'));
    }

    public function update(Request $request, string $id)
    {
        $trackingResult = TrackingResult::findOrFail($id);
        $oldAlumniId = $trackingResult->alumni_id;

        $request->validate([
            'alumni_id' => 'required|exists:alumni,id',
            'sumber' => 'required|string|max:255',
            'link' => 'nullable|url|max:255',
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'confidence_score' => 'required|integer|min:0|max:100',
            'tanggal_ditemukan' => 'required|date',
        ]);

        $statusVerifikasi = $this->getStatusByScore((int) $request->confidence_score);

        $trackingResult->update([
            'alumni_id' => $request->alumni_id,
            'sumber' => $request->sumber,
            'link' => $request->link,
            'judul' => $request->judul,
            'ringkasan' => $request->ringkasan,
            'confidence_score' => $request->confidence_score,
            'status_verifikasi' => $statusVerifikasi,
            'tanggal_ditemukan' => $request->tanggal_ditemukan,
        ]);

        // Sinkronkan status alumni lama
        $this->syncAlumniStatus($oldAlumniId);

        // Sinkronkan status alumni baru
        if ((int) $oldAlumniId !== (int) $request->alumni_id) {
            $this->syncAlumniStatus((int) $request->alumni_id);
        }

        return redirect()
            ->route('tracking-results.index')
            ->with('success', 'Hasil pelacakan berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $trackingResult = TrackingResult::findOrFail($id);
        $alumniId = $trackingResult->alumni_id;

        $trackingResult->delete();

        $this->syncAlumniStatus($alumniId);

        return redirect()
            ->route('tracking-results.index')
            ->with('success', 'Hasil pelacakan berhasil dihapus');
    }

    private function getStatusByScore(int $score): string
    {
        if ($score >= 80) {
            return 'Teridentifikasi';
        }

        if ($score >= 50) {
            return 'Perlu Verifikasi';
        }

        return 'Belum Ditemukan';
    }

    private function syncAlumniStatus(int $alumniId): void
    {
        $alumni = Alumni::find($alumniId);

        if (!$alumni) {
            return;
        }

        $maxScore = TrackingResult::where('alumni_id', $alumniId)->max('confidence_score');

        if ($maxScore === null) {
            $alumni->update([
                'status_pelacakan' => 'Belum Ditemukan'
            ]);
            return;
        }

        $alumni->update([
            'status_pelacakan' => $this->getStatusByScore((int) $maxScore)
        ]);
    }
}
