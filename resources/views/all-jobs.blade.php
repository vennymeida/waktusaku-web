@extends('landing-page.app')

@section('main')
    <!-- Main Content -->
    <main class="bg-light">
        <section>
            <div class="col-md-10 mt-4 mx-auto">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-title mt-4 mb-0 ml-4">
                        <h4 class="font-weight-bold">Daftar Lowongan Pekerjaan</h4>
                    </div>
                    <div class="card-body">
                        <form id="search-form" class="form-row" method="GET" action="{{ route('all-jobs.index') }}"
                            onsubmit="handleFormSubmit()">
                            <div class="form-group col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text icon-form">
                                            <i class="fas fa-search ml-2"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="posisi" class="form-control form-jobs clearable"
                                        id="posisi" placeholder="Cari posisi pekerjaan"
                                        value="{{ app('request')->input('posisi') }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"
                                            style="border-left: none; border-radius: 0px 15px 15px 0px;">
                                            <i class="fas fa-times-circle" id="clear-posisi" style="display: none;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-map-marker-alt ml-2"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="lokasi" class="form-control form-jobs" id="lokasi"
                                        placeholder="Lokasi" value="{{ app('request')->input('lokasi') }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"
                                            style="border-left: none; border-radius: 0px 15px 15px 0px;">
                                            <i class="fas fa-times-circle" id="clear-lokasi" style="display: none;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-briefcase ml-2"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="kategori" class="form-control form-jobs" id="kategori"
                                        placeholder="Kategori" value="{{ app('request')->input('kategori') }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"
                                            style="border-left: none; border-radius: 0px 15px 15px 0px;">
                                            <i class="fas fa-times-circle" id="clear-kategori" style="display: none;"></i>
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
            <div class="col-md-12 mt-5 mx-auto d-flex flex-wrap justify-content-center">
                @foreach ($allResults as $key => $loker)
                    <div class="card col-md-3 mb-4 mx-4">
                        <div class="card-body d-flex flex-column">
                            <div class="position-relative">
                                <div class="gradient-overlay"></div>
                                <img class="img-fluid mb-3 fixed-height-image position-absolute top-0 start-50 translate-middle-x"
                                    src="{{ asset('storage/' . $loker->logo) }}" alt="Company Logo">
                                <p class="text-white card-title font-weight-bold mb-0 ml-2 overlap-text"
                                    style="font-size: 20px;">
                                    {{ $loker->judul }}
                                </p>
                                <p class="text-white mb-4 ml-2 overlap-text-2" style="font-size: 14px;">
                                    {{ $loker->nama }}
                                </p>
                            </div>
                            <div class="card-text">
                                <ul class="list-unstyled ml-2">
                                    <ul class="list-unstyled d-flex justify-content-between">
                                        <li class="mb-2"><img class="img-fluid img-icon"
                                                src="{{ asset('assets/img/landing-page/Office Building.svg') }}">
                                            {{ $loker->kategori }}
                                        </li>
                                        <li class="mb-2">
                                            @if (auth()->check() &&
                                                    auth()->user()->hasRole('Pencari Kerja'))
                                                <a href="javascript:void(0);"
                                                    class="bookmark-icon text-right"data-loker-id="{{ $loker->id }}">
                                                    <i class="far fa-bookmark" style="font-size: 28px;"></i>
                                                </a>
                                            @endif
                                        </li>
                                    </ul>
                                    <li class="mb-2"><img class="img-fluid img-icon"
                                            src="{{ asset('assets/img/landing-page/money.svg') }}">
                                        {{ 'IDR ' . $loker->gaji_bawah }}
                                        <span>-</span>
                                        {{ $loker->gaji_atas }}
                                    </li>
                                    <li class="mb-2"><img class="img-fluid img-icon"
                                            src="{{ asset('assets/img/landing-page/job.svg') }}">
                                        {{ $loker->min_pengalaman }}
                                    </li>
                                    <li class="mb-2"><img class="img-fluid img-icon"
                                            src="{{ asset('assets/img/landing-page/Graduation Cap.svg') }}">
                                        Minimal {{ $loker->min_pendidikan }}
                                    </li>
                                    <li class="mb-2"><img class="img-fluid img-icon"
                                            src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                                        {{ $loker->lokasi }}
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center mb-3">
                                <a id="detail-button" class="btn btn-primary px-4 py-2" style="border-radius: 25px;"
                                    href="{{ route('all-jobs.show', $loker->id) }}">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <div class="d-flex justify-content-center">
            {{ $allResults->withQueryString()->links() }}
        </div>
        {{-- <div class="fa fa-bookmark d-flex justify-content-end" style="font-size: 2.00em;" id="bookmark" onclick="Klikme()"> --}}
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
                    inputId: "posisi",
                    clearIconId: "clear-posisi"
                },
                {
                    inputId: "lokasi",
                    clearIconId: "clear-lokasi"
                },
                {
                    inputId: "kategori",
                    clearIconId: "clear-kategori"
                }
            ];

            const inputValues = {
                posisi: "",
                lokasi: "",
                kategori: ""
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

    {{-- <script>
        function Klikme() {
            document.getElementById('bookmark').style.color = "#6777ef";
        }
    </script> --}}

    <script>
        $(document).ready(function() {
            $('.bookmark-icon').each(function() {
                var icon = $(this);
                var lokerId = icon.data('loker-id');
                var storageKey = 'bookmark_' + lokerId;

                // Retrieve bookmark status from local storage
                var isBookmarked = localStorage.getItem(storageKey);
                if (isBookmarked === 'true') {
                    icon.find('i').removeClass('far fa-bookmark').addClass('fas fa-bookmark');
                } else {
                    icon.find('i').removeClass('fas fa-bookmark').addClass('far fa-bookmark');
                }

                icon.click(function() {
                    // Make an AJAX request to update bookmark status
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('bookmark.toggle') }}',
                        data: {
                            loker_id: lokerId
                        },
                        success: function(response) {
                            if (response.bookmarked) {
                                icon.find('i').removeClass('far fa-bookmark').addClass(
                                    'fas fa-bookmark');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Lowongan Pekerjaan Disimpan',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            } else {
                                icon.find('i').removeClass('fas fa-bookmark').addClass(
                                    'far fa-bookmark');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Lowongan Pekerjaan Dihapus',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }

                            // Update bookmark status in local storage
                            localStorage.setItem(storageKey, response.bookmarked);

                            // Optionally, you can display a toast or notification to indicate success
                            if (response.bookmarked) {
                                // Example using Bootstrap Toast component
                                $('.toast').toast('show');
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here if necessary
                            console.error(error);
                        }
                    });
                });
            });
        });
    </script>
@endsection

@push('customScript')
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
@endpush
