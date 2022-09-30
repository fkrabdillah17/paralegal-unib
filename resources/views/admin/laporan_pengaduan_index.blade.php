@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Laporan Pengaduan</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {{-- Table Data --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="bi bi-table"></i>
            Tabel Data Pengaduan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="col-3">Nama Pelapor</th>
                        <th class="col-3">Topik Pengaduan</th>
                        <th class="col-1">Status</th>
                        <th class="col-2">Tanggal</th>
                        <th class="col-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->pelapor->name }}</td>
                            <td>{{ $data->title }}</td>
                            @if ($data->status == 0)
                                <td>Belum Ditanggapi</td>
                            @elseif($data->status == 1)
                                <td>Diterima</td>
                            @else
                                <td>Ditolak</td>
                            @endif
                            <td>{{ $data->created_at->isoFormat('D-MMMM-Y') }}</td>
                            <td class="col-2 text-center">
                                <a href="{{ route('admin.laporan.pengaduan.show', $data->id) }}" type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Detail Data"><i class="bi bi-info-square-fill text-info" style="font-size: 30px"></i></a>
                                @if ($data->status == 0)
                                    <a href="{{ route('admin.laporan.pengaduan.edit', $data->id) }}" type="button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Tanggapi"><i class="bi bi-eye-fill text-warning" style="font-size: 30px"></i></a>
                                @endif
                                <form action="{{ route('admin.pengaduan.destroy', $data->id) }}" class="d-inline" method="post"
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
