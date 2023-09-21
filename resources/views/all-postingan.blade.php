@extends('landing-page.app')
@section('title', 'WaktuSaku - Postingan')
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
                                @if (auth()->check())
                                    <div class="text-data">
                                        <span class="profile-name" style="font-weight: bold; text-align:center;">Hi!
                                            {{ auth()->user()->name }}</span>
                                        @if (!empty($profile) && !empty($profile->ringkasan))
                                            <span class="profile-deskripsi">{!! $profile->ringkasan ?? '' !!}</span>
                                        @else
                                            <span class="profile-deskripsi"><br><br></span>
                                        @endif
                                    </div>
                                    <div>
                                        <a class="btn btn-primary font-weight-light mt-3" href="{{ url('/profile') }}"
                                            style="border-radius: 25px; font-size:12px;">Lihat Profile
                                        </a>
                                    </div>
                                @else
                                    <div class="text-data">
                                        <span class="profile-name" style="font-weight: bold; text-align:center;">Hi!
                                            User</span>
                                        @if (!empty($profile) && !empty($profile->ringkasan))
                                            <span class="profile-deskripsi">{!! $profile->ringkasan ?? '' !!}</span>
                                        @else
                                            <span class="profile-deskripsi"><br><br></span>
                                        @endif
                                    </div>
                                    <div>
                                        <a class="btn btn-primary font-weight-light mt-3" href="{{ route('login') }}"
                                            style="border-radius: 25px; font-size:12px;">Masuk Akun
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            @if ($allResults->isEmpty())
                                <div class="col-md-12 text-center my-4"><br><br>
                                    <img src="{{ asset('assets/img/landing-page/folder.png') }}">
                                    <p class="mt-1 text-not">Postingan belum tersedia</p>
                                </div>
                            @else
                                @foreach ($allResults as $result)
                                    <div class="post">
                                        <div class="post-author">
                                            <img src="{{ asset('assets/img/avatar/avatar-1.png') }}">
                                            <div class="d-flex flex-column col-md-11">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h1 class="mb-0 mr-2">{{ $result->name }}</h1>
                                                    <div class="d-flex align-items-center">
                                                        <img class="img-fluid"
                                                            src="{{ asset('assets/img/landing-page/Time.svg') }}"
                                                            style="max-width: 16px; max-height: 16px; margin-right: 5px;">
                                                        <h4 class="mb-0">{{ $result->created_ago }}</h4>
                                                    </div>
                                                </div>
                                                <small>{{ $result->email }}</small>
                                            </div>
                                        </div>
                                        <p>{!! $result->konteks ?? '' !!}</p>
                                        @if (!empty($result->media))
                                            <img src="{{ asset('storage/' . $result->media) }}" width="100%"
                                                style="margin-bottom:20px;">
                                        @endif
                                    </div>
                                @endforeach
                            @endif
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
