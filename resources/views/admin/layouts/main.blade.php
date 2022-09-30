<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Admin Paralegal" />
    <meta name="author" content="Paralegal" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    {{-- CSS Bootstraps SB Admin --}}
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    {{-- Css Bootstrap 5.2 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    {{-- CSS Costum --}}
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    {{-- tiny wysiwyg editor --}}
    <script src="https://cdn.tiny.cloud/1/c5carso9errjv8ebk65eu0nqraaflddabfg2i21dzsn4wa1q/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Admin | {{ request()->segment(2) != null ? request()->segment(2) : 'Beranda' }}</title>
</head>

<body class="sb-nav-fixed">
    {{-- Ini Topbar --}}
    @include('admin.layouts.topbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                {{-- Ini Sidebar --}}
                @include('admin.layouts.sidebar')
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    {{-- Ini Content --}}
                    @yield('content')
            </main>
            {{-- Ini Footer --}}
            @include('admin.layouts.footer')
        </div>
    </div>

    {{-- Modal --}}
    @yield('modal')

    {{-- Javascript Bootstrap 5.2 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    {{-- JS SB Admin --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    {{-- JS Bootstrap SB Admin --}}
    <script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    @yield('javascript')
    {{-- JS Custom --}}
    <script type="text/javascript" src="{{ asset('assets/js/admin.js?v=1.0') }}"></script>
</body>

</html>
