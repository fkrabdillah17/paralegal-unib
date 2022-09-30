{{-- Header --}}
<nav class="navbar navbar-expand-lg navbar-dark fixed-top p-md-3 fw-bold">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/files/paralegal.png') }}" alt="" width="60" height="60" class="d-inline-block align-text-top">
            Paralegal
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item pe-5">
                    <a class="nav-link underline {{ Request::segment(1) == '' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown pe-5">
                    <a class="nav-link dropdown-toggle {{ Request::segment(1) == 'profile' ? 'active' : '' }}" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($profile_link as $item)
                            <li><a class="dropdown-item {{ Request::segment(2) == $item->slug ? 'active' : '' }}"
                                    href="{{ route('profile', $item->slug) }}">{{ $item->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item pe-5">
                    <a class="nav-link underline {{ Request::segment(1) == 'arsip' ? 'active' : '' }}" href="{{ route('arsip') }}">Arsip</a>
                </li>
                <li class="nav-item pe-5">
                    <a class="nav-link underline {{ Request::segment(1) == 'aspiration' ? 'active' : '' }}" href="{{ route('aspiration') }}">Aspirasi</a>
                </li>
                <li class="nav-item pe-5">
                    <a class="nav-link underline {{ Request::segment(1) == 'news' ? 'active' : '' }}" href="{{ route('news.list') }}">Berita</a>
                </li>
                <li class="nav-item pe-5">
                    <a class="nav-link underline" href="{{ url()->current() == url('') ? '#about-us' : route('home', '#about-us') }}">Tentang
                        Kami</a>
                </li>
                <li class="nav-item pe-5">
                    <a class="nav-link underline" href="#contact-us">Kontak</a>
                </li>
                @if (Auth::user() != null)
                    <li class="nav-item pe-5">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
{{-- End Header --}}
