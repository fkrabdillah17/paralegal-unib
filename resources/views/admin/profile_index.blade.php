@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Profil</h1>
    {{-- Table Data --}}
    <a href="{{ route('admin.profile.create') }}" type="button" class="btn btn-primary mb-2">Tambah Data</a>
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
                        <th class="col-3">Nama</th>
                        <th class="col-2">Jabatan</th>
                        <th class="col-2">Bidang</th>
                        <th class="col-2">Sub Bidang</th>
                        <th class="col-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profile as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->position->name }}</td>
                            <td>{{ $data->division->name }}</td>
                            @if ($data->sub_division != null)
                                <td>{{ $data->sub_division->name }}</td>
                            @else
                                <td> - </td>
                            @endif
                            <td class="col-2 text-center">
                                <a href="{{ route('admin.profile.show', $data->id) }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Detail Data"><i class="bi bi-info-square-fill text-info" style="font-size: 30px"></i></a>
                                <a href="{{ route('admin.profile.edit', $data->id) }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit Data"><i class="bi bi-pencil-square text-warning" style="font-size: 30px"></i></a>
                                <form action="{{ route('admin.profile.destroy', $data->id) }}" class="d-inline" method="post"
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
