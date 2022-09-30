@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Buat Form Pengaduan</h1>
    <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-warning my-2">Kembali</a>

    {{-- Form Pengaduan --}}
    <div class="card mb-4">
        <div class="card-header text-center bg-secondary bg-gradient text-white">
            <i class="bi bi-clipboard-fill"></i>
            Form Pengaduan
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.pengaduan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Isu atau Keluhan</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Judul Isu atau Keluhan" id="title"
                        name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 250px"
                        id="description" name="description">{{ old('description') }}</textarea>
                    <label for="floatingTextarea2">Sampaikan Isu atau Keluhan Anda</label>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success my-2">Kirim Pengaduan</button>
            </form>
        </div>
    </div>
@endsection
