@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Feedback Form Pengaduan</h1>
    <a href="{{ route('admin.laporan.pengaduan.index') }}" class="btn btn-warning my-2">Kembali</a>
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    {{-- Form Pengaduan --}}
    <div class="card mb-4">
        <div class="card-header text-center bg-secondary bg-gradient text-white">
            <i class="bi bi-clipboard-fill"></i>
            Form Pengaduan
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.laporan.pengaduan.update', $pengaduan->id) }}" enctype="multipart/form-data"
                onsubmit="return confirm('Apakah Anda Yakin Dengan Tanggapan Anda?')">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <div class="form-floating mb-3">
                        <input type="text" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold"
                            value="{{ $pengaduan->pelapor->name }}">
                        <label for="floatingInput">Nama Pelapor</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold"
                            value="{{ $pengaduan->title }}">
                        <label for="floatingInput">Judul Isu atau Keluhan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea type="text" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold" style="height: 300px">{{ $pengaduan->description }}</textarea>
                        <label for="floatingInput">Keterangan</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select @error('status') is-invalid @enderror" id="status" aria-label="Floating label select example" name="status">
                        <option value="{{ old('status') }}">{{ old('status') ? old('status') : '-- Pilihan --' }}</option>
                        <option value="1">Diterima</option>
                        <option value="2">Ditolak</option>
                    </select>
                    <label for="status">Pilih Status</label>
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control @error('feedback') is-invalid @enderror" placeholder="Leave a comment here" id="feedback" style="height: 250px" id="feedback"
                        name="feedback">{{ old('feedback') ? old('feedback') : $pengaduan->feedback }}</textarea>
                    <label for="feedback">Feedback Anda</label>
                    @error('feedback')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success my-2">Kirim Tanggapan</button>
            </form>
        </div>
    </div>
@endsection
