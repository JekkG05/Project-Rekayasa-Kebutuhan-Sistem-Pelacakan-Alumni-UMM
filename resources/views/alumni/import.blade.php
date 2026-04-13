@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="rounded-4 shadow-sm p-4 mb-4 text-white"
         style="background: linear-gradient(135deg, #8b001c, #b00020);">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('images/logo-umm.png') }}" alt="Logo UMM"
                 style="width: 70px; height: 70px; object-fit: contain;">
            <div>
                <h1 class="mb-1 fw-bold">Import Data Alumni</h1>
                <p class="mb-0 fs-5">
                    Upload file Excel alumni untuk menambahkan data ke sistem pelacakan alumni.
                </p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-4 shadow-sm border-0">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger rounded-4 shadow-sm border-0">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4 align-items-stretch">
        <div class="col-lg-8">
            <div class="card border-0 rounded-4 shadow-sm h-100">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4" style="color:#8b001c;">Form Import Excel</h3>

                    <p class="text-muted mb-4">
                        File yang didukung:
                        <strong>.xlsx</strong>, <strong>.xls</strong>, atau <strong>.csv</strong>.
                    </p>

                    <form action="{{ route('import.alumni.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="file_excel" class="form-label fw-semibold">Pilih File Excel Alumni</label>
                            <input type="file" name="file_excel" id="file_excel"
                                   class="form-control form-control-lg rounded-3" required>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <button type="submit"
                                    class="btn text-white px-4 py-2 rounded-3 fw-semibold"
                                    style="background-color:#8b001c; min-width: 140px;">
                                Import Data
                            </button>

                            <a href="{{ route('alumni.index') }}"
                               class="btn btn-outline-secondary px-4 py-2 rounded-3 fw-semibold">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 rounded-4 shadow-sm h-100">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-4" style="color:#8b001c;">Petunjuk Import</h3>
                    <ol class="ps-3 text-muted mb-0" style="line-height: 1.8;">
                        <li class="mb-2">Pastikan file Excel memiliki header kolom yang sesuai.</li>
                        <li class="mb-2">Kolom minimal: Nama Lulusan, NIM, Tahun Masuk, Tanggal Lulus, Fakultas, Program Studi.</li>
                        <li class="mb-2">Gunakan format data yang rapi agar proses import berhasil.</li>
                        <li class="mb-2">Setelah import, data bisa dilengkapi dari menu kelola alumni.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
