@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="mb-4">
        <h2 class="umm-section-title">Verifikasi Manual</h2>
        <p class="umm-subtle">
            Validasi hasil pelacakan alumni dengan status yang masih memerlukan pemeriksaan admin.
        </p>
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
                    <th>Status Saat Ini</th>
                    <th width="280">Aksi Verifikasi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($trackingResults as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->alumni->nama ?? '-' }}</td>
                        <td>{{ $item->sumber }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <strong>{{ $item->confidence_score }}</strong>
                        </td>

                        <td>
                            @if($item->status_verifikasi == 'Teridentifikasi')
                                <span class="umm-badge badge-teridentifikasi">Teridentifikasi</span>
                            @elseif($item->status_verifikasi == 'Perlu Verifikasi')
                                <span class="umm-badge badge-verifikasi">Perlu Verifikasi</span>
                            @else
                                <span class="umm-badge badge-belum">Belum Ditemukan</span>
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('verifikasi.update', $item->id) }}" method="POST" class="d-flex gap-2">
                                @csrf
                                @method('PUT')

                                <select name="status_verifikasi" class="form-select form-select-sm">
                                    <option value="Teridentifikasi">Teridentifikasi</option>
                                    <option value="Perlu Verifikasi">Perlu Verifikasi</option>
                                    <option value="Belum Ditemukan">Belum Ditemukan</option>
                                </select>

                                <button type="submit" class="btn btn-umm btn-sm">
                                    Update
                                </button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            Tidak ada data yang perlu verifikasi manual
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection
