@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Konten</h1>
    {{-- Table Data --}}
    <a href="{{ route('admin.content.create') }}" type="button" class="btn btn-labeled btn-primary mb-2"><span class="btn-label"><i
                class="bi bi-plus-lg"></i></span>Tambah
        Data</a>
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
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Name
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="col-1">Tag</th>
                        <th class="col-1">Kategori</th>
                        <th class="col-3">Judul</th>
                        <th class="col-2">Status</th>
                        <th class="col-2">Tanggal</th>
                        <th class="col-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->tag->name }}</td>
                            <td>{{ $data->category->name }}</td>
                            <td>{{ $data->title }}</td>
                            @if ($data->status != 0)
                                <td>Published</td>
                            @else
                                <td>Draft</td>
                            @endif
                            @if ($data->status != 0)
                                <td> {{ $data->published_at->isoFormat('D-MMMM-Y') }} </td>
                            @else
                                <td>Belum di Terbitkan</td>
                            @endif

                            <td class="col-2 text-center">
                                @if ($data->status != 1)
                                    <a href="{{ route('admin.content.publish', $data->id) }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Publish" onclick="return confirm('Apakah Anda Yakin Menerbitkan Konten ?')"><i class="bi bi-cloud-upload-fill"
                                            style="font-size: 30px"></i></a>
                                @endif
                                <a href="{{ route('admin.content.show', $data->id) }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Detail Data"><i class="bi bi-info-square-fill text-info" style="font-size: 30px"></i></a>
                                <a href="{{ route('admin.content.edit', $data->id) }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit Data"><i class="bi bi-pencil-square text-warning" style="font-size: 30px"></i></a>
                                <form action="{{ route('admin.content.destroy', $data->id) }}" class="d-inline" method="post"
                                    onsubmit="return confirm('Apakah Anda Yakin Menghapus Data?')">
                                    @method('delete')
                                    @csrf
                                    <button data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data" class="border-0 bg-transparent"><i
                                            class="bi bi-trash-fill text-danger" style="font-size: 30px"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
