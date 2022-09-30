@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Detail Pengaduan</h1>
    <a href="{{ route('admin.laporan.pengaduan.index') }}" class="btn btn-warning my-2">Kembali</a>
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    {{-- Table Data --}}
    <div class="card">
        <div class="card-header bg-secondary bg-gradient text-white text-center">
            <i class="bi bi-clipboard-fill"></i>
            Form Pengaduan
        </div>
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold"
                    value="{{ $pengaduan->pelapor->name }}">
                <label for="floatingInput">Nama Pelapor</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold" value="{{ $pengaduan->title }}">
                <label for="floatingInput">Judul Isu atau Keluhan</label>
            </div>
            <div class="form-floating mb-3">
                <textarea type="text" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold" style="height: 300px">{{ $pengaduan->description }}</textarea>
                <label for="floatingInput">Keterangan</label>
            </div>
        </div>
    </div>
@endsection
