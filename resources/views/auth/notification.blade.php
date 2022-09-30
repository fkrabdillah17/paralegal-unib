@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="banner-image overlay">
                <div class="card bg-theme text-center w-50 card-center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Link verifikasi baru sudah dikirim ke email anda
                        </div>
                    @endif
                    <div class="card-header">
                        <img src="{{ asset('assets/files/paralegal.png') }}" alt="">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Verifikasi Email Anda !</h5>
                        <p>Silahkan buka email yang anda daftarkan dan lakukan verifikasi email</p>
                        <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-login">
                                klik untuk mengirim ulang email verifikasi
                            </button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
