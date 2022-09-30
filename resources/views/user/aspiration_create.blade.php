@extends('layouts.main')

@section('content')
    {{-- Start Aspiration --}}
    <div class="rounded-3 mt-5">
        <div class="container py-5">
            <h2 class="text-center pb-5 titleBar" style="font-weight: bold">Form Aspirasi</h2>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            {{-- Form Aspirasi --}}
            <div class="card mb-4">
                <div class="card-header text-center">
                    <i class="bi bi-clipboard-fill"></i>
                    Form Aspirasi
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('aspiration.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Nama Lengkap" id="name" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@email.com" id="email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nomor" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control @error('nomor') is-invalid @enderror" placeholder="+62 123 123" id="nomor" name="nomor"
                                value="{{ old('nomor') }}">
                            @error('nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="npm" class="form-label">NPM</label>
                            <input type="text" class="form-control @error('npm') is-invalid @enderror" placeholder="Nomor Pokok Mahasiswa" id="npm"
                                name="npm" value="{{ old('npm') }}">
                            @error('npm')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Jurusan Anda" id="jurusan"
                                name="jurusan" value="{{ old('jurusan') }}">
                            @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
                            <textarea class="form-control @error('aspirasi') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                                id="aspirasi" name="aspirasi">{{ old('aspirasi') }}</textarea>
                            <label for="floatingTextarea2">Sampaikan Isu atau Keluhan Anda</label>
                            @error('aspirasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success my-2">Kirim Aspirasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Aspiration --}}
@endsection
