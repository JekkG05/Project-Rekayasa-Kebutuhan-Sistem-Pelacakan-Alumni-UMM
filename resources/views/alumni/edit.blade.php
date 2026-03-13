@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Edit Data Alumni</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumni.update', $alumni->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ old('nim', $alumni->nim) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $alumni->nama) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Prodi</label>
            <input type="text" name="prodi" class="form-control" value="{{ old('prodi', $alumni->prodi) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <input type="text" name="fakultas" class="form-control" value="{{ old('fakultas', $alumni->fakultas) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Lulus</label>
            <input type="number" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus', $alumni->tahun_lulus) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Kota</label>
            <input type="text" name="kota" class="form-control" value="{{ old('kota', $alumni->kota) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Bidang</label>
            <input type="text" name="bidang" class="form-control" value="{{ old('bidang', $alumni->bidang) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Status Pelacakan</label>
            <select name="status_pelacakan" class="form-control">
                <option value="Belum Ditemukan" {{ $alumni->status_pelacakan == 'Belum Ditemukan' ? 'selected' : '' }}>Belum Ditemukan</option>
                <option value="Perlu Verifikasi" {{ $alumni->status_pelacakan == 'Perlu Verifikasi' ? 'selected' : '' }}>Perlu Verifikasi</option>
                <option value="Teridentifikasi" {{ $alumni->status_pelacakan == 'Teridentifikasi' ? 'selected' : '' }}>Teridentifikasi</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('alumni.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
