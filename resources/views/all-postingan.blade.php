@extends('landing-page.app')

@section('main')
    <main class="bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row mt-5">
                        <div class="col-md-4">
                            <div class="profile-card">
                                <div class="image">
                                    <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt=""
                                        class="profile-img">
                                </div>
                                <div class="text-data">
                                    <span class="profile-name" style="font-weight: bold; text-align:center;">Hi!
                                        Pelamar</span>
                                    <span class="profile-deskripsi">Sebuah deskripsi diri pelamar Sebuah deskripsi diri pelamar Sebuah deskripsi diri pelamar</span>
                                </div>
                                <div>
                                    <a class="btn btn-primary font-weight-light mt-3" href="{{ route('login') }}"
                                        style="border-radius: 25px; font-size:12px;">Lihat Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="post">
                                <div class="post-author">
                                    <img src="{{ asset('assets/img/avatar/avatar-1.png') }}">
                                    <div class="d-flex flex-column col-md-11">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h1 class="mb-0 mr-2">Jeon Jungkook</h1>
                                            <div class="d-flex align-items-center">
                                                <img class="img-fluid"
                                                    src="{{ asset('assets/img/landing-page/Time.svg') }}"
                                                    style="max-width: 16px; max-height: 16px; margin-right: 5px;">
                                                <h4 class="mb-0">2 jam yg lalu</h4>
                                            </div>
                                        </div>
                                        <small>kookie@gmail.com</small>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Voluptatum, id iste aliquam accusamus natus corporis. Perferendis odio,
                                    incidunt nesciunt consequuntur quo mollitia voluptatibus eos, ipsa est alias voluptas
                                    maxime. Ab?</p>
                                <img src="{{ asset('assets/img/news/img01.jpg') }}" width="100%"
                                    style="margin-bottom:20px;">
                            </div>
                            <div class="post">
                                <div class="post-author">
                                    <img src="{{ asset('assets/img/avatar/avatar-1.png') }}">
                                    <div class="d-flex flex-column col-md-11">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h1 class="mb-0 mr-2">Jeon Jungkook</h1>
                                            <div class="d-flex align-items-center">
                                                <img class="img-fluid"
                                                    src="{{ asset('assets/img/landing-page/Time.svg') }}"
                                                    style="max-width: 16px; max-height: 16px; margin-right: 5px;">
                                                <h4 class="mb-0">2 jam yg lalu</h4>
                                            </div>
                                        </div>
                                        <small>kookie@gmail.com</small>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Voluptatum, id iste aliquam accusamus natus corporis. Perferendis odio,
                                    incidunt nesciunt consequuntur quo mollitia voluptatibus eos, ipsa est alias voluptas
                                    maxime. Ab?</p>
                                {{-- <img src="{{ asset('assets/img/news/img01.jpg') }}" width="100%"
                                    style="margin-bottom:20px;"> --}}
                            </div>
                            <div class="post">
                                <div class="post-author">
                                    <img src="{{ asset('assets/img/avatar/avatar-1.png') }}">
                                    <div class="d-flex flex-column col-md-11">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h1 class="mb-0 mr-2">Jeon Jungkook</h1>
                                            <div class="d-flex align-items-center">
                                                <img class="img-fluid"
                                                    src="{{ asset('assets/img/landing-page/Time.svg') }}"
                                                    style="max-width: 16px; max-height: 16px; margin-right: 5px;">
                                                <h4 class="mb-0">2 jam yg lalu</h4>
                                            </div>
                                        </div>
                                        <small>kookie@gmail.com</small>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Voluptatum, id iste aliquam accusamus natus corporis. Perferendis odio,
                                    incidunt nesciunt consequuntur quo mollitia voluptatibus eos, ipsa est alias voluptas
                                    maxime. Ab?</p>
                                <img src="{{ asset('assets/img/news/img01.jpg') }}" width="100%"
                                    style="margin-bottom:20px;">
                            </div>
                            <div class="post">
                                <div class="post-author">
                                    <img src="{{ asset('assets/img/avatar/avatar-1.png') }}">
                                    <div class="d-flex flex-column col-md-11">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h1 class="mb-0 mr-2">Jeon Jungkook</h1>
                                            <div class="d-flex align-items-center">
                                                <img class="img-fluid"
                                                    src="{{ asset('assets/img/landing-page/Time.svg') }}"
                                                    style="max-width: 16px; max-height: 16px; margin-right: 5px;">
                                                <h4 class="mb-0">2 jam yg lalu</h4>
                                            </div>
                                        </div>
                                        <small>kookie@gmail.com</small>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Voluptatum, id iste aliquam accusamus natus corporis. Perferendis odio,
                                    incidunt nesciunt consequuntur quo mollitia voluptatibus eos, ipsa est alias voluptas
                                    maxime. Ab?</p>
                                <img src="{{ asset('assets/img/news/img01.jpg') }}" width="100%"
                                    style="margin-bottom:20px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('customStyle')
@endpush

@push('customScript')
@endpush
