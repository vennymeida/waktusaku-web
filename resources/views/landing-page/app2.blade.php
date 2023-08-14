<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/components.css">

    @stack('customStyle')

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body class="layout-2">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="/">
                        <img src="{{ asset('assets/img/landing-page/logo-2.png') }}" style="height: 35px;"
                            alt="">
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active mr-4">
                                <a class="nav-link text-primary" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary mr-4" href="{{ url('/all-jobs') }}">Lowongan
                                    Pekerjaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary mr-4" href="{{ url('/contact') }}">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="{{ url('/list-about') }}">About Us</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            @if (!auth()->user())
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-primary text-primary mr-2"
                                        href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-warning text-white"
                                        href="{{ route('register') }}">Daftar</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="nav-link btn btn-outline-primary text-primary"
                                            type="submit">Logout</button>
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            {{-- <footer class="main-footer">
                @include('landing-page.footer2')
            </footer> --}}
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/assets/js/page/modules-sweetalert.js"></script>

    <!-- Template JS Files -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script>
        // Inisialisasi dropdown
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
    @stack('customScript')
</body>

</html>
