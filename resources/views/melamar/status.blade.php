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
                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-filter"></i>
                                    </span>
                                </div>
                                <select name="status" class="form-control" id="status">
                                    <option value=""> -> Pilih ini untuk reset <- </option>
                                    <option value="pending">Pending</option>
                                    <option value="diterima">Diterima</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" name="posisi" class="form-control form-jobs clearable" id="posisi" placeholder="Cari posisi pekerjaan" value="{{ app('request')->input('posisi') }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"
                                    style="border-left: none; border-radius: 0px 15px 15px 0px;">
                                    <i class="fas fa-times clear-icon" id="clear-posisi" style="cursor:pointer; display:none;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="lokasi" class="form-control form-jobs" id="lokasi" placeholder="Lokasi" value="{{ app('request')->input('lokasi') }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"
                                    style="border-left: none; border-radius: 0px 15px 15px 0px;">
                                    <i class="fas fa-times clear-icon" id="clear-lokasi" style="cursor:pointer; display:none;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-1">
                            <button id="search-button" class="btn btn-primary px-4" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
        <!-- End: Search form -->

        <section>
            <div class="col-md-10 mt-2 mx-auto justify-content-center">
                @include('layouts.alert')
                    <div class="card-body">
                        @forelse($lamaran as $lamar)
                        <div class="col-12 col-sm-12 mb-4">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="media">
                                        <div class="mr-3 align-self-start">
                                            @if($lamar && $lamar->loker->perusahaan->logo)
                                        <img src="{{ asset('storage/' . $lamar->loker->perusahaan->logo) }}" alt="Logo Perusahaan" class="rounded-circle" style="width: 80px; height: 80px;">
                                        @else
                                        <img alt="image" src="{{ asset('assets/img/company/default-company-logo.png') }}" class="rounded-circle" style="width: 80px; height: 80px;">
                                        @endif
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-title">
                                                <strong>{{ $lamar->loker->judul }}</strong>
                                                <span class="badge
                                                        @if ($lamar->status === 'pending') badge-warning
                                                        @elseif ($lamar->status === 'diterima') badge-success
                                                        @elseif ($lamar->status === 'ditolak') badge-danger
                                                        @endif
                                                    ml-2" style="border-radius: 15px">
                                                    {{ $lamar->status }}
                                                </span>
                                            </h5>
                                            <h5 class="mb-4">{{ $lamar->loker->perusahaan->nama }}</h5> <!-- Increased spacing after the title to mb-4 for consistency -->

                                            <div class="d-flex align-items-center justify-content-start mb-2">
                                                <div class="d-flex align-items-center col-3"> <!-- use col-6 to take half the width -->
                                                    <img class="img-fluid img-icon mr-2" src="{{ asset('assets/img/landing-page/job.svg') }}">
                                                    <span>{{ $lamar->loker->min_pengalaman }}</span>
                                                </div>
                                                <div class="d-flex align-items-center col-6"> <!-- use col-6 to take half the width -->
                                                    <img class="img-fluid img-icon mr-2" src="{{ asset('assets/img/landing-page/money.svg') }}">
                                                    <span>IDR {{ $lamar->loker->gaji_bawah }} - {{ $lamar->loker->gaji_atas }}</span>
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-start mb-2">
                                                <div class="d-flex align-items-left col-3"> <!-- use col-6 to take half the width -->
                                                    <img class="img-fluid img-icon mr-2" src="{{ asset('assets/img/landing-page/Graduation Cap.svg') }}">
                                                    <span>{{ $lamar->loker->min_pendidikan }}</span>
                                                </div>
                                                <div class="d-flex align-items-center col-6"> <!-- use col-6 to take half the width -->
                                                    <img class="img-fluid img-icon mr-2" src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                                                    <span>{{ $lamar->loker->lokasi }}</span>
                                                </div>
                                            </div>
                                            <small class="text-muted">
                                                Melamar pada {{ \Carbon\Carbon::parse($lamar->created_at)->format('j F Y') }}
                                            </small>
                                        </div>
                                        <div class="text-center mb-3">
                                            <a id="detail-button" class="btn btn-sm btn-primary btn-icon" style="border-radius: 25px;"
                                                href="{{ route('all-jobs.show', $lamar->loker->id) }}">
                                                <i class="far fa-eye"></i> Details
                                            </a>
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
        </section>
    </main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const statusSelect = document.getElementById("status");

        statusSelect.addEventListener("change", function() {
        document.getElementById("search-form").submit(); // Kirim form saat opsi berubah
        });

        const inputsAndIcons = [{
                inputId: "posisi",
                clearIconId: "clear-posisi"
            },
            {
                inputId: "lokasi",
                clearIconId: "clear-lokasi"
            }
        ]; // Removed "kategori" as it was not in your HTML

        const inputValues = {
            posisi: "",
            lokasi: ""
        };

        inputsAndIcons.forEach(item => {
            const input = document.getElementById(item.inputId);
            const clearIcon = document.getElementById(item.clearIconId);

            // Display the 'x' icon when the user types in the search form
            input.addEventListener("input", function() {
                inputValues[item.inputId] = this.value;
                clearIcon.style.display = this.value ? "block" : "none";
            });

            // Clear the input and refresh the page when the 'x' icon is clicked
            clearIcon.addEventListener("click", function() {
                input.value = "";
                const url = window.location.origin + window.location.pathname; // Dapatkan URL tanpa parameter query
                window.location.href = url; // Muat ulang halaman dengan URL tanpa parameter query
            });

            if (input.value) {
                clearIcon.style.display = "block";
            }
        });
    });
</script>

@endsection