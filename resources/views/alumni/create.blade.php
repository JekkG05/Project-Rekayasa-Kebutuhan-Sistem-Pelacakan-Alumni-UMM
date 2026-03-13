@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Tambah Data Alumni</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumni.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ old('nim') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Prodi</label>
            <input type="text" name="prodi" class="form-control" value="{{ old('prodi') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <input type="text" name="fakultas" class="form-control" value="{{ old('fakultas') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Lulus</label>
            <input type="number" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Kota</label>
            <input type="text" name="kota" class="form-control" value="{{ old('kota') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Bidang</label>
            <input type="text" name="bidang" class="form-control" value="{{ old('bidang') }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('alumni.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
