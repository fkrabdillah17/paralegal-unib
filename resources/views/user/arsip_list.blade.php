@extends('layouts.main')

@section('content')
    <div class="p-2 mt-5 pt-5">
        <div class="container-fluid px-5">
            <h2 class="text-center pb-5 titleBar" style="font-weight: bold">Arsip Kegiatan Paralegal FH UNIB</h2>
            <div class="row">
                <div class="col-lg-9 py-2 ">
                    @foreach ($data as $item)
                        <div class="card card-list border-0 mb-3">
                            <div class="row g-0">
                                <div class="col-md-3 d-flex align-items-stretch">
                                    <a href="{{ route('arsip.detail', $item->slug) }}">
                                        <img src="{{ asset('assets/files/pictures/arsip/' . $item->thumbnail) }}" class="img-fluid rounded-start" alt="...">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <a href="{{ route('arsip.detail', $item->slug) }}" class="text-decoration-none">
                                            <h5 class="card-title text-white titleHead">{{ $item->title }}</h5>
                                        </a>
                                        <p class="card-text"><small class="text-secondary">{{ $item->published_at->isoFormat('D-MMMM-Y') }} /
                                                {{ $item->user->name }} / {{ $item->category->name }}</small></p>
                                        <p class="card-text text-white">{!! strip_tags(\Illuminate\Support\Str::limit($item->description, 100, $end = '...')) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $data->onEachSide(1)->links() }}
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
