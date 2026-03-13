@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Tambah Hasil Pelacakan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tracking-results.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Alumni</label>
            <select name="alumni_id" class="form-control">
                <option value="">-- Pilih Alumni --</option>
                @foreach($alumni as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->nim }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Sumber</label>
            <select name="sumber" class="form-control">
                <option value="">-- Pilih Sumber --</option>
                <option value="LinkedIn">LinkedIn</option>
                <option value="Google Scholar">Google Scholar</option>
                <option value="ResearchGate">ResearchGate</option>
                <option value="GitHub">GitHub</option>
                <option value="Website Perusahaan">Website Perusahaan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="text" name="link" class="form-control" value="{{ old('link') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Ringkasan</label>
            <textarea name="ringkasan" class="form-control" rows="4">{{ old('ringkasan') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Confidence Score</label>
            <input type="number" name="confidence_score" class="form-control" value="{{ old('confidence_score') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Ditemukan</label>
            <input type="date" name="tanggal_ditemukan" class="form-control" value="{{ old('tanggal_ditemukan') }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('tracking-results.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
