@extends('admin.layouts.main')

@section('content')
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6 my-2">
            <div class="card border-primary rounded-3 shadow h-100 py-2 bg-white" style="border-right: 0; border-left-width: 5px">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="fw-bold text-primary text-uppercase mb-1">
                                Total Pengaduan</div>
                            <div class="h5 mb-0 fw-bold text-dark">{{ $pengaduantotal }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-clipboard-fill text-primary" style="font-size: 2rem; "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 my-2">
            <div class="card border-info rounded-3 shadow h-100 py-2 bg-white" style="border-right: 0; border-left-width: 5px">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="fw-bold text-info text-uppercase mb-1">
                                Pengaduan Diproses</div>
                            <div class="h5 mb-0 fw-bold text-dark">{{ $pengaduandiproses }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-clipboard-plus-fill text-info" style="font-size: 2rem; "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 my-2">
            <div class="card border-success rounded-3 shadow h-100 py-2 bg-white" style="border-right: 0; border-left-width: 5px">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="fw-bold text-success text-uppercase mb-1">
                                Pengaduan Diterima</div>
                            <div class="h5 mb-0 fw-bold text-dark">{{ $pengaduanditerima }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-clipboard-check-fill text-success" style="font-size: 2rem; "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 my-2">
            <div class="card border-danger rounded-3 shadow h-100 py-2 bg-white" style="border-right: 0; border-left-width: 5px">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="fw-bold text-danger text-uppercase mb-1">
                                Pengaduan Ditolak</div>
                            <div class="h5 mb-0 fw-bold text-dark">{{ $pengaduanditolak }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-clipboard-x-fill text-danger" style="font-size: 2rem; "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
