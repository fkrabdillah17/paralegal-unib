@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Tambah Profil Paralegal FH UNIB</h1>
    <a href="{{ route('admin.profile') }}" class="btn btn-warning my-2">Kembali</a>
    <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#divisionModal">Divisi</button>
    <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#subDivisionModal">Sub Divisi</button>
    <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#positionModal">Jabatan</button>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {{-- Form Pengaduan --}}
    <div class="card mb-4">
        <div class="card-header text-center bg-secondary bg-gradient text-white">
            <i class="bi bi-clipboard-fill"></i>
            Form Profil Paralegal FH UNIB
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" id="name" name="name"
                        value="{{ old('name') }}">
                    <label for="name" class="form-label">Nama</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select @error('division') is-invalid @enderror" id="division" aria-label="Floating label select example" name="division">
                        <option value="{{ old('division') }}">{{ old('division') ? old('division') : '-- Pilihan --' }}</option>
                        @foreach ($division as $divisi)
                            <option value="{{ $divisi->name }}">{{ $divisi->name }}</option>
                        @endforeach
                    </select>
                    <label for="division">Divisi</label>
                    @error('division')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3" id="sub_division_input">
                    <select class="form-select @error('sub_division') is-invalid @enderror" id="sub_division" aria-label="Floating label select example"
                        name="sub_division" aria-describedby="subDivisionHelp">
                        <option value="{{ old('sub_division') }}">{{ old('sub_division') ? old('sub_division') : '-- Pilihan --' }}</option>

                    </select>
                    <label for="sub_division">Sub Divisi</label>
                    <div id="subDivisionHelp" class="form-text">Sub Divisi Tidak Wajib</div>
                    @error('sub_division')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select @error('position') is-invalid @enderror" id="position" aria-label="Floating label select example" name="position">
                        <option value="{{ old('position') }}">{{ old('position') ? old('position') : '-- Pilihan --' }}</option>
                        @foreach ($position as $jabatan)
                            <option value="{{ $jabatan->name }}">{{ $jabatan->name }}</option>
                        @endforeach
                    </select>
                    <label for="position">Jabatan</label>
                    @error('position')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Foto</label>
                    <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo">
                    @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success my-2">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@section('modal')
    @include('admin.layouts.modal')
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#division').on('change', function() {
                let division_name_op = $(this).val();
                $('#sub_division').empty();
                $('#sub_division').append(
                    `<option value="0" disabled selected>Data Sedang di Proses...</option>`);
                $.ajax({
                    type: 'GET',
                    url: '/Filter/' + division_name_op,
                    success: function(response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#sub_division').empty();
                        $('#sub_division').append(
                            `<option value="0" disabled selected>--Pilihan--</option>`
                        );
                        response.forEach(element => {
                            $('#sub_division').append(
                                `<option value="${element['name']}">${element['name']}</option>`
                            );
                        });
                    }
                });
            });
        });
    </script>
@endsection
