@extends('landing-page.app')

@section('main')
    <main class="bg-light">
        <section>
            <div class="col-md-12 text-right my-3">
                <a class="text-primary" href="{{ route('all-jobs.index') }}" style="font-size: 14px;">Lowongan
                    Pekerjaan</a><span> / </span>
                <a class="text-secondary mr-5" style="font-size: 14px;" disabled>Detail</a>
            </div>
        </section>

        <section>
            <div class="col-md-12 mx-auto mt-4">
                <div class="col-md-10 bg-white mx-auto py-5" style="border-radius: 15px;">
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <img class="img-fluid rounded-circle" src="{{ asset('storage/' . $loker->perusahaan->logo) }}"
                                style="width: 245px; height: 245px; background: linear-gradient(to bottom, rgb(196, 204, 213, 0.2), rgb(196, 204, 213, 0.7));">
                        </div>
                        <div class="col-md-7">
                            <ul class="list-unstyled">
                                <p class="mb-2 text-primary font-weight-bold" style="font-size: 28px;">{{ $loker->judul }}
                                </p>
                                <p class="mb-2" style="font-size: 19px;">{{ $loker->perusahaan->nama }}</p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/Office Building.svg') }}">
                                    {{ $kategori }}
                                </p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/money.svg') }}">
                                    {{ 'IDR ' . $loker->gaji_bawah }}
                                    <span>-</span>
                                    {{ $loker->gaji_atas }}
                                </p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/job.svg') }}">
                                    {{ $loker->min_pengalaman }}
                                </p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/hourglass.svg') }}">
                                    {{ $loker->tipe_pekerjaan }}
                                </p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/Graduation Cap.svg') }}">
                                    {{ $loker->min_pendidikan }}
                                </p>
                                <p class="mb-2" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                                    {{ $loker->lokasi }}
                                </p>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-between">
                                @if (Auth::check() && $loker->hasApplied)
                                    <button class="btn btn-secondary px-5 py-2" style="border-radius: 25px; color: #ffffff;"
                                        disabled>Terlamar</button>
                                @else
                                    <a id="detail-button" class="btn btn-primary px-5 py-2"
                                        style="border-radius: 25px; color: #ffffff;" data-toggle="modal"
                                        data-target="#lamarModal">Lamar</a>
                                @endif
                                <p class="font-italic mt-2 time" style="font-size: 14px;"><img class="img-fluid img-icon"
                                        src="{{ asset('assets/img/landing-page/Time.svg') }}"> Tayang {{ $updatedAgo }}
                                </p>
                            </ul>
                        </div>
                    </div>

                    <hr class="my-4">
                    <div class="col-md-11 mx-auto my-5">
                        <h5 class="font-weight-bolder">Keahlian : </h5>
                        @foreach ($loker->keahlian as $key => $keahlian)
                            <button class="px-4 mt-2 mr-1 btn btn-skill">{{ $keahlian->keahlian }}</button>
                        @endforeach
                    </div>

                    <hr class="my-4">
                    <div class="col-md-11 mx-auto mt-5">
                        <h5 class="font-weight-bolder">Persyaratan : </h5>
                    </div>
                    <textarea id="autoSizeTextarea" class="form-control form-show ml-5" type="text" disabled>{{ $loker->requirement }}</textarea>

                    <hr class="mt-3">
                    <div class="col-md-11 mx-auto mt-5">
                        <h5 class="mb-5 font-weight-bold">Tentang Perusahaan</h5>
                        <div class="row">
                            <div class="col-md-3 d-flex align-items-center justify-content-center">
                                <img class="img-fluid" src="{{ asset('storage/' . $loker->perusahaan->logo) }}"
                                    style="width: 155px; height: 155px; background: linear-gradient(to bottom, rgb(196, 204, 213, 0.2), rgb(196, 204, 213, 0.7)); border-radius: 10px;">
                            </div>
                            <div class="col-md-4 d-flex align-items-center">
                                <p class="mb-2" style="font-size: 19px;">{{ $loker->perusahaan->nama }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-11 mx-auto mt-5">
                        <h5 class="font-weight-bold">Deskripsi Perusahaan</h5>
                        <p class="text-justify">{{ $loker->perusahaan->deskripsi }}</p>
                    </div>

                    <div class="col-md-11 mx-auto mt-5">
                        <h5 class="font-weight-bold">Alamat Perusahaan</h5>
                        <p class="text-justify">{{ $loker->perusahaan->alamat }}</p>
                    </div>

                    <div class="col-md-11 mx-auto mt-5">
                        <h5 class="font-weight-bold mb-4">Kontak Perusahaan</h5>
                        <div class="col-md-12 justify-content-center">
                            <div class="row">
                                <div class="card-primary-left col-md-3 mr-5 mb-1 text-center">
                                    <i class="fas fa-globe-asia my-3"></i>
                                    <p class="mb-4">{{ $loker->perusahaan->website }}</p>
                                </div>
                                <div class="card-primary-left col-md-3 mr-5 mb-1 text-center">
                                    <i class="fas fa-phone my-3"></i>
                                    <p class="mb-4">{{ $loker->perusahaan->no_hp }}</p>
                                </div>
                                <div class="card-primary-left col-md-3 mb-1 text-center">
                                    <i class="fas fa-envelope my-3"></i>
                                    <p class="mb-4">{{ $loker->perusahaan->website }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('melamar.daftar')
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
