@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="umm-hero mb-4">
        <div class="umm-hero-content d-flex align-items-center">
            <img src="{{ asset('images/logo-umm.png') }}" alt="Logo UMM" height="70" class="me-3">
            <div>
                <h2>Dashboard Sistem Pelacakan Alumni</h2>
                <p>Universitas Muhammadiyah Malang · Monitoring alumni dari berbagai sumber publik secara terstruktur</p>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="stats-card stats-primary">
                <div class="stats-label">Total Alumni</div>
                <div class="stats-value">{{ $totalAlumni }}</div>
                <p class="stats-desc">Jumlah seluruh data alumni yang tersimpan.</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card stats-success">
                <div class="stats-label">Teridentifikasi</div>
                <div class="stats-value">{{ $teridentifikasi }}</div>
                <p class="stats-desc">Alumni yang telah terdeteksi dari sumber publik.</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card stats-warning">
                <div class="stats-label">Perlu Verifikasi</div>
                <div class="stats-value">{{ $perluVerifikasi }}</div>
                <p class="stats-desc">Data perlu diperiksa ulang oleh admin.</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card stats-danger">
                <div class="stats-label">Belum Ditemukan</div>
                <div class="stats-value">{{ $belumDitemukan }}</div>
                <p class="stats-desc">Belum ada hasil pencarian yang relevan.</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="umm-box h-100">
                <h5>Informasi Sistem</h5>
                <p class="mb-3">
                    Sistem Pelacakan Alumni digunakan untuk membantu pihak kampus memantau keberadaan alumni berdasarkan
                    data yang ditemukan dari berbagai sumber publik seperti LinkedIn, ResearchGate, Google Scholar,
                    GitHub, dan website perusahaan.
                </p>
                <p class="mb-0 umm-subtle">
                    Sistem ini memanfaatkan pendekatan confidence score untuk mendukung proses identifikasi, verifikasi manual,
                    serta pelaporan status alumni secara lebih sistematis.
                </p>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="umm-box quick-menu h-100">
                <h5>Menu Cepat</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('alumni.index') }}" class="btn btn-umm">Kelola Data Alumni</a>
                    <a href="{{ route('tracking-results.index') }}" class="btn btn-outline-umm">Hasil Pelacakan</a>
                    <a href="{{ route('verifikasi.index') }}" class="btn btn-outline-umm">Verifikasi Manual</a>
                    <a href="{{ route('laporan.index') }}" class="btn btn-outline-umm">Lihat Laporan</a>
                </div>
            </div>
        </div>
    </div>

    <div class="umm-footer">
        Sistem Pelacakan Alumni · Universitas Muhammadiyah Malang
    </div>
</div>
@endsection
