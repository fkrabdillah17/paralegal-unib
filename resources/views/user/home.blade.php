@extends('layouts.main')

@section('content')
    {{-- Main Content --}}

    {{-- Carousel --}}
    <div id="carouselHome" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            @foreach ($slide as $dataSlide)
                <button type="button" data-bs-target="#carouselHome" data-bs-slide-to="{{ $loop->iteration }}"
                    aria-label="Slide {{ $loop->iteration + 1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            <div class="carousel-item slide-home overlay active" style="background-image: url('{{ asset('assets/files/pictures/mountain.jpg') }}')">
                <div class="carousel-caption">
                    <h1>Selamat Datang</h1>
                    <p>Di website resmi paralegal
                    </p>
                    <a href="{{ route('login') }}" type="button" class="btn btn-login">Login</a>
                </div>
            </div>
            @foreach ($slide as $dataSlide)
                <div class="carousel-item slide-home {{ $dataSlide->overlay != 'on' ? '' : 'overlay' }}">
                    <img src="{{ asset('assets/files/pictures/arsip/' . $dataSlide->picture) }}" class="d-block h-100 w-100" alt="">
                    @if ($dataSlide->caption != null)
                        <div class="carousel-caption">
                            <p>{!! $dataSlide->caption !!}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselHome" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselHome" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- End Carousel --}}


    {{-- Start About --}}
    <div class="rounded-3" id="about-us">
        <div class="container py-5">
            <h2 class="text-center pb-5 titleBar" style="font-weight: bold">Sekilas Tentang Paralegal FH UNIB</h2>
            <div class="row">
                <div class="col-lg-6 py-2">
                    <img src="{{ asset('assets/files/pengurus.jpeg') }}" class="img-fluid rounded" alt="...">
                </div>
                <div class="col-lg-6 align-self-center">
                    <p class="text-justify">Paralegal adalah organisasi mahasiswa yang ada di Fakultas Hukum Unib yang berkonsentrasi pada kajian kajian teoritis
                        ilmu hukum dan perkembangan dinamika hukum serta melakukan bentuk bantuan hukum pada masyarakat secara non litigasi. Oraganisasi ini
                        dibentuk untuk menciptakan mahasiswa yang peduli dalam menyikapi berbagai persoalan yang berkembang di masyarakat.</p>
                </div>
            </div>
        </div>
    </div>
    {{-- End About --}}

    {{-- Start Our Team --}}
    <div class="rounded-3">
        <div class="container py-5">
            <h2 class="titleBar text-center pb-5" style="font-weight: bold">Kepengurusan Paralegal 2021/2022</h2>
            <div class="row d-flex justify-content-center">
                @foreach ($pembina as $data)
                    <!-- Team Member -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-0 shadow h-100">
                            @if ($data->photo != null)
                                <img src="{{ asset('assets/files/team/' . $data->photo) }}" class="card-img-top" alt="...">
                            @else
                                <img src="{{ asset('assets/files/team/person.svg') }}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title mb-0">{{ $data->name }}</h5>
                                <div class="card-text text-black-50">{{ $data->position->name }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($bph as $data)
                    <!-- Team Member -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-0 shadow h-100">
                            @if ($data->photo != null)
                                <img src="{{ asset('assets/files/team/' . $data->photo) }}" class="card-img-top" alt="...">
                            @else
                                <img src="{{ asset('assets/files/team/person.svg') }}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title mb-0">{{ $data->name }}</h5>
                                <div class="card-text text-black-50">{{ $data->position->name }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($karo as $data)
                    <!-- Team Member -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-0 shadow h-100">
                            @if ($data->photo != null)
                                <img src="{{ asset('assets/files/team/' . $data->photo) }}" class="card-img-top" alt="...">
                            @else
                                <img src="{{ asset('assets/files/team/person.svg') }}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title mb-0">{{ $data->name }}</h5>
                                <div class="card-text text-black-50">{{ $data->position->name }} {{ $data->division->name }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
        </div>
    </div>
    {{-- End Our Team --}}

    {{-- End Main Content --}}
@endsection
