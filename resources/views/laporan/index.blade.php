@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="mb-4">
        <h2 class="umm-section-title">Laporan Pelacakan Alumni</h2>
        <p class="umm-subtle">Ringkasan statistik dan status pelacakan alumni secara keseluruhan.</p>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="stats-card stats-primary">
                <div class="stats-label">Total Alumni</div>
                <div class="stats-value">{{ $totalAlumni }}</div>
                <p class="stats-desc">Jumlah seluruh data alumni.</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card stats-success">
                <div class="stats-label">Teridentifikasi</div>
                <div class="stats-value">{{ $teridentifikasi }}</div>
                <p class="stats-desc">Alumni berhasil ditemukan.</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card stats-warning">
                <div class="stats-label">Perlu Verifikasi</div>
                <div class="stats-value">{{ $perluVerifikasi }}</div>
                <p class="stats-desc">Memerlukan validasi admin.</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stats-card stats-danger">
                <div class="stats-label">Belum Ditemukan</div>
                <div class="stats-value">{{ $belumDitemukan }}</div>
                <p class="stats-desc">Belum ada hasil pelacakan.</p>
            </div>
        </div>
    </div>

    <div class="umm-table-wrap">
        <table class="table umm-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Fakultas</th>
                    <th>Tahun Lulus</th>
                    <th>Status Pelacakan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alumni as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->prodi }}</td>
                        <td>{{ $item->fakultas }}</td>
                        <td>{{ $item->tahun_lulus }}</td>
                        <td>
                            @if($item->status_pelacakan == 'Teridentifikasi')
                                <span class="umm-badge badge-teridentifikasi">Teridentifikasi</span>
                            @elseif($item->status_pelacakan == 'Perlu Verifikasi')
                                <span class="umm-badge badge-verifikasi">Perlu Verifikasi</span>
                            @else
                                <span class="umm-badge badge-belum">Belum Ditemukan</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Belum ada data alumni</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
