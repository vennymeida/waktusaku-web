@extends('landing-page.app')
@section('main')
    <main class="bg-secondary">
        <section class="centered-section">
            <div class="bg-primary-section col-md-10 py-1">
                <div class="profile-widget-description m-3"
                    style="font-weight: bold; font-size: 18px; display: flex; align-items: center; color:#6777EF">
                    <div class="flex-grow-1">
                        <div class="row">
                            <div>
                                <a href="{{ url('/dashboard') }}">
                                    <img class="img-fluid mt-1" style="width: 30px; height: 30px;"
                                        src="{{ asset('assets/img/Vector.svg') }}">
                                </a>
                            </div>
                            <div class="profile-widget-name mt-2 ml-3">Pelatihan / Sertifikat</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container" style="margin-top: 5%; margin-bottom: 5%">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-primary mb-2">
                            <div class="card-body">
                                <div class="text-left mb-4 mt-2 ml-2">
                                    <h5 class="card-title font-weight-bold d-block mx-2" style="color:#6777EF;">Profile</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-3">
                                        @if (Auth::user()->profile && Auth::user()->profile->foto != '')
                                            <img alt="image"
                                                src="{{ Auth::user()->profile ? Storage::url(Auth::user()->profile->foto) : '' }}"
                                                class="rounded-circle profile-widget-picture img-fluid"
                                                style="width: 140px; height: 140px;">
                                        @else
                                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                                class="rounded-circle profile-widget-picture img-fluid"
                                                style="width: 140px; height: 140px;">
                                        @endif
                                    </div>
                                    <div class="col-md-7">
                                        <form method="POST" action="{{ route('user-profile-information.update') }}"
                                            class="needs-validation" novalidate="">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group col-md-12 col-12">
                                                <label>Nama</label>
                                                <input name="name" type="text"
                                                    class="form-control custom-input @error('name', 'updateProfileInformation')
                                            is-invalid
                                            @enderror"
                                                    value="{{ Auth::user()->name }}">
                                                @error('name', 'updateProfileInformation')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 col-12">
                                                <label>Email</label>
                                                <input name="email" type="email"
                                                    class="form-control custom-input @error('email', 'updateProfileInformation')
                                            is-invalid
                                            @enderror"
                                                    value="{{ Auth::user()->email }}">
                                                @error('email', 'updateProfileInformation')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-12 text-right">
                                                <button class="btn btn-primary custom-input" type="submit">Ubah
                                                    Profil</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-primary mb-2">
                            <div class="card-body">
                                <div class="text-left mb-4 mt-2 ml-2">
                                    <h5 class="card-title font-weight-bold d-block mx-2" style="color:#6777EF;">Ubah Data
                                        Diri</h5>
                                </div>
                                <div class="col-md-12">
                                    <form method="POST" action="{{ route('profile.user.update') }}"
                                        class="needs-validation" novalidate="" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group col-md-12 col-12">
                                            <label>Tanggal Lahir</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text custom-input">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                                <input name="tgl_lahir" type="date"
                                                    class="form-control phone-number custom-input @error('tgl_lahir') is-invalid @enderror"
                                                    value="{{ Auth::user()->profile ? Auth::user()->profile->tgl_lahir : '' }}">
                                                @error('tgl_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select
                                                class="form-control select2 custom-input @error('jenis_kelamin') is-invalid @enderror"
                                                name="jenis_kelamin" id="jenis_kelamin">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L"
                                                    {{ Auth::user()->profile && Auth::user()->profile->jenis_kelamin === 'L' ? 'selected' : '' }}>
                                                    Laki-Laki</option>
                                                <option value="P"
                                                    {{ Auth::user()->profile && Auth::user()->profile->jenis_kelamin === 'P' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                                @error('jenis_kelamin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Nomor Telepon</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text custom-input">
                                                        <i class="fas fa-phone"></i>
                                                    </div>
                                                </div>
                                                <input name="no_hp" type="number"
                                                    class="form-control phone-number custom-input @error('no_hp') is-invalid @enderror"
                                                    value="{{ Auth::user()->profile ? Auth::user()->profile->no_hp : '' }}">
                                                @error('no_hp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Alamat</label>
                                            <input name="alamat" type="text"
                                                class="form-control custom-input @error('alamat') is-invalid @enderror"
                                                value="{{ Auth::user()->profile ? Auth::user()->profile->alamat : '' }}">
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Ringkasan</label>
                                            <input name="ringkasan" type="text"
                                                class="form-control custom-input @error('ringkasan') is-invalid @enderror"
                                                value="{{ Auth::user()->profile ? Auth::user()->profile->ringkasan : '' }}"
                                                style="height: 70px">
                                            @error('ringkasan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Gaji yang diharapkan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text custom-input">
                                                        <i>Rp</i>
                                                    </div>
                                                </div>
                                                <input name="harapan_gaji" type="number"
                                                    class="form-control custom-input @error('harapan_gaji') is-invalid @enderror"
                                                    value="{{ Auth::user()->profile ? Auth::user()->profile->harapan_gaji : '' }}">
                                                @error('harapan_gaji')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Unggah Foto</label>
                                            <input id="foto" name="foto" type="file"
                                                class="form-control custom-input @error('foto') is-invalid @enderror">
                                            @error('foto')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="text-warning small" style="font-size: 13px; font-weight:bolder;">
                                                (Tipe berkas : jpeg,jpg,png | Max size : 2MB)</div>
                                        </div>
                                        <div class="form-group col-md-12 col-12">
                                            <label>Unggah Resume</label>
                                            <input id="resume" name="resume" type="file"
                                                class="form-control custom-input @error('resume') is-invalid @enderror">
                                            @error('resume')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="text-warning small" style="font-size: 13px; font-weight:bolder;">
                                                (Tipe berkas : pdf | Max size : 2MB)</div>
                                        </div>
                                        <div class="form-group col-md-3 col-12 text-right">
                                            <button class="btn btn-primary custom-input" type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="card border-primary mb-2">
                            <div class="card-body">
                                <div class="text-left mb-4 mt-2 ml-2">
                                    <h5 class="card-title font-weight-bold d-block mx-2" style="color:#6777EF;">Ubah Kata
                                        Sandi</h5>
                                </div>
                                <div class="col-md-12">
                                    <form method="POST" action="{{ route('user-password.update') }}"
                                        class="needs-validation" novalidate="">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="form-group col-md-12 col-12">
                                                <label for="current_password">Kata Sandi Saat Ini</label>
                                                <input id="current_password" type="password"
                                                    class="form-control select custom-input @error('current_password', 'updatePassword') is-invalid @enderror"
                                                    data-indicator="pwindicator" name="current_password" tabindex="2">
                                                @error('current_password', 'updatePassword')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div id="pwindicator" class="pwindicator">
                                                    <div class="bar"></div>
                                                    <div class="label"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label for="password">Kata Sandi Baru</label>
                                                <input id="password" type="password"
                                                    class="form-control select custom-input @error('password', 'updatePassword') is-invalid @enderror"
                                                    data-indicator="pwindicator" name="password" tabindex="2">
                                                @error('password', 'updatePassword')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div id="pwindicator" class="pwindicator">
                                                    <div class="bar"></div>
                                                    <div class="label"></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                                                <input id="password_confirmation" type="password"
                                                    class="form-control select custom-input @error('password_confirmation') is-invalid @enderror"
                                                    data-indicator="pwindicator" name="password_confirmation"
                                                    tabindex="2">
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div id="pwindicator" class="pwindicator">
                                                    <div class="bar"></div>
                                                    <div class="label"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-5 col-12 text-right">
                                                <button class="btn btn-primary custom-input" type="submit">Ubah Kata
                                                    Sandi</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
