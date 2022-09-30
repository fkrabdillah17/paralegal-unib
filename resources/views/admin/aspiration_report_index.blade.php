@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Aspirasi Saya</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {{-- Table Data --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="bi bi-table"></i>
            Tabel Data Aspirasi
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="col-2">Nama Pelapor</th>
                        <th class="col-2">Judul Isu atau Keluhan</th>
                        <th class="col-1">NPM</th>
                        <th class="col-2">Jurusan</th>
                        <th class="col-2">Email</th>
                        <th class="col-1">Tanggal</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aspiration as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->npm }}</td>
                            <td>{{ $data->jurusan }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->created_at->isoFormat('D-MMMM-Y') }}</td>
                            <td class="col-2 text-center">
                                <a href="{{ route('admin.aspiration.report.show', $data->id) }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Detail Data"><i class="bi bi-info-square-fill text-info" style="font-size: 30px"></i></a>
                                <form action="{{ route('admin.aspiration.report.destroy', $data->id) }}" class="d-inline" method="post"
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
