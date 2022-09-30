@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Tambah Slide</h1>
    <a href="{{ route('admin.slide') }}" type="button" class="btn btn-labeled btn-warning mb-2"><span class="btn-label"><i class="bi bi-chevron-left"
                style="font-size: 15px"></i></span>Kembali</a>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    {{-- Form Pengaduan --}}
    <div class="card mb-4">
        <div class="card-header text-center bg-secondary bg-gradient text-white">
            <i class="bi bi-clipboard-fill"></i>
            Form Slide Paralegal FH UNIB
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.slide.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Judul" id="title" name="title"
                        value="{{ old('title') }}">
                    <label for="title" class="form-label">Judul</label>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Caption (Optional)" id="description" style="height: 100px"
                        id="description" name="description">{{ old('description') }}</textarea>
                    <label for="description">Caption</label>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Foto</label>
                    <input class="form-control @error('picture') is-invalid @enderror" type="file" id="picture" name="picture">
                    @error('picture')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input @error('overlay') is-invalid @enderror" type="checkbox" role="switch" id="overlay" name="overlay">
                    <label class="form-check-label" for="overlay">Overlay</label>
                    @error('overlay')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-labeled btn-success my-2"><span class="btn-label"><i class="bi bi-save2"></i></span>Simpan</button>
            </form>
        </div>
    </div>
@endsection
