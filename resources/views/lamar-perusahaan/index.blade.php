@extends('landing-page.app')

@section('main')

<main class="bg-light">
    <main class="bg-light">
        <section>
            <div class="col-md-10 mt-4 mx-auto">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-title mt-4 mb-0 ml-4">
                        <h4 class="font-weight-bold">Daftar Lowongan Pekerjaan</h4>
                    </div>
                    <div class="card-body">
                        <form id="search-form" class="form-row" method="GET" action="{{ route('lamarperusahaan.index') }}"
                            onsubmit="handleFormSubmit()">
                            <div class="form-group col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text icon-form">
                                        </div>
                                    </div>
                                        <select name="status" class="form-control form-jobs clearable" id="statusSelect">
                                            <option value="" selected>-- Pilih Status --</option>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status }}"
                                                    @if ($status == $selectedStatus) selected @endif>
                                                    {{ $status }}</option>
                                            @endforeach
                                        </select>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"
                                            style="border-left: none; border-radius: 0px 15px 15px 0px;">
                                            <i class="fas fa-times-circle" id="clear-status" style="display: none;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-search ml-2"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="search" class="form-control form-jobs" id="search"
                                        placeholder="Cari Posisi Pekerjaan" value="{{ app('request')->input('search') }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"
                                            style="border-left: none; border-radius: 0px 15px 15px 0px;">
                                            <i class="fas fa-times-circle" id="clear-search" style="display: none;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <button id="search-button" class="btn btn-primary mr-1 px-4" type="submit"
                                    style="border-radius: 15px;">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="col-md-10 mt-2 mx-auto justify-content-center">
                @include('layouts.alert')
                    <div class="card-body">
                        @foreach ($loggedInUserResults as $key => $lamar)
                        <div class="col-12 col-sm-12 mb-4">
                            <div class="card">
                                <div class="card-body d-flex flex-column">
                                    <div class="media">
                                        <div class="mr-3 align-self-start">
                                            @if ($lamar && $lamar->foto)
                                            <img src="{{ asset('storage/' . $lamar->foto) }}" alt="Foto"
                                                class="rounded-circle" style="width: 100px; height: 100px;">
                                            @else
                                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                                class="rounded-circle" style="width: 100px; height: 100px;">
                                            @endif
                                        </div>
                                        <div class="media-body">
                                            <h4 class="mb-4 font-weight-bold">{{ $lamar->name }}</h4>
                                            <h6 class="mb-4">{{ $lamar->judul }}</h6>
                                            <div class="d-flex align-items-center justify-content-start mb-4">
                                                <div class="d-flex align-items-center mr-4">
                                                    <img class="img-fluid img-icon mr-2"
                                                        src="{{ asset('assets/img/lamar/calendar.svg') }}">
                                                    <span>02 Mei 2002</span>
                                                </div>
                                                <div class="d-flex align-items-center mr-4">
                                                    <img class="img-fluid img-icon mr-2"
                                                        src="{{ asset('assets/img/lamar/call.svg') }}">
                                                    <span>{{ $lamar->no_hp }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-start mb-4">
                                                <div class="d-flex align-items-center">
                                                    <img class="img-fluid img-icon mr-2"
                                                        src="{{ asset('assets/img/lamar/email.svg') }}">
                                                    <span>{{ $lamar->email }}</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <img class="img-fluid img-icon mr-2"
                                                        src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                                                    <span>{{ $lamar->alamat }}</span>
                                                </div>
                                            </div>
                                            <small class="text-muted">
                                                Melamar pada {{ date('j F Y', strtotime($lamar->created_at)) }}
                                            </small>
                                        </div>
                                        <div class="text-right">
                                            <div class="media-right">
                                                <a href="{{ route('lamarperusahaan.show', $lamar->id) }}"
                                                    class="btn btn-sm btn-primary btn-icon" style="border-radius: 15px";>
                                                    <i class="far fa-eye"></i> Detail
                                                </a>
                                                <br>
                                                <br>
                                                <a href="#"
                                                    class="badge
                                                    @if ($lamar->status === 'pending') badge-warning
                                                    @elseif ($lamar->status === 'diterima') badge-success
                                                    @elseif ($lamar->status === 'ditolak') badge-danger
                                                    @endif
                                                    badge-custom"style="border-radius: 15px">
                                                    {{ $lamar->status }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $loggedInUserResults->withQueryString()->links() }}
            </div>
        </section>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll(".card-text");
            let maxHeight = 0;

            cards.forEach(card => {
                const cardHeight = card.clientHeight;
                if (cardHeight > maxHeight) {
                    maxHeight = cardHeight;
                }
            });

            cards.forEach(card => {
                card.style.height = maxHeight + "px";
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputsAndIcons = [{
                    inputId: "statusSelect",
                    clearIconId: "clear-status"
                },
                {
                    inputId: "search",
                    clearIconId: "clear-search"
                }
            ];

            const inputValues = {
                status: "",
                search: ""
            };

            inputsAndIcons.forEach(item => {
                const input = document.getElementById(item.inputId);
                const clearIcon = document.getElementById(item.clearIconId);

                input.addEventListener("input", function() {
                    inputValues[item.inputId] = this.value;
                    clearIcon.style.display = this.value ? "block" : "none";
                });

                clearIcon.addEventListener("click", function() {
                    input.value = "";
                    currentInputValue = "";
                    clearIcon.style.display = "none";
                    submitForm(currentInputValue);
                });

                if (input.value) {
                    clearIcon.style.display = "block";
                }
            });

            function submitForm(inputValue) {
                const form = document.getElementById("search-form");

                form.submit();
            }
        });
    </script>

    <script>
        function handleFormSubmit() {
            document.querySelectorAll('.clear-icon').forEach(icon => {
                const input = icon.parentElement.querySelector('input');
                icon.style.display = input.value ? "block" : "none";
            });
        }
    </script>

    <script>
        const statusSelect = document.getElementById('statusSelect');

        statusSelect.addEventListener('change', function() {
            const selectedStatus = statusSelect.value;

            window.location.href = '{{ route('lamarperusahaan.index') }}?status=' + selectedStatus;
        });
    </script>
    <style>
        .badge-custom {
            font-size: 0.8rem; /* Adjust the value as needed */
            padding: 0.5rem 1rem; /* Adjust the padding as needed */
        }
    </style>
@endsection

@push('customScript')
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
@endpush
