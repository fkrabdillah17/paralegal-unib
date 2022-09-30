@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Detail Aspirasi</h1>
    <a href="{{ route('admin.aspiration.report.index') }}" class="btn btn-warning my-2">Kembali</a>
    {{-- Table Data --}}
    <div class="card">
        <div class="card-header bg-secondary bg-gradient text-white">
            Form Aspirasi
        </div>
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="email" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold" value="{{ $aspiration->name }}">
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold" value="{{ $aspiration->email }}">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold" value="{{ $aspiration->nomor }}">
                <label for="floatingInput">Nomor Telepon</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold" value="{{ $aspiration->jurusan }}">
                <label for="floatingInput">Jurusan</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold" value="{{ $aspiration->npm }}">
                <label for="floatingInput">NPM</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold" value="{{ $aspiration->title }}">
                <label for="floatingInput">Judul Isu atau Keluhan</label>
            </div>
            <div class="form-floating mb-3">
                <textarea type="email" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold" style="height: 300px">{{ $aspiration->aspirasi }}</textarea>
                <label for="floatingInput">Keterangan</label>
            </div>
        </div>
    </div>
@endsection
