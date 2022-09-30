@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Detail Profile {{ $profile->name }}</h1>
    <a href="{{ route('admin.profile') }}" class="btn btn-warning my-2">Kembali</a>
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    {{-- Table Data --}}

    <div class="card mb-3">
        <div class="card-header bg-secondary bg-gradient text-white text-center">
            <i class="bi bi-clipboard-fill"></i>
            Form Profile
        </div>
        <div class="row g-0">
            <div class="col-md-4">
                @if ($profile->photo != null)
                    <img src="{{ asset('assets/files/team/' . $profile->photo) }}" class="img-fluid w-100" alt="...">
                @else
                    <img src="{{ asset('assets/files/team/person.svg') }}" class="img-fluid w-100" alt="...">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="form-floating mb-3">
                        <input type="text" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold" value="{{ $profile->name }}">
                        <label for="floatingInput">Nama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold"
                            value="{{ $profile->division->name }}">
                        <label for="floatingInput">Bidang</label>
                    </div>
                    @if ($profile->sub_division != null)
                        <div class="form-floating mb-3">
                            <input type="text" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold"
                                value="{{ $profile->sub_division->name }}">
                            <label for="floatingInput">Sub Bidang</label>
                        </div>
                    @endif
                    <div class="form-floating mb-3">
                        <input type="text" readonly class="form-control-plaintext border-bottom border-dark border-top-0 fw-bold"
                            value="{{ $profile->position->name }}">
                        <label for="floatingInput">Jabatan</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
