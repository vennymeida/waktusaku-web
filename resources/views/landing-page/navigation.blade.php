<!DOCTYPE html>
<html lang="en">

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary-nav sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('assets/img/landing-page/logo.svg') }}" style="height: 30px;">
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
                        <a class="nav-link text-primary mr-4" href="{{ url('/contact-us') }}">Contact Us</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user text-primary">
                            @if (Auth::user()->profile && Auth::user()->profile->foto != '')
                                <img alt="image"
                                    src="{{ Storage::url(Auth::user()->profile->foto) }}"
                                    class="rounded-circle mr-1" style="width: 35px; height: 35px;">
                            @else
                                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    class="rounded-circle mr-1" style="width: 35px; height: 35px;">
                            @endif
                            <div class="d-sm-none d-lg-inline-block">
                                Hai, {{ auth()->user()->name }}
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                                <i class="far fa-user mx-1 mr-2"></i> Profile
                            </a>
                            @if (auth()->user()->hasRole('Pencari Kerja'))
                                <a href="{{ route('bookmark.index') }}" class="dropdown-item has-icon">
                                    <i class="far fa-bookmark mx-1 mr-2"></i> Bookmark
                                </a>
                            @endif
                            @if (auth()->user()->hasRole('Pencari Kerja'))
                                <a href="{{ route('melamar.status') }}" class="dropdown-item has-icon">
                                    <img class="img-fluid img-icon mx-1 mr-2" src="{{ asset('assets/img/lamar/status.svg') }}" style="width: 8%; height: 8%;">Status Lamaran
                                </a>
                            @endif
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt mx-1 mr-2"></i> Keluar
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ url('/about-us') }}">About Us</a>
                    </li>
                </ul>
                {{-- <ul class="navbar-nav ml-auto">
                    @if (!auth()->user())
                        <li class="nav-item">
                            <a class="nav-link px-4 py-1 btn btn-outline-primary text-primary mr-2"
                                href="{{ route('login') }}" style="border-radius: 10px;">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 py-1 btn btn-outline-warning text-white"
                                href="{{ route('register') }}" style="border-radius: 10px;">Daftar</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user text-primary">
                                @if (Auth::user()->profile && Auth::user()->profile->foto != '')
                                    <img alt="image" src="{{ Storage::url(Auth::user()->profile->foto) }}"
                                        class="rounded-circle mr-1" style="width: 35px; height: 35px;">
                                @else
                                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                        class="rounded-circle mr-1" style="width: 35px; height: 35px;">
                                @endif
                                <div class="d-sm-none d-lg-inline-block">
                                    Hai, {{ auth()->user()->name }}
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                                    <i class="far fa-user mx-2"></i> Profile
                                </a>
                                @if (auth()->user()->hasRole('Pencari Kerja'))
                                    <a href="{{ route('bookmark.index') }}" class="dropdown-item has-icon">
                                        <i class="far fa-bookmark mx-2"></i> Bookmark
                                    </a>
                                @endif
                                @if (auth()->user()->hasRole('Perusahaan'))
                                    <a href="{{ route('loker-perusahaan.index') }}" class="dropdown-item has-icon">
                                        <i class="fas fa-briefcase mx-2"></i> Lowongan Pekerjaan
                                    </a>
                                    <a href="" class="dropdown-item has-icon">
                                        <i class="fas fa-file-alt mx-2"></i> Data Pelamar Kerja
                                    </a>
                                @endif
                                <hr class="my-0" style="background-color: rgba(249, 249, 249, 0.2);">
                                    <a href="" class="dropdown-item has-icon">
                                        <i class="fas fa-briefcase mx-2"></i> Lowongan Pekerjaan
                                    </a>
                                    <a href="{{ route('lamarperusahaan.index') }}" class="dropdown-item has-icon">
                                        <i class="fas fa-file-alt mx-2"></i> Data Pelamar Kerja
                                    </a>
                                @endif
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt mx-2"></i> Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                </ul> --}}
                <ul class="navbar-nav ml-auto">
                    @if (!auth()->user())
                        <li class="nav-item">
                            <a class="nav-link px-4 py-1 btn btn-outline-primary text-primary mr-2"
                                href="{{ route('login') }}" style="border-radius: 10px;">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-4 py-1 btn btn-outline-warning text-white"
                                href="{{ route('register') }}" style="border-radius: 10px;">Daftar</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user text-primary">
                                @if (Auth::user()->profile && Auth::user()->profile->foto != '')
                                    <img alt="image" src="{{ Storage::url(Auth::user()->profile->foto) }}"
                                        class="rounded-circle mr-1" style="width: 35px; height: 35px;">
                                @else
                                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                        class="rounded-circle mr-1" style="width: 35px; height: 35px;">
                                @endif
                                <div class="d-sm-none d-lg-inline-block">
                                    Hai, {{ auth()->user()->name }}
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                                    <i class="far fa-user mx-2"></i> Profile
                                </a>
                                @if (auth()->user()->hasRole('Pencari Kerja'))
                                    <a href="{{ route('bookmark.index') }}" class="dropdown-item has-icon">
                                        <i class="far fa-bookmark mx-2"></i> Bookmark
                                    </a>
                                @endif
                                @if (auth()->user()->hasRole('Perusahaan'))
                                    <a href="{{ route('loker-perusahaan.index') }}" class="dropdown-item has-icon">
                                        <i class="fas fa-briefcase mx-2"></i> Lowongan Pekerjaan
                                    </a>
                                    <a href="{{ route('lamarperusahaan.index') }}" class="dropdown-item has-icon">
                                        <i class="fas fa-file-alt mx-2"></i> Data Pelamar Kerja
                                    </a>
                                @endif
                                <hr class="my-0" style="background-color: rgba(249, 249, 249, 0.2);">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt mx-2"></i> Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-KyZXEAg3QhqLMpG8r+Y9w1R0Za8W60MTLPSw8vm+COA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-pzjw6f+ua5q4PaEhL8r+paN1fhb/6IqE6HfY0NlgP9cfw5a/c8b9TI5+9xSTBQ5" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/assets/js/page/modules-sweetalert.js"></script>

    <!-- Template JS Files -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
<script>
    // Inisialisasi dropdown
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();

            // Additional styling using script
            $('.dropdown-username').css('font-weight', 'bold');
            $('.dropdown-menu .dropdown-item').hover(function() {
                $(this).css('background-color', '#f8f9fa').css('color', '#007bff');
            }, function() {
                $(this).css('background-color', '').css('color', '');
            });
        });
    </script>
    @stack('customScript')
</body>

</html>
