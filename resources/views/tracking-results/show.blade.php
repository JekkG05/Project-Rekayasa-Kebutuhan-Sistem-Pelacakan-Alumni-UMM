@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Detail Hasil Pelacakan</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama Alumni:</strong> {{ $trackingResult->alumni->nama ?? '-' }}</p>
            <p><strong>Sumber:</strong> {{ $trackingResult->sumber }}</p>
            <p><strong>Link:</strong>
                @if($trackingResult->link)
                    <a href="{{ $trackingResult->link }}" target="_blank">{{ $trackingResult->link }}</a>
                @else
                    -
                @endif
            </p>
            <p><strong>Judul:</strong> {{ $trackingResult->judul }}</p>
            <p><strong>Ringkasan:</strong> {{ $trackingResult->ringkasan }}</p>
            <p><strong>Confidence Score:</strong> {{ $trackingResult->confidence_score }}</p>
            <p><strong>Status Verifikasi:</strong> {{ $trackingResult->status_verifikasi }}</p>
            <p><strong>Tanggal Ditemukan:</strong> {{ $trackingResult->tanggal_ditemukan }}</p>

            <a href="{{ route('tracking-results.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
