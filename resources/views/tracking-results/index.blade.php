@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="mb-4">
        <h2 class="umm-section-title">Hasil Pelacakan Alumni</h2>
        <p class="umm-subtle">Daftar hasil pencarian alumni dari berbagai sumber publik yang telah direkam sistem.</p>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div></div>
        <a href="{{ route('tracking-results.create') }}" class="btn btn-umm">+ Tambah Hasil Pelacakan</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-4 shadow-sm border-0">
            {{ session('success') }}
        </div>
    @endif

    <div class="umm-table-wrap">
        <table class="table umm-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alumni</th>
                    <th>Sumber</th>
                    <th>Judul</th>
                    <th>Confidence</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th width="230">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($trackingResults as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->alumni->nama ?? '-' }}</td>
                        <td>{{ $item->sumber }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->confidence_score }}</td>
                        <td>
                            @if($item->status_verifikasi == 'Teridentifikasi')
                                <span class="umm-badge badge-teridentifikasi">Teridentifikasi</span>
                            @elseif($item->status_verifikasi == 'Perlu Verifikasi')
                                <span class="umm-badge badge-verifikasi">Perlu Verifikasi</span>
                            @else
                                <span class="umm-badge badge-belum">Belum Ditemukan</span>
                            @endif
                        </td>
                        <td>{{ $item->tanggal_ditemukan }}</td>
                        <td>
                            <a href="{{ route('tracking-results.show', $item->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                            <a href="{{ route('tracking-results.edit', $item->id) }}" class="btn btn-sm btn-warning text-dark">Edit</a>
                            <form action="{{ route('tracking-results.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">Belum ada hasil pelacakan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
