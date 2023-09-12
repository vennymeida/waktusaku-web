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
                                    <input type="text" name="posisi" class="form-control form-jobs" id="posisi"
                                        placeholder="Cari posisi pekerjaan" value="{{ app('request')->input('posisi') }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text x-form"
                                            style="border-left: none; border-radius: 0px 15px 15px 0px;">
                                            <i class="fas fa-times-circle" id="clear-posisi" style="display: none;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group">
                                    <select name="lokasi" id="lokasi" class="form-control form-jobs select2">
                                        <option value="" selected>Lokasi</option>
                                        @foreach ($kecamatan as $key)
                                            <option value="{{ $key->kecamatan }}"
                                                @if ($key->kecamatan == $lokasi) selected @endif>{{ $key->kecamatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group">
                                    <select name="kategori[]" id="kategori" class="form-control form-jobs select2 kategori"
                                        multiple>
                                        @foreach ($kategoris as $key)
                                            <option value="{{ $key->kategori }}"
                                                @if (in_array($key->kategori, $kategori)) selected @endif>
                                                {{ $key->kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <button id="search-button" class="btn btn-primary mr-1 px-4 py-2" type="submit"
                                    style="border-radius: 15px;">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        @role('Pencari Kerja')
            <section>
                <div class="col-md-10 mt-0 mx-auto">
                    <p class="mt-4 font-weight-bold ml-4" style="font-size: 19px;">Rekomendasi Lowongan Kerja Sesuai Keahlian
                        Anda!
                    </p>
                    @if ($allRekomendasi->isEmpty())
                        <div class="col-md-12 text-center my-4">
                            <img src="{{ asset('assets/img/landing-page/sad-face.png') }}">
                            <p class="mt-2 text-not">Belum ada rekomendasi untukmu</p>
                        </div>
                    @else
                        <div class="row flex-nowrap overflow-auto mt-4 horizontal-scroll equal-height-cards">
                            <div class="scroll-arrow left bg-transparent text-secondary">
                                <i class="fas fa-angle-left"></i>
                            </div>
                            @foreach ($allRekomendasi as $key => $rekomendasi)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body d-flex flex-column">
                                            <div class="position-relative">
                                                <div class="gradient-overlay"></div>
                                                <img class="img-fluid mb-3 fixed-height-image position-absolute top-0 start-50 translate-middle-x"
                                                    src="{{ asset('storage/' . $rekomendasi->logo) }}" alt="Company Logo">
                                                <p class="text-white card-title font-weight-bold mb-0 ml-2 overlap-text"
                                                    style="font-size: 20px;">
                                                    {{ $rekomendasi->judul }}
                                                </p>
                                                <a class="text-white ml-2 overlap-text-2"
                                                    href="{{ route('detail-perusahaan.show', $rekomendasi->id_perusahaan) }}"
                                                    style="font-size: 14px;">
                                                    {{ $rekomendasi->nama }}
                                                </a>
                                            </div>
                                            <div class="card-text-recom mt-3">
                                                <ul class="list-unstyled ml-2">
                                                    <ul class="list-unstyled d-flex justify-content-between">
                                                        <li class="d-flex justify-content-start">
                                                            <img class="img-fluid img-icon mr-2"
                                                                src="{{ asset('assets/img/landing-page/list.svg') }}">
                                                            <p class="mb-2">{{ $rekomendasi->kategori }}</p>
                                                        </li>
                                                        <li class="mb-2">
                                                            @if (auth()->check() &&
                                                                    auth()->user()->hasRole('Pencari Kerja'))
                                                                <a href="javascript:void(0);" class="bookmark-icon"
                                                                    data-loker-id="{{ $rekomendasi->id }}">
                                                                    <i class="far fa-bookmark" style="font-size: 20px;"></i>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                    <li class="d-flex justify-content-start">
                                                        <img class="img-fluid img-icon mr-2"
                                                            src="{{ asset('assets/img/landing-page/money.svg') }}">
                                                        <p class="mb-2">{{ 'IDR ' . $rekomendasi->gaji_bawah }}
                                                            <span>-</span>
                                                            {{ $rekomendasi->gaji_atas }}
                                                        </p>
                                                    </li>
                                                    <li class="d-flex justify-content-start">
                                                        <img class="img-fluid img-icon mr-2"
                                                            src="{{ asset('assets/img/landing-page/job.svg') }}">
                                                        <p class="mb-2">{{ $rekomendasi->min_pengalaman }}</p>
                                                    </li>
                                                    <li class="d-flex justify-content-start">
                                                        <img class="img-fluid img-icon mr-2"
                                                            src="{{ asset('assets/img/landing-page/Graduation Cap.svg') }}">
                                                        <p class="mb-2">Minimal {{ $rekomendasi->min_pendidikan }}</p>
                                                    </li>
                                                    <li class="d-flex justify-content-start">
                                                        <img class="img-fluid img-icon mr-2"
                                                            src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                                                        <p class="mb-2">{{ $rekomendasi->lokasi }}</p>
                                                    </li>
                                                    <li class="d-flex justify-content-start">
                                                        <img class="img-fluid img-icon mr-2"
                                                            src="{{ asset('assets/img/landing-page/Office Building.svg') }}">
                                                        <p class="mb-2">{{ $rekomendasi->alamat_perusahaan }},
                                                            {{ $rekomendasi->kelurahan }},
                                                            {{ $rekomendasi->kecamatan }}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="text-center mb-2">
                                                <a id="detail-button" class="btn btn-primary px-4 py-2"
                                                    style="border-radius: 25px;"
                                                    href="{{ route('all-jobs.show', $rekomendasi->id) }}">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="scroll-arrow right bg-transparent text-secondary">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        @endrole

        <section>
            @role('Pencari Kerja')
                <div class="col-md-10 mx-auto">
                    <p class="mt-3 font-weight-bolder ml-4" style="font-size: 19px;">Lowongan Kerja Seluruhnya</p>
                </div>
            @endrole
            <div class="col-md-12 mt-4 mx-auto d-flex flex-wrap justify-content-center">
                @if ($allResults->isEmpty())
                    <div class="col-md-12 text-center my-4">
                        <img src="{{ asset('assets/img/landing-page/folder.png') }}">
                        <p class="mt-1 text-not">Data tidak tersedia</p>
                    </div>
                @else
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
                                    <a class="text-white ml-2 overlap-text-2"
                                        href="{{ route('detail-perusahaan.show', $loker->id_perusahaan) }}"
                                        style="font-size: 14px;">
                                        {{ $loker->nama }}
                                    </a>
                                </div>
                                <div class="card-text mt-4">
                                    <ul class="list-unstyled ml-2">
                                        <ul class="list-unstyled d-flex justify-content-between">
                                            <li class="d-flex justify-content-start">
                                                <img class="img-fluid img-icon mr-2"
                                                    src="{{ asset('assets/img/landing-page/list.svg') }}">
                                                <p class="mb-2">{{ $loker->kategori }}</p>
                                            </li>
                                            <li class="mb-2">
                                                @if (auth()->check() &&
                                                        auth()->user()->hasRole('Pencari Kerja'))
                                                    <a href="javascript:void(0);"
                                                        class="bookmark-icon text-right"data-loker-id="{{ $loker->id }}">
                                                        <i class="far fa-bookmark" style="font-size: 20px;"></i>
                                                    </a>
                                                @endif
                                            </li>
                                        </ul>
                                        <li class="d-flex justify-content-start">
                                            <img class="img-fluid img-icon mr-2"
                                                src="{{ asset('assets/img/landing-page/money.svg') }}">
                                            <p class="mb-2">{{ 'IDR ' . $loker->gaji_bawah }}
                                                <span>-</span>
                                                {{ $loker->gaji_atas }}
                                            </p>
                                        </li>
                                        <li class="d-flex justify-content-start">
                                            <img class="img-fluid img-icon mr-2"
                                                src="{{ asset('assets/img/landing-page/job.svg') }}">
                                            <p class="mb-2">{{ $loker->min_pengalaman }}</p>
                                        </li>
                                        <li class="d-flex justify-content-start">
                                            <img class="img-fluid img-icon mr-2"
                                                src="{{ asset('assets/img/landing-page/Graduation Cap.svg') }}">
                                            <p class="mb-2">Minimal {{ $loker->min_pendidikan }}</p>
                                        </li>
                                        <li class="d-flex justify-content-start">
                                            <img class="img-fluid img-icon mr-2"
                                                src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                                            <p class="mb-2">{{ $loker->lokasi }}</p>
                                        </li>
                                        <li class="d-flex justify-content-start">
                                            <img class="img-fluid img-icon mr-2"
                                                src="{{ asset('assets/img/landing-page/Office Building.svg') }}">
                                            <p class="mb-2">{{ $loker->alamat_perusahaan }},
                                                {{ $loker->kelurahan }},
                                                {{ $loker->kecamatan }}</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-center">
                                    <a id="detail-button" class="btn btn-primary px-4 py-2" style="border-radius: 25px;"
                                        href="{{ route('all-jobs.show', $loker->id) }}">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <div class="d-flex justify-content-center">
            {{ $allResults->withQueryString()->links() }}
        </div>
    </main>

    <script>
        const scrollableContent = document.querySelector('.horizontal-scroll');
        const scrollLeftArrow = document.querySelector('.scroll-arrow.left');
        const scrollRightArrow = document.querySelector('.scroll-arrow.right');

        scrollLeftArrow.addEventListener('click', () => {
            scrollableContent.scrollLeft -= 370;
        });

        scrollRightArrow.addEventListener('click', () => {
            scrollableContent.scrollLeft += 370;
        });
    </script>

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
            const cards = document.querySelectorAll(".card-text-recom");
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
            ];

            const inputValues = {
                posisi: "",
                lokasi: "",
            };

            inputsAndIcons.forEach(item => {
                const input = document.getElementById(item.inputId);
                const clearIcon = document.getElementById(item.clearIconId);

                inputValues[item.inputId] = input.value;
                clearIcon.style.display = inputValues[item.inputId] ? "block" : "none";

                input.addEventListener("input", function() {
                    inputValues[item.inputId] = this.value;
                    clearIcon.style.display = this.value ? "block" : "none";
                });

                clearIcon.addEventListener("click", function() {
                    input.value = "";
                    currentInputValue = "";
                    inputValues[item.inputId] = "";
                    clearIcon.style.display = "none";
                    submitForm(inputValues[item.inputId]);
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
        document.addEventListener("DOMContentLoaded", function() {
            const formIcon = document.querySelector(".icon-form");
            const formX = document.querySelector(".x-form");
            const posisiInput = document.querySelector("input[name='posisi']");

            posisiInput.addEventListener("focus", function() {
                formIcon.style.borderColor = '#95a0f4';
                formX.style.borderColor = '#95a0f4';
            });

            posisiInput.addEventListener("blur", function() {
                formIcon.style.borderColor = '';
                formX.style.borderColor = '';
            });
        })
    </script>

    <script>
        function handleFormSubmit() {
            document.querySelectorAll('.clear-icon').forEach(icon => {
                const select = icon.parentElement.querySelector('input, select');
                icon.style.display = select.value ? "block" : "none";
            });

            document.querySelectorAll('.input-group input').forEach(input => {
                const icon = input.parentElement.querySelector('.clear-icon');
                icon.style.display = input.value ? "block" : "none";
            });
        }
    </script>

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

@push('customStyle')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush

@push('customScript')
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.kategori').select2({
                placeholder: 'Kategori',
            });
        });
    </script>
@endpush
