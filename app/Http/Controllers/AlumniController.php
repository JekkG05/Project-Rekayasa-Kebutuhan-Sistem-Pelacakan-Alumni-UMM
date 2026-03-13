<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::latest()->get();
        return view('alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:alumni,nim',
            'nama' => 'required',
            'prodi' => 'required',
            'fakultas' => 'required',
            'tahun_lulus' => 'required',
            'kota' => 'nullable',
            'bidang' => 'nullable',
        ]);

        Alumni::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'fakultas' => $request->fakultas,
            'tahun_lulus' => $request->tahun_lulus,
            'kota' => $request->kota,
            'bidang' => $request->bidang,
            'status_pelacakan' => 'Belum Ditemukan',
        ]);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('alumni.show', compact('alumni'));
    }

    public function edit(string $id)
    {
        $alumni = Alumni::findOrFail($id);
        return view('alumni.edit', compact('alumni'));
    }

    public function update(Request $request, string $id)
    {
        $alumni = Alumni::findOrFail($id);

        $request->validate([
            'nim' => 'required|unique:alumni,nim,' . $alumni->id,
            'nama' => 'required',
            'prodi' => 'required',
            'fakultas' => 'required',
            'tahun_lulus' => 'required',
            'kota' => 'nullable',
            'bidang' => 'nullable',
            'status_pelacakan' => 'required',
        ]);

        $alumni->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'fakultas' => $request->fakultas,
            'tahun_lulus' => $request->tahun_lulus,
            'kota' => $request->kota,
            'bidang' => $request->bidang,
            'status_pelacakan' => $request->status_pelacakan,
        ]);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->delete();

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil dihapus');
    }
}
