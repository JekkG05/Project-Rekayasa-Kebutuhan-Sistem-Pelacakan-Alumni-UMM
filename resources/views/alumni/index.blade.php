@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="mb-4">
        <h2 class="umm-section-title">Data Alumni</h2>
        <p class="umm-subtle">Kelola data induk alumni sebagai dasar proses pelacakan dan verifikasi.</p>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div></div>
        <a href="{{ route('alumni.create') }}" class="btn btn-umm">+ Tambah Alumni</a>
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
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Fakultas</th>
                    <th>Tahun Lulus</th>
                    <th>Status</th>
                    <th width="230">Aksi</th>
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
                        <td>
                            <a href="{{ route('alumni.show', $item->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                            <a href="{{ route('alumni.edit', $item->id) }}" class="btn btn-sm btn-warning text-dark">Edit</a>
                            <form action="{{ route('alumni.destroy', $item->id) }}" method="POST" class="d-inline">
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
                        <td colspan="8" class="text-center py-4">Belum ada data alumni</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
