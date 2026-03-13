@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Edit Hasil Pelacakan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tracking-results.update', $trackingResult->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Alumni</label>
            <select name="alumni_id" class="form-control">
                @foreach($alumni as $item)
                    <option value="{{ $item->id }}" {{ $trackingResult->alumni_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }} - {{ $item->nim }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Sumber</label>
            <select name="sumber" class="form-control">
                <option value="LinkedIn" {{ $trackingResult->sumber == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                <option value="Google Scholar" {{ $trackingResult->sumber == 'Google Scholar' ? 'selected' : '' }}>Google Scholar</option>
                <option value="ResearchGate" {{ $trackingResult->sumber == 'ResearchGate' ? 'selected' : '' }}>ResearchGate</option>
                <option value="GitHub" {{ $trackingResult->sumber == 'GitHub' ? 'selected' : '' }}>GitHub</option>
                <option value="Website Perusahaan" {{ $trackingResult->sumber == 'Website Perusahaan' ? 'selected' : '' }}>Website Perusahaan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Link</label>
            <input type="text" name="link" class="form-control" value="{{ old('link', $trackingResult->link) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $trackingResult->judul) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Ringkasan</label>
            <textarea name="ringkasan" class="form-control" rows="4">{{ old('ringkasan', $trackingResult->ringkasan) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Confidence Score</label>
            <input type="number" name="confidence_score" class="form-control" value="{{ old('confidence_score', $trackingResult->confidence_score) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Ditemukan</label>
            <input type="date" name="tanggal_ditemukan" class="form-control" value="{{ old('tanggal_ditemukan', $trackingResult->tanggal_ditemukan) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tracking-results.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
