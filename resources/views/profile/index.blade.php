@extends('landing-page.app')
@section('main')
    <main class="bg-secondary">
        <section>
            <div class="bg-header col-md-12 py-3">
                <h4 class="text-center" style="text-align: center; font-weight: bold;">Data Diri</h4>
            </div>
        </section>
        <section>
            <div class="bg-profile col-md-12 py-5">
                <div class="d-flex justify-content-around align-items-center">
                    <div class="col-md-2">
                        <div class="profile-widget-header" style="position: relative;">
                            @if (Auth::user()->profile && Auth::user()->profile->foto != '')
                                <img alt="image"
                                    src="{{ Auth::user()->profile ? Storage::url(Auth::user()->profile->foto) : '' }}"
                                    class="rounded-circle profile-widget-picture img-fluid"
                                    style="width: 200px; height: 190px; position: absolute; top: -170px; left: 50%; transform: translateX(-50%);">
                            @else
                                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    class="rounded-circle profile-widget-picture img-fluid"
                                    style="width: 200px; height: 190px; position: absolute; top: -170px; left: 50%; transform: translateX(-50%);">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-widget-description"
                            style="font-weight: bold; font-size: 18px; display: flex; align-items: center;">
                            <div class="flex-grow-1">
                                <div class="profile-widget-name">{{ Auth::user()->name }}</div>
                            </div>
                            <div class="d-flex justify-content-end" style="font-size: 2.00em;" id="fluid">
                                <a href="{{ url('/profile-edit') }}">
                                <img class="img-fluid" style="width: 35px; height: 35px;"
                                    src="{{ asset('assets/img/landing-page/edit-pencil.svg') }}">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="profile-widget-description mt-4" style="font-size: 14px;">
                                    @if (Auth::user()->profile && Auth::user()->profile->ringkasan != '')
                                        <p style="font-weight: bold;">Ringkasan</p>
                                        <p style="line-height: 1.5; margin-top: -2%;">
                                            {{ Auth::user()->profile ? Auth::user()->profile->ringkasan : '' }}
                                        </p>
                                    @else
                                        <p style="font-weight: bold;">Ringkasan</p>
                                        <p style="line-height: 1.5; margin-top: -2%;"><br><br><br></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description mt-2" style="font-size: 14px;">
                            <p style="font-weight: bold;">Personal Info</p>
                            <div class="row">
                                <div class="col-md-4">
                                    @if (Auth::user()->email != '')
                                        <p style="line-height: 0.5; font-weight: bold;">Email</p>
                                        <p style="line-height: 1.5; margin-top: -1%;">{{ Auth::user()->email }}</p>
                                    @else
                                        <p style="line-height: 0.5; font-weight: bold;">Email</p>
                                        <p style="line-height: 1.5; margin-top: -1%;"><br></p>
                                    @endif
                                    @if (Auth::user()->profile && Auth::user()->profile->no_hp != '')
                                        <p style="line-height: 0.5; font-weight: bold;">Nomor Telepon</p>
                                        <p style="line-height: 1.5; margin-top: -1%;">
                                            {{ Auth::user()->profile ? Auth::user()->profile->no_hp : '' }}</p>
                                    @else
                                        <p style="line-height: 0.5; font-weight: bold;">Nomor Telepon</p>
                                        <p style="line-height: 1.5; margin-top: -1%;"><br></p>
                                    @endif
                                </div>
                                <div class="col-md-5">
                                    @if (Auth::user()->profile && Auth::user()->profile->alamat != '')
                                        <p style="line-height: 0.5; font-weight: bold;">Alamat</p>
                                        <p style="line-height: 1.5; margin-top: -1%;">
                                            {{ Auth::user()->profile ? Auth::user()->profile->alamat : '' }}</p>
                                    @else
                                        <p style="line-height: 0.5; font-weight: bold;">Alamat</p>
                                        <p style="line-height: 1.5; margin-top: -1%;"><br></p>
                                    @endif
                                    @if (Auth::user()->profile && Auth::user()->profile->tgl_lahir != '')
                                        <p style="line-height: 0.5; font-weight: bold;">Tanggal Lahir</p>
                                        <p style="line-height: 1.5; margin-top: -1%;">
                                            {{ Auth::user()->profile ? Auth::user()->profile->tgl_lahir : '' }}</p>
                                    @else
                                        <p style="line-height: 0.5; font-weight: bold;">Tanggal Lahir</p>
                                        <p style="line-height: 1.5; margin-top: -1%;"><br></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="centered-section">
            <div class="bg-primary-section col-md-10 py-1">
                <div class="profile-widget-description m-3"
                    style="font-weight: bold; font-size: 18px; display: flex; align-items: center;">
                    <div class="flex-grow-1">
                        <div class="profile-widget-name">Pendidikan</div>
                    </div>
                    <div class="d-flex justify-content-end" style="font-size: 2.00em;" id="fluid">
                        <a href="#" id="modal-create">
                        <img class="img-fluid" style="width: 35px; height: 35px;"
                            src="{{ asset('assets/img/landing-page/Plus.svg') }}">
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="flex-grow-1 mb-2">
                        <div class="profile-widget-name"
                        style="font-weight: bold; font-size: 16px; display: flex; align-items: center;">
                        Politeknik Negeri Malang
                        </div>
                    </div>
                    <ul class="list-unstyled ml-2">
                        <li class="mb-2"><img class="img-fluid"
                                src="{{ asset('assets/img/landing-page/Graduation Cap (2).svg') }}">&nbsp&nbsp&nbsp&nbspD4 Teknik Informatika
                        </li>
                        <li class="mb-2"><img class="img-fluid"
                                src="{{ asset('assets/img/landing-page/Award.svg') }}">&nbsp&nbsp&nbspMengikuti Lomba KMIPN
                        </li>
                        <li class="mb-2"><img class="img-fluid"
                                src="{{ asset('assets/img/landing-page/timeline.svg') }}">&nbsp&nbsp&nbsp&nbsp3.75
                        </li>
                        <li class="mb-2"><img class="img-fluid"
                                src="{{ asset('assets/img/landing-page/Time.svg') }}">&nbsp&nbsp&nbsp&nbsp2020-2024
                        </li>
                    </ul>
                </div>
                <a href="#"><p class="corner-text">Lihat Selengkapnya...</p></a>
            </div>
        </section>
        <section class="centered-section">
            <div class="bg-primary-section col-md-10 py-1">
                <div class="profile-widget-description m-3"
                    style="font-weight: bold; font-size: 18px; display: flex; align-items: center;">
                    <div class="flex-grow-1">
                        <div class="profile-widget-name">Keahlian Saya</div>
                    </div>
                    <div class="d-flex justify-content-end" style="font-size: 2.00em;" id="fluid">
                        <a href="#">
                        <img class="img-fluid" style="width: 35px; height: 35px;"
                            src="{{ asset('assets/img/landing-page/Plus.svg') }}">
                        </a>
                    </div>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="flex-grow-1 mb-2">
                        <div class="card-header-action">
                            <a href="#" class="btn btn-primary" id="skill-button">Leadership</a>
                            <a href="#" class="btn btn-primary" id="skill-button">Edit Foto dan Video</a>
                            <a href="#" class="btn btn-primary" id="skill-button">Public Speaking</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="centered-section">
            <div class="bg-primary-section col-md-10 py-1">
                <div class="profile-widget-description m-3"
                    style="font-weight: bold; font-size: 18px; display: flex; align-items: center;">
                    <div class="flex-grow-1">
                        <div class="profile-widget-name">Pengalaman Kerja</div>
                    </div>
                    <div class="d-flex justify-content-end" style="font-size: 2.00em;" id="fluid">
                        <a href="#">
                        <img class="img-fluid" style="width: 35px; height: 35px;"
                            src="{{ asset('assets/img/landing-page/Plus.svg') }}">
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="flex-grow-1 mb-2">
                        <div class="profile-widget-name"
                        style="font-weight: bold; font-size: 16px; display: flex; align-items: center;">
                        Desain Grafis
                        </div>
                    </div>
                    <div class="flex-grow-1 mb-2">
                        <div class="profile-widget-name"
                        style="font-size: 16px; display: flex; align-items: center;">
                        PT Husada Jaya | Jl Gajayana No.8
                        </div>
                    </div>
                    <ul class="list-unstyled ml-2">
                        <li class="mb-2"><img class="img-fluid"
                                src="{{ asset('assets/img/landing-page/Hourglass.svg') }}">&nbsp&nbsp&nbspParuh Waktu
                        </li>
                        <li class="mb-2"><img class="img-fluid"
                                src="{{ asset('assets/img/landing-page/money-2.svg') }}">&nbsp&nbsp&nbspIDR 700.000,00
                        </li>
                        <li class="mb-2"><img class="img-fluid"
                                src="{{ asset('assets/img/landing-page/Time.svg') }}">&nbsp&nbsp&nbsp13 Mei 2020 - 13 Agustus 2023
                        </li>
                    </ul>
                </div>
                <a href="#"><p class="corner-text">Lihat Selengkapnya...</p></a>
            </div>
        </section>
        <section class="centered-section" style="margin-bottom: 10%;">
            <div class="bg-primary-section col-md-10 py-1">
                <div class="profile-widget-description m-3"
                    style="font-weight: bold; font-size: 18px; display: flex; align-items: center;">
                    <div class="flex-grow-1">
                        <div class="profile-widget-name">Pelatihan / Sertifikat</div>
                    </div>
                    <div class="d-flex justify-content-end" style="font-size: 2.00em;" id="fluid">
                        <a href="#">
                        <img class="img-fluid" style="width: 35px; height: 35px;"
                            src="{{ asset('assets/img/landing-page/Plus.svg') }}">
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="flex-grow-1 mb-2">
                        <div class="profile-widget-name"
                        style="font-weight: bold; font-size: 16px; display: flex; align-items: center;">
                        Pelatihan Data Analyst Dicoding
                        </div>
                    </div>
                    <div class="flex-grow-1 mb-2">
                        <div class="profile-widget-name"
                        style="font-size: 16px; display: flex; align-items: center;">
                        Lorem Ipsum is simply dummy text of the
                        printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                        ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                        type specimen book. It has survived not only five centuries
                        </div>
                    </div>
                    <ul class="list-unstyled ml-2">
                        <li class="mb-2"><img class="img-fluid"
                                src="{{ asset('assets/img/landing-page/Office Building-2.svg') }}">&nbsp&nbsp&nbspDikeluarkan oleh Dicoding
                        </li>
                        <li class="mb-2"><img class="img-fluid"
                                src="{{ asset('assets/img/landing-page/Time.svg') }}">&nbsp&nbsp&nbsp&nbsp&nbsp13 Agustus 2023
                        </li>
                    </ul>
                </div>
                <a href="#"><p class="corner-text">Lihat Selengkapnya...</p></a>
            </div>
        </section>
    </main>
@endsection

@push('customScript')
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
    <script>
        $("#modal-create").fireModal({
            title: 'Tambah Pendidikan',
            footerClass: 'bg-whitesmoke',
            body: `
            <form method="POST" action="{{ route('profile.user.update') }}" class="needs-validation"
                                    novalidate="" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label for="gelar">Gelar</label>
                                            <select
                                                class="form-control select2 custom-input @error('gelar') is-invalid @enderror"
                                                name="gelar" id="gelar">
                                                <option value="">Pilih Gelar</option>
                                                <option value="sma"
                                                    {{ Auth::user()->pendidikan && Auth::user()->pendidikan->gelar === 'sma' ? 'selected' : '' }}>
                                                    SMA/SMK</option>
                                                <option value="D3"
                                                    {{ Auth::user()->pendidikan && Auth::user()->pendidikan->gelar === 'D3' ? 'selected' : '' }}>
                                                    Diploma III</option>
                                                <option value="D4"
                                                    {{ Auth::user()->pendidikan && Auth::user()->pendidikan->gelar === 'D4' ? 'selected' : '' }}>
                                                    Diploma IV</option>
                                                <option value="S1"
                                                    {{ Auth::user()->pendidikan && Auth::user()->pendidikan->gelar === 'S1' ? 'selected' : '' }}>
                                                    Sarjana</option>
                                                <option value="S2"
                                                    {{ Auth::user()->pendidikan && Auth::user()->pendidikan->gelar === 'S2' ? 'selected' : '' }}>
                                                    Magister</option>
                                                @error('gelar')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Nama Institusi</label>
                                            <input name="institusi" type="text"
                                                class="form-control custom-input @error('institusi') is-invalid @enderror"
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->institusi : '' }}">
                                            @error('institusi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Jurusan</label>
                                            <input name="jurusan" type="text"
                                                class="form-control custom-input @error('jurusan') is-invalid @enderror"
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->jurusan : '' }}">
                                            @error('jurusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Prestasi Akademik (Opsional)</label>
                                            <input name="jurusan" type="text"
                                                class="form-control custom-input @error('jurusan') is-invalid @enderror"
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->jurusan : '' }}">
                                            @error('jurusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label>Periode Waktu</label>
                                            <input name="institusi" type="text"
                                                class="form-control custom-input @error('institusi') is-invalid @enderror"
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->institusi : '' }}">
                                            @error('institusi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label style="color: white">iu</label>
                                            <input name="institusi" type="text"
                                                class="form-control custom-input @error('institusi') is-invalid @enderror"
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->institusi : '' }}">
                                            @error('institusi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3 ml-5">
                                            <label>IPK (Opsional)</label>
                                            <input name="jurusan" type="text"
                                                class="form-control custom-input @error('jurusan') is-invalid @enderror"
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->jurusan : '' }}">
                                            @error('jurusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3 col-12 text-right">
                                            <button class="btn btn-primary custom-input" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </form>
         `,
            buttons: [{
                    text: 'Batal',
                    class: 'btn btn-secondary',
                    handler: function(modal) {
                        modal.modal('hide');
                    }
                },
                {
                    text: 'Simpan',
                    class: 'btn btn-primary',
                    handler: function(modal) {
                        $('form', modal).submit();
                    }
                }
            ]
        });
    </script>
@endpush
@push('customStyle')

@endpush
