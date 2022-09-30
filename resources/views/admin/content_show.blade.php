@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Detail Konten {{ $content->name }}</h1>
    <a href="{{ route('admin.content') }}" type="button" class="btn btn-labeled btn-warning mb-2"><span class="btn-label"><i class="bi bi-chevron-left"
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
            <img src="{{ asset('assets/files/pictures/arsip/' . $content->thumbnail) }}" class="img-fluid rounded shadow mb-3" alt="...">
            <h2 class="text-center text-uppercase" style="font-weight: bold">{{ $content->title }}</h2>
            <p class="text-center text-uppercase">{{ $content->tag->name }} / {{ $content->category->name }}</p>
            <p class="text-justify">{!! $content->description !!}</p>
        </div>
        <div class="card-footer text-muted text-center">
            <p>Ditulis Oleh {{ $content->user->name }} Pada {{ $content->created_at->isoFormat('D-MMMM-Y') }}</p>
            <p>{{ $content->status != 0 ? 'Dipublikasikan Pada : ' : 'Draft' }}
                {{ $content->published_at != null ? $content->published_at->isoFormat('D-MMMM-Y') : '' }}</p>
        </div>
    </div>
@endsection
