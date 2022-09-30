@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Data {{ $title }}</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {{-- Table Data --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="bi bi-table"></i>
            Tabel Data {{ $title }}
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="col-4">Nama</th>
                        <th class="col-3">Email</th>
                        <th class="col-2">Status</th>
                        <th class="col-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            @if ($data->email_verified_at != null)
                                <td>Email Terverivikasi</td>
                            @else
                                <td>Belum Verifikasi Email</td>
                            @endif
                            <td class="text-center">
                                <form action="{{ route('admin.user.destroy', $data->id) }}" class="d-inline" method="post"
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
