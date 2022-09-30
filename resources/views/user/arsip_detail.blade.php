@extends('layouts.main')

@section('content')
    <div class="p-2 mt-5 pt-5">
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-lg-9 py-2 ">
                    <img src="{{ asset('assets/files/pictures/arsip/' . $content->thumbnail) }}" class="img-detail-center rounded shadow mb-3" alt="...">
                    <h2 class="text-center titleBar" style="font-weight: bold">{{ $content->title }}</h2>
                    <p class="text-center pb-3 text-uppercase">{{ $content->tag->name }} / {{ $content->category->name }}</p>
                    <p class="text-justify">{!! $content->description !!}</p>
                    <p>Ditulis Oleh {{ $content->user->name }} Pada {{ $content->published_at->isoFormat('D-MMMM-Y') }}</p>
                </div>
                <div class="col-lg-3 py-2">
                    <div class="card card-list border-0">
                        <div class="card-header border-0 text-white fw-bold titleHead">
                            Arsip
                        </div>
                        <div class="card-body">
                            @foreach ($archives_arsip as $item)
                                <a href="{{ route('arsip.archive.list', ['months' => $item['months'], 'month' => $item['month'], 'year' => $item['year']]) }}"
                                    class="text-decoration-none text-white">
                                    <h5 class="card-title">{{ $item['months'] . ' ' . $item['year'] }}</h5>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
