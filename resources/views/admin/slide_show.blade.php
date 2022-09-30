@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Detail Slide {{ $slide->name }}</h1>
    <a href="{{ route('admin.slide') }}" type="button" class="btn btn-labeled btn-warning mb-2"><span class="btn-label"><i class="bi bi-chevron-left"
                style="font-size: 15px"></i></span>Kembali</a>
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    {{-- Table Data --}}

    <div class="card mb-3">
        <div class="card-header bg-secondary bg-gradient text-white text-center">
            <i class="bi bi-clipboard-fill"></i>
            Form Konten
        </div>
        <div class="card-body">
            <div class="col">
                <div class="text-center">
                    <img src="{{ asset('assets/files/pictures/arsip/' . $slide->picture) }}" class="img-fluid rounded shadow" alt="...">
                    <div class="{{ $slide->overlay != 'on' ? '' : 'overlay' }}"></div>
                </div>
            </div>
            <h2 class="text-center text-uppercase" style="font-weight: bold">{{ $slide->title }}</h2>
            <p class="text-justify">{!! $slide->caption !!}</p>
        </div>
    </div>
@endsection
