@extends('layouts.main')

@section('content')
    <div class="rounded-3 pt-5 mt-5">
        <div class="container py-5">
            <h2 class="text-center pb-5 titleBar" style="font-weight: bold">{{ $divisi->name }} Paralegal Universitas Bengkulu</h2>
            <div class="row">
                @if ($divisi->id == 3)
                    {{-- ID Division Pembina Table Division --}}
                    @foreach ($data as $item)
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 py-2 text-center">
                                @if ($item->photo != null)
                                    <img src="{{ asset('assets/files/team/' . $item->photo) }}" class="img-fluid rounded-circle" alt="{{ $item->name }}">
                                @else
                                    <img src="{{ asset('assets/files/team/person.svg') }}" class="img-fluid rounded-circle w-50" alt="{{ $item->name }}">
                                @endif
                                <h2>{{ $item->name }}</h2>
                                <h2>{{ $item->position->name }} Paralegal 2021/2022</h2>
                            </div>
                        </div>
                    @endforeach
                @elseif ($divisi->id != 1)
                    {{-- ID Division BPH Inti --}}
                    @foreach ($data as $item)
                        @if ($item->position_id == 3)
                            {{-- position_id == ID Kepala Biro Table Position --}}
                            <div class="col-lg-12 py-2 text-center">
                                @if ($item->photo != null)
                                    <img src="{{ asset('assets/files/team/' . $item->photo) }}" class="img-fluid rounded-circle" alt="{{ $item->name }}">
                                @else
                                    <img src="{{ asset('assets/files/team/person.svg') }}" class="img-fluid rounded-circle w-25" alt="{{ $item->name }}">
                                @endif
                                <h3>{{ $item->name }}</h3>
                                <h3>Kepala {{ $item->division->name }} Paralegal 2021/2022</h3>
                            </div>
                        @elseif($item->position_id == 4)
                            {{-- position_id == ID Sekretaris Biro Table Position --}}
                            <div class="col-lg-12 text-center">
                                <p>{{ $item->position->name }} : {{ $item->name }}</p>
                            </div>
                        @endif
                    @endforeach
                    <div class="row d-flex justify-content-center">
                        <p class="text-center">Anggota :</p>
                        @foreach ($data as $anggota)
                            @if ($anggota->position_id == 5)
                                <div class="col-lg-4 text-center">
                                    <p>{{ $anggota->name }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    @foreach ($data as $item)
                        <div class="col-lg-6 py-2 text-center">
                            @if ($item->photo != null)
                                <img src="{{ asset('assets/files/team/' . $item->photo) }}" class="img-fluid rounded-circle" alt="{{ $item->name }}">
                            @else
                                <img src="{{ asset('assets/files/team/person.svg') }}" class="img-fluid rounded-circle w-50" alt="{{ $item->name }}">
                            @endif
                            <h2>{{ $item->name }}</h2>
                            <h2>{{ $item->position->name }} Paralegal 2021/2022</h2>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
