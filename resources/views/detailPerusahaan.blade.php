@extends('landing-page.app')

@section('main')
    <main class="bg-light">
        <div class="col-md-12">
            <div class="col-md-11 mx-auto">
                <a href="{{ route('all-jobs.index') }}">
                    <img class="img-fluid img-icon mt-3" src="{{ asset('assets/img/landing-page/back.svg') }}"
                        style="width: 30px; height: auto;">
                </a>
            </div>
        </div>

        <section>
            <div class="col-md-12 detail-header">
                <div class="col-md-10 mx-auto">
                    <ul class="list-unstyled">
                        <ul class="list-unstyled d-flex justify-content-start">
                            <li class="col-md-2 d-flex justify-content-satrt mr-5 mt-3">
                                <img class="img-fluid img-icon mr-2" src="{{ asset('assets/img/landing-page/phone.svg') }}">
                                <p class="mb-3" style="font-size: 15px;">{{ $detail->no_hp }} </p>
                            </li>
                            <li class="col-md-10 mt-3">
                                <h5 class="font-weight-bolder">{{ $detail->nama }} </h5>
                            </li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-start text-justify">
                            <li class="col-md-2 d-flex justify-content-satrt mr-5">
                                <img class="img-fluid img-icon mr-2" src="{{ asset('assets/img/landing-page/Email.svg') }}">
                                <p class="mb-3" style="font-size: 15px;">{{ $detail->email }} </p>
                            </li>
                            <li class="col-md-10">
                                <p style="font-size: 15px;">{{ $detail->deskripsi }} </p>
                            </li>
                        </ul>
                        <ul class="list-unstyled d-flex justify-content-start">
                            <li class="col-md-2 d-flex justify-content-satrt mr-5">
                                <img class="img-fluid img-icon mr-2"
                                    src="{{ asset('assets/img/landing-page/global.svg') }}">
                                <p class="mb-3" style="font-size: 15px;">{{ $detail->website }} </p>
                            </li>
                        </ul>
                        <li class="col-md-12 d-flex justify-content-end ml-5">
                            <img class="img-fluid img-icon mr-1"
                                src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                            <p class="mb-5" style="font-size: 15px;">{{ $detail->alamat }},
                                {{ $detail->kelurahan->kelurahan }},
                                {{ $detail->kecamatan->kecamatan }} </p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <div class="col-md-10 mx-auto">
            <div class="col-md-3">
                <div class="logo-container">
                    <img class="img-fluid bg-white mt-4" src="{{ asset('storage/' . $detail->logo) }}"
                        style="width: 75%; height: 75%; background: linear-gradient(to bottom, rgb(196, 204, 213, 0.2), rgb(196, 204, 213, 0.7)); border-radius: 30px;">
                </div>
            </div>
        </div>

        <section>
            <div class="col-md-12 mt-5">
                <div class="col-md-10 mx-auto">
                    <ul class="list-unstyled">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <h5 class="font-weight-bolder">Lowongan Kerja</h5>
                            <a class="text-primary font-weight-bolder" href="{{ route('all-jobs.index') }}">Lihat
                                lainnya</a>
                        </ul>
                    </ul>
                </div>
            </div>
        </section>

        <section>
            <div class="col-md-12 mt-4 mx-auto d-flex flex-wrap justify-content-center">
                @foreach ($lowonganPekerjaan as $loker)
                    <div class="card col-md-3 mb-4 mx-4">
                        <div class="card-body d-flex flex-column">
                            <div class="position-relative">
                                <div class="gradient-overlay"></div>
                                <img class="img-fluid mb-3 fixed-height-image position-absolute top-0 start-50 translate-middle-x"
                                    src="{{ asset('storage/' . $detail->logo) }}" alt="Company Logo">
                                <p class="text-white card-title font-weight-bold mb-0 ml-2 overlap-text"
                                    style="font-size: 20px;">
                                    {{ $loker->judul }}
                                </p>
                                <a class="text-white ml-2 overlap-text-2" style="font-size: 14px;">
                                    {{ $detail->nama }}
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
                                            src="{{ asset('assets/img/landing-page/Office Building.svg') }}">
                                        <p class="mb-2">{{ $loker->lokasi }}</p>
                                    </li>
                                </ul>
                            </div>
                            @role('Pencari Kerja')
                                <div class="text-center mb-3">
                                    <a id="detail-button" class="btn btn-primary px-4 py-2" style="border-radius: 25px;"
                                        href="{{ route('all-jobs.show', $loker->id) }}">Lihat Detail</a>
                                </div>
                            @endrole
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
