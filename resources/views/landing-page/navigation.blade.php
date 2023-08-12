<nav class="navbar navbar-expand-lg navbar-light bg-primary-nav sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('assets/img/landing-page/logo-2.png') }}" style="height: 35px; alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active mr-4">
                    <a class="nav-link text-primary" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary mr-4" href="{{ url('/all-jobs') }}">Lowongan Pekerjaan</a>
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
                        <a class="nav-link btn btn-outline-primary text-primary" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-warning text-white" href="{{ route('register') }}">Daftar</a>
                    </li>
                @else
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link btn btn-outline-primary text-primary" type="submit">Logout</button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
