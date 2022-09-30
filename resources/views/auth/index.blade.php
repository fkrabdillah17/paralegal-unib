@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-4 col-sm-3 banner-image"></div>
            <div class="col-xl-6 col-lg-8 col-sm-9">
                <form class="loginForm" action="{{ route('login') }}" method="post">
                    @csrf
                    <i class="bi bi-person-circle d-flex justify-content-center pb-3" style="font-size: 60px"></i>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-login-form" type="submit">Login</button>
                        <p class="text-center">Belum memiliki akun ? <a href="{{ route('register') }}" class="register-link">Daftar Akun</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
