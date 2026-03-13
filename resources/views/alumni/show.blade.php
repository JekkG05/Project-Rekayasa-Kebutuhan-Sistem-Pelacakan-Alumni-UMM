@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Detail Alumni</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>NIM:</strong> {{ $alumni->nim }}</p>
            <p><strong>Nama:</strong> {{ $alumni->nama }}</p>
            <p><strong>Prodi:</strong> {{ $alumni->prodi }}</p>
            <p><strong>Fakultas:</strong> {{ $alumni->fakultas }}</p>
            <p><strong>Tahun Lulus:</strong> {{ $alumni->tahun_lulus }}</p>
            <p><strong>Kota:</strong> {{ $alumni->kota }}</p>
            <p><strong>Bidang:</strong> {{ $alumni->bidang }}</p>
            <p><strong>Status Pelacakan:</strong> {{ $alumni->status_pelacakan }}</p>

            <a href="{{ route('alumni.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
