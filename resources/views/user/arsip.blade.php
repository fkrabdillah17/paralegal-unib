@extends('layouts.main')

@section('content')
    <div class="p-2 mt-5 pt-5">
        <div class="container-fluid">
            <h2 class="text-center pb-2 titleBar" style="font-weight: bold">Arsip Kegiatan</h2>
            <div id="slideArsip" class="carousel" data-bs-ride="carousel">
                <div class="carousel-inner slide-arsip">
                    @foreach ($data as $item)
                        <div class="carousel-item slide-arsip active">
                            <div class="card slide-arsip">
                                <div class="img-wrapper slide-arsip"><img src="{{ asset('assets/files/pictures/arsip/' . $item->thumbnail) }}"
                                        class="d-block w-100" alt="..."> </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{!! strip_tags(\Illuminate\Support\Str::limit($item->description, 100, $end = '...')) !!}</p>
                                    <a href="{{ route('arsip.detail', $item->slug) }}" class="btn btn-primary">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev slide-arsip" type="button" data-bs-target="#slideArsip" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next slide-arsip" type="button" data-bs-target="#slideArsip" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <a href="{{ route('arsip.list') }}" type="button" class="btn btn-login position-relative bottom-0 start-50 translate-middle-x">Semua Arsip</a>
    </div>
@endsection
