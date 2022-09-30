@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Ubah Konten Paralegal FH UNIB</h1>
    <a href="{{ route('admin.content') }}" type="button" class="btn btn-labeled btn-warning mb-2"><span class="btn-label"><i class="bi bi-chevron-left"
                style="font-size: 15px"></i></span>Kembali</a>
    <button type="button" class="btn btn-labeled btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tagModal"><span class="btn-label"><i class="bi bi-plus-lg"
                style="font-size: 15px"></i></span>Tag</button>
    <button type="button" class="btn btn-labeled btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#categoryModal"><span class="btn-label"><i
                class="bi bi-plus-lg" style="font-size: 15px"></i></span>Kategori</button>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    {{-- Form Pengaduan --}}
    <div class="card mb-4">
        <div class="card-header text-center bg-secondary bg-gradient text-white">
            <i class="bi bi-clipboard-fill"></i>
            Form Profil Paralegal FH UNIB
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.content.update', $content->id) }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-floating mb-3">
                    <select class="form-select @error('tag') is-invalid @enderror" id="tag" aria-label="Floating label select example" name="tag">
                        <option value="{{ old('tag') ? old('tag') : $content->tag->name }}">{{ old('tag') ? old('tag') : $content->tag->name }}</option>
                        @foreach ($tag as $data)
                            <option value="{{ $data->name }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                    <label for="tag">Tag</label>
                    @error('tag')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3" id="category_input">
                    <select class="form-select @error('category') is-invalid @enderror" id="category" aria-label="Floating label select example" name="category">
                        <option value="{{ old('category') ? old('category') : $content->category->name }}">
                            {{ old('category') ? old('category') : $content->category->name }}</option>

                    </select>
                    <label for="category">Kategori</label>
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Judul" id="title" name="title"
                        value="{{ old('title') ? old('title') : $content->title }}">
                    <input type="hidden" name="oldTitle" value="{{ $content->title }}">
                    <label for="title" class="form-label">Judul</label>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Leave a comment here" id="description" style="height: 100px"
                        id="description" name="description">{{ old('description') ? old('description') : $content->description }}</textarea>
                    <label for="description">Deskripsi</label>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Foto</label>
                    <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail" name="thumbnail">
                    @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-labeled btn-success my-2"><span class="btn-label"><i class="bi bi-save2"></i></span>Simpan</button>
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
            $('#tag').on('change', function() {
                let tags_op = $(this).val();
                $('#category').empty();
                $('#category').append(
                    `<option value="0" disabled selected>Data Sedang di Proses...</option>`);
                $.ajax({
                    type: 'GET',
                    url: '/Filter/Category/' + tags_op,
                    success: function(response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#category').empty();
                        $('#category').append(
                            `<option value="0" disabled selected>--Pilihan--</option>`
                        );
                        response.forEach(element => {
                            $('#category').append(
                                `<option value="${element['name']}">${element['name']}</option>`
                            );
                        });
                    }
                });
            });
        });
    </script>
@endsection
