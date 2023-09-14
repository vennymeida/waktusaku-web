@extends('landing-page.app')
@section('main')
    <main class="bg-light">
        <section>
            <div class="col md-12 mt-4">
                <p class="font-weight-bolder ml-5" style="font-size: 20px">Detail Lowongan Pekerjaan</p>
            </div>
        </section>

        <section>
            <div class="col-md-12 mx-auto mt-4">
                <div class="col-md-10 bg-white mx-auto py-5" style="border-radius: 15px;">
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <img class="img-fluid rounded-circle"
                                src="{{ asset('storage/' . $loker_perusahaan->perusahaan->logo) }}"
                                style="width: 245px; height: 245px; background: linear-gradient(to bottom, rgb(196, 204, 213, 0.2), rgb(196, 204, 213, 0.7));">
                        </div>
                        <div class="col-md-7">
                            <ul class="list-unstyled">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <p class="mb-2 text-primary font-weight-bold" style="font-size: 28px;">
                                        {{ $loker_perusahaan->judul }}
                                    </p>
                                    <a class="btn btn-secondary px-4" href="{{ route('loker-perusahaan.index') }}"
                                        style="border-radius: 15px;">
                                        Kembali
                                    </a>
                                </ul>
                                <p class="mb-2" style="font-size: 19px;">{{ $loker_perusahaan->perusahaan->nama }}</p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/Office Building.svg') }}">
                                    {{ $kategori }}
                                </p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/money.svg') }}">
                                    {{ 'IDR ' . $loker_perusahaan->gaji_bawah }}
                                    <span>-</span>
                                    {{ $loker_perusahaan->gaji_atas }}
                                </p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/job.svg') }}">
                                    {{ $loker_perusahaan->min_pengalaman }}
                                </p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/hourglass.svg') }}">
                                    {{ $loker_perusahaan->tipe_pekerjaan }}
                                </p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/Graduation Cap.svg') }}">
                                    {{ $loker_perusahaan->min_pendidikan }}
                                </p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                                    {{ $loker_perusahaan->lokasi }}
                                </p>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                <button
                                    class="px-4 mt-2 mr-1 btn btn-status 
                                        @if ($loker_perusahaan->status === 'Pending') btn-warning 
                                        @elseif ($loker_perusahaan->status === 'Dibuka') btn-success 
                                        @elseif ($loker_perusahaan->status === 'Ditutup') btn-secondary @endif"
                                    style="border-radius: 20px;">
                                    {{ $loker_perusahaan->status }}
                                </button>
                                <li class="font-italic mt-2 time" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/Time.svg') }}"> Tayang
                                    {{ $updatedAgo }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <hr class="my-4">
                    <div class="col-md-11 mx-auto my-5">
                        <h5 class="font-weight-bolder">Deskripsi Lowongan : </h5>
                        <p class="text-justify">{{ $loker_perusahaan->deskripsi }}</p>
                    </div>

                    <hr class="my-4">
                    <div class="col-md-11 mx-auto my-5">
                        <h5 class="font-weight-bolder">Keahlian : </h5>
                        @foreach ($loker_perusahaan->keahlian as $key => $keahlian)
                            <button class="px-4 mt-2 mr-1 btn btn-skill">{{ $keahlian->keahlian }}</button>
                        @endforeach
                    </div>

                    <hr class="my-4">
                    <div class="col-md-11 mx-auto mt-5">
                        <h5 class="font-weight-bolder">Persyaratan : </h5>
                    </div>
                    <textarea id="autoSizeTextarea" class="form-control form-show ml-5" type="text" disabled>{{ $loker_perusahaan->requirement }}</textarea>

                    <hr class="mt-3">
                    <div class="col-md-11 mx-auto mt-5">
                        <h5 class="mb-5 font-weight-bold">Tentang Perusahaan</h5>
                        <div class="row">
                            <div class="col-md-3 d-flex align-items-center justify-content-center">
                                <img class="img-fluid" src="{{ asset('storage/' . $loker_perusahaan->perusahaan->logo) }}"
                                    style="width: 155px; height: 155px; background: linear-gradient(to bottom, rgb(196, 204, 213, 0.2), rgb(196, 204, 213, 0.7)); border-radius: 10px;">
                            </div>
                            <div class="col-md-4 d-flex align-items-center">
                                <p class="mb-2" style="font-size: 19px;">{{ $loker_perusahaan->perusahaan->nama }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-11 mx-auto mt-5">
                        <h5 class="font-weight-bold">Deskripsi Perusahaan</h5>
                        <p class="text-justify">{{ $loker_perusahaan->perusahaan->deskripsi }}</p>
                    </div>

                    <div class="col-md-11 mx-auto mt-5">
                        <h5 class="font-weight-bold">Alamat Perusahaan</h5>
                        <p class="text-justify">{{ $loker_perusahaan->perusahaan->alamat }}</p>
                    </div>

                    <div class="col-md-11 mx-auto mt-5">
                        <h5 class="font-weight-bold mb-4">Kontak Perusahaan</h5>
                        <div class="col-md-12 justify-content-center">
                            <div class="row">
                                <div class="card-primary-left col-md-3 mr-5 mb-1 text-center">
                                    <i class="fas fa-globe-asia my-3"></i>
                                    <p class="mb-4">{{ $loker_perusahaan->perusahaan->website }}</p>
                                </div>
                                <div class="card-primary-left col-md-3 mr-5 mb-1 text-center">
                                    <i class="fas fa-phone my-3"></i>
                                    <p class="mb-4">{{ $loker_perusahaan->perusahaan->no_hp_perusahaan }}</p>
                                </div>
                                <div class="card-primary-left col-md-3 mb-1 text-center">
                                    <i class="fas fa-envelope my-3"></i>
                                    <p class="mb-4">{{ $loker_perusahaan->perusahaan->website }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>

    <script>
        const textarea = document.getElementById('autoSizeTextarea');

        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        textarea.style.height = (textarea.scrollHeight) + 'px';
    </script>
@endsection
