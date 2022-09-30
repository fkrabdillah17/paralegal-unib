<div class="sb-sidenav-menu">
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Menu</div>
        <a class="nav-link" href="{{ route('admin.home') }}">
            <div class="sb-nav-link-icon"><i class="bi bi-house-fill"></i></i></div>
            Dashboard
        </a>
        <a class="nav-link" href="{{ route('admin.pengaduan.index') }}">
            <div class="sb-nav-link-icon"><i class="bi bi-envelope-fill"></i></i></i></div>
            Pengaduan saya
        </a>
        @if (Auth::user()->role == 1)
            <div class="sb-sidenav-menu-heading">Administrator</div>
            <a class="nav-link" href="{{ route('admin.aspiration.report.index') }}">
                <div class="sb-nav-link-icon"><i class="bi bi-envelope-fill"></i></i></i></div>
                Laporan Aspirasi
            </a>
            <a class="nav-link" href="{{ route('admin.laporan.pengaduan.index') }}">
                <div class="sb-nav-link-icon"><i class="bi bi-envelope-fill"></i></i></i></div>
                Laporan Pengaduan
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></i></div>
                Data User
                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.admin') }}">Admin</a>
                    <a class="nav-link" href="{{ route('admin.user') }}">User</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#master-data" aria-expanded="false"
                aria-controls="master-data">
                <div class="sb-nav-link-icon"><i class="bi bi-archive-fill"></i></i></i></div>
                Data Master
                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
            </a>
            <div class="collapse" id="master-data" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('admin.profile') }}">Profile</a>
                    <a class="nav-link" href="{{ route('admin.content') }}">Konten</a>
                    <a class="nav-link" href="{{ route('admin.slide') }}">Slider</a>
                </nav>
            </div>
        @endif
    </div>
</div>
<div class="sb-sidenav-footer">
    <div class="small">Logged in as:</div>
    {{ Auth::user()->name }}
</div>
