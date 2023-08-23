@extends('landing-page.app')

@section('main')

<main class="bg-light"> <!-- Added some padding on top and bottom -->
    <!-- Begin: Search form -->
    <section> <!-- Added some margin at the bottom -->
        <div class="col-md-10 mt-4 mx-auto">
            <div class="card" style="border-radius: 15px;"> <!-- Added a slight shadow -->
                <div class="card-title mt-4 mb-0 ml-4">
                    <h4 class="font-weight-bold">Cari Status Lamaran</h4> <!-- Moved the title to the card header for distinction -->
                </div>
                <div class="card-body">
                    <form id="search-form" class="form-row" method="GET" action="{{ route('melamar.status') }}" onsubmit="handleFormSubmit()">
                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" name="posisi" class="form-control" id="posisi" placeholder="Cari posisi pekerjaan" value="{{ app('request')->input('posisi') }}">
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Lokasi" value="{{ app('request')->input('lokasi') }}">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <button id="search-button" class="btn btn-primary px-4" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
        <!-- End: Search form -->

        <section>
            
            <div class="col-md-10 mt-5 mx-auto justify-content-center">
                @include('layouts.alert')
                <div class="card shadow-sm">
                    <div class="card-body">
                        @forelse($lamaran as $lamar)
                        <div class="col-12 col-sm-12 mb-4">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="media">
                                        <div class="mr-3 align-self-start"> <!-- added align-self-start to top-align the image -->
                                            @if($lamar && $lamar->loker->perusahaan->logo)
                                        <img src="{{ asset('storage/' . $lamar->loker->perusahaan->logo) }}" alt="Logo Perusahaan" class="rounded-circle" style="width: 80px; height: 80px;">
                                        @else
                                        <img alt="image" src="{{ asset('assets/img/company/default-company-logo.png') }}" class="rounded-circle" style="width: 80px; height: 80px;">
                                        @endif
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-title mb-2">
                                                {{ $lamar->loker->judul }}
                                                <span class="badge
                                                        @if ($lamar->status === 'pending') badge-warning
                                                        @elseif ($lamar->status === 'diterima') badge-success
                                                        @elseif ($lamar->status === 'ditolak') badge-danger
                                                        @endif
                                                    ml-2">
                                                    {{ $lamar->status }}
                                                </span>
                                            </h5>
                                            <h6 class="mb-4">{{ $lamar->loker->perusahaan->nama }}</h6> <!-- Increased spacing after the title to mb-4 for consistency -->

                                            <div class="d-flex align-items-center justify-content-start mb-4"> <!-- mb-4 to give consistent space between rows -->
                                                <div class="d-flex align-items-center mr-4"> <!-- Increased space between columns to mr-4 -->
                                                    <img class="img-fluid img-icon mr-2" src="{{ asset('assets/img/landing-page/job.svg') }}"> <!-- space between icon and text -->
                                                    <span>{{ $lamar->loker->min_pengalaman }}</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <img class="img-fluid img-icon mr-2" src="{{ asset('assets/img/landing-page/money.svg') }}">
                                                    <span>IDR {{ $lamar->loker->gaji_bawah }} - {{ $lamar->loker->gaji_atas }}</span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-start mb-4">
                                                <div class="d-flex align-items-center mr-4"> <!-- Increased space between columns to mr-4 -->
                                                    <img class="img-fluid img-icon mr-2" src="{{ asset('assets/img/landing-page/Graduation Cap.svg') }}">
                                                    <span>{{ $lamar->loker->min_pendidikan }}</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <img class="img-fluid img-icon mr-2" src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                                                    <span>{{ $lamar->loker->perusahaan->alamat }}</span>
                                                </div>
                                            </div>
                                            <small class="text-muted">
                                                Melamar pada {{ \Carbon\Carbon::parse($lamar->created_at)->format('j F Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-warning">
                                Tidak ada lamaran ditemukan.
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection
