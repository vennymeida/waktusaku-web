@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ubah Profile</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hai, {{ Auth::user()->name }}!</h2>
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <!-- Error Messages -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <p class="section-lead">
                Ubah informasi tentang diri Anda di halaman ini.
            </p>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            @if(Auth::user()->profile && Auth::user()->profile->foto != '')
                                <img alt="image"
                                    src="{{ Auth::user()->profile ? Storage::url(Auth::user()->profile->foto) : '' }}"
                                    class="rounded-circle profile-widget-picture img-fluid"
                                    style="width: 150px; height: 150px;">
                            @else
                                <img alt="image"
                                    src="{{asset('assets/img/avatar/avatar-1.png')}}"
                                    class="rounded-circle profile-widget-picture img-fluid"
                                    style="width: 150px; height: 150px;">
                            @endif
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ Auth::user()->name }}</div>
                            
                            {{ Auth::user()->bio }}
                        </div>
                    </div>
                    <div class="card">
                        <form method="POST" action="{{ route('user-password.update') }}" class="needs-validation"
                            novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Ubah Kata Sandi</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="current_password">Kata Sandi Saat Ini</label>
                                        <input id="current_password" type="password"
                                            class="form-control select @error('current_password', 'updatePassword') is-invalid @enderror"
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
                                            class="form-control select @error('password', 'updatePassword') is-invalid @enderror"
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
                                            class="form-control select @error('password_confirmation') is-invalid @enderror"
                                            data-indicator="pwindicator" name="password_confirmation" tabindex="2">
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
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">Ubah Kata Sandi</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="POST" action="{{ route('user-profile-information.update') }}"
                            class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Ubah Informasi Login</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama</label>
                                        <input name="name" type="text"
                                            class="form-control @error('name', 'updateProfileInformation')
                                    is-invalid
                                    @enderror"
                                            value="{{ Auth::user()->name }}">
                                        @error('name', 'updateProfileInformation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input name="email" type="email"
                                            class="form-control @error('email', 'updateProfileInformation')
                                    is-invalid
                                    @enderror"
                                            value="{{ Auth::user()->email }}">
                                        @error('email', 'updateProfileInformation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">Ubah Profil</button>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <form method="POST" action="{{ route('profile.user.update') }}" class="needs-validation"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Ubah Data Diri</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Alamat</label>
                                        <input name="alamat" type="text"
                                            class="form-control @error('alamat') is-invalid @enderror"
                                            value="{{ Auth::user()->profile ? Auth::user()->profile->alamat : '' }}">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control select2 @error('jenis_kelamin') is-invalid @enderror"
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
                                    <div class="form-group col-md-6 col-12">
                                        <label>No HP</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input name="no_hp" type="text"
                                                class="form-control phone-number @error('no_hp') is-invalid @enderror"
                                                value="{{ Auth::user()->profile ? Auth::user()->profile->no_hp : '' }}">
                                        @error('no_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="show_foto"
                                                id="show_foto">
                                            <label class="form-check-label" for="show_foto">
                                                Perbarui Foto
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="show_resume"
                                                id="show_resume">
                                            <label class="form-check-label" for="show_resume">
                                                Perbarui Resume
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12" id="foto_upload_form"
                                        style="{{ old('show_foto') ? '' : 'display: none' }}">
                                        <div class="form-group">
                                            <label>Unggah Foto</label>
                                            <div>
                                            @if(Auth::user()->profile && Auth::user()->profile->foto != '')
                                                <img alt="image"
                                                    src="{{ Auth::user()->profile ? Storage::url(Auth::user()->profile->foto) : '' }}"
                                                    class="rounded profile-widget-picture img-fluid"
                                                    style="width: 70px; height: 70px;">
                                            @else
                                                <img alt="image"
                                                    src="{{asset('assets/img/avatar/avatar-1.png')}}"
                                                    class="rounded profile-widget-picture img-fluid"
                                                    style="width: 70px; height: 70px;">
                                            @endif
                                            </div>
                                            <div class="text-warning small">(File type : jpeg,png,jpg | Max size : 2MB)</div>
                                            <input name="foto" type="file"
                                                class="form-control @error('foto') is-invalid @enderror">
                                        @error('foto')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-12" id="resume_upload_form"
                                        style="{{ old('show_resume') ? '' : 'display: none' }}">
                                        <div class="form-group">
                                            <label>Unggah Resume</label>
                                            @if(Auth::user()->profile && Auth::user()->profile->resume != '')
                                            <div class="text small">Buka file PDF <a href="{{ Auth::user()->profile ? Storage::url(Auth::user()->profile->resume) : '' }}">sebelumnya</a>.</div>
                                            @else
                                            <div class="text small">Belum ada file yang diunggah.</div>
                                            @endif
                                            <div class="text-warning small">(File type : pdf | Max size : 2MB)</div>
                                            <input name="resume" type="file"
                                                class="form-control @error('resume') is-invalid @enderror">
                                        @error('resume')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">Perbarui Data Diri</button>
                            </div>
                        </form>
                    </div>




                    <!-- DATA PERUSAHAAN -->
                    <div class="card">
                        <form method="POST" action="{{ route('profile.user.update') }}" class="needs-validation"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Ubah Data Perusahaan</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Pemilik Perusahaan</label>
                                        <input name="pemilik" type="text"
                                            class="form-control @error('pemilik') is-invalid @enderror"
                                            value="{{ Auth::user()->perusahaan ? Auth::user()->perusahaan->pemilik : '' }}">
                                        @error('pemilik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Perusahaan</label>
                                        <input name="nama" type="text"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ Auth::user()->perusahaan ? Auth::user()->perusahaan->nama : '' }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Alamat Perusahaan</label>
                                        <input name="alamat" type="text"
                                            class="form-control @error('alamat') is-invalid @enderror"
                                            value="{{ Auth::user()->perusahaan ? Auth::user()->perusahaan->alamat : '' }}">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ----KECAMATAN KELURAHAN--- -->
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select class="form-control select2 @error('kecamatan') is-invalid @enderror"
                                            name="kecamatan" id="kecamatan">
                                            <option value="">Pilih Kecamatan</option>
                                            <option value="L"
                                                {{ Auth::user()->perusahaan && Auth::user()->perusahaan->kecamatan_id === 'L' ? 'selected' : '' }}>
                                                Laki-Laki</option>
                                            <option value="P"
                                                {{ Auth::user()->perusahaan && Auth::user()->perusahaan->kecamatan_id === 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('kecamatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="kecamatan">Kelurahan</label>
                                        <select class="form-control select2 @error('kecamatan') is-invalid @enderror"
                                            name="kecamatan" id="kecamatan">
                                            <option value="">Pilih Kelurahan</option>
                                            <option value="L"
                                                {{ Auth::user()->perusahaan && Auth::user()->perusahaan->kecamatan_id === 'L' ? 'selected' : '' }}>
                                                Laki-Laki</option>
                                            <option value="P"
                                                {{ Auth::user()->perusahaan && Auth::user()->perusahaan->kecamatan_id === 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('kecamatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ------------- -->
                                <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                        <label>Email Perusahaan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input name="email" type="text"
                                                class="form-control email @error('email') is-invalid @enderror"
                                                value="{{ Auth::user()->perusahaan ? Auth::user()->perusahaan->email : '' }}">
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Website Perusahaan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-globe"></i>
                                                </div>
                                            </div>
                                            <input name="website" type="text"
                                                class="form-control website @error('website') is-invalid @enderror"
                                                value="{{ Auth::user()->perusahaan ? Auth::user()->perusahaan->website : '' }}">
                                        </div>
                                        @error('website')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>No Telp Perusahaan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input name="no_hp" type="text"
                                                class="form-control phone-number @error('no_hp') is-invalid @enderror"
                                                value="{{ Auth::user()->perusahaan ? Auth::user()->perusahaan->no_hp : '' }}">
                                        </div>
                                        @error('no_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- DESKRIPSI PERUSAHAAN -->
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Informasi Tentang Perusahaan</label>
                                        <textarea id="deskripsi" name="deskripsi" type="text"
                                            class="form-control summernote-simple  @error('deskripsi') is-invalid @enderror"
                                            value="{{ Auth::user()->perusahaan ? Auth::user()->perusahaan->deskripsi : '' }}"></textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ----- -->
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="show_logo"
                                                id="show_logo">
                                            <label class="form-check-label" for="show_logo">
                                                Perbarui Logo Perusahaan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="show_siu"
                                                id="show_siu">
                                            <label class="form-check-label" for="show_siu">
                                                Perbarui Surat Izin Usaha
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12" id="logo_upload_form"
                                        style="{{ old('show_logo') ? '' : 'display: none' }}">
                                        <div class="form-group">
                                            <label>Unggah Logo Perusahaan</label>
                                            <input name="logo" type="file"
                                                class="form-control @error('logo') is-invalid @enderror">
                                        </div>
                                        @error('logo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-12" id="siu_upload_form"
                                        style="{{ old('show_siu') ? '' : 'display: none' }}">
                                        <div class="form-group">
                                            <label>Unggah Surat Izin Usaha</label>
                                            <input name="siu" type="file"
                                                class="form-control @error('siu') is-invalid @enderror">
                                        </div>
                                        @error('siu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">Perbarui Data Perusahaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/summernote-bs4.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script>
        document.getElementById('show_foto').addEventListener('change', function() {
            var fotoUploadForm = document.getElementById('foto_upload_form');
            fotoUploadForm.style.display = this.checked ? 'block' : 'none';
        });

        document.getElementById('show_resume').addEventListener('change', function() {
            var resumeUploadForm = document.getElementById('resume_upload_form');
            resumeUploadForm.style.display = this.checked ? 'block' : 'none';
        });

        document.getElementById('show_logo').addEventListener('change', function() {
            var logoUploadForm = document.getElementById('logo_upload_form');
            logoUploadForm.style.display = this.checked ? 'block' : 'none';
        });

        document.getElementById('show_siu').addEventListener('change', function() {
            var siuUploadForm = document.getElementById('siu_upload_form');
            siuUploadForm.style.display = this.checked ? 'block' : 'none';
        });

        function submitDel(id) {
            $('#del-' + id).submit()
        }
    </script>

    <script>
         $(document).ready(function() {
            $('#deskripsi').summernote();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var showFotoCheckbox = document.getElementById("show_foto");
            var showResumeCheckbox = document.getElementById("show_resume");
            var showLogoCheckbox = document.getElementById("show_logo");
            var showSiuCheckbox = document.getElementById("show_siu");
            var fotoUploadForm = document.getElementById('foto_upload_form');
            var resumeUlploadForm = document.getElementById('resume_upload_form');
            var logoUploadForm = document.getElementById('logo_upload_form');
            var siuUlploadForm = document.getElementById('siu_upload_form');

            if ({{ Auth::user()->profile ? json_encode(Auth::user()->profile->foto) : 'null' }} === null) {
                showFotoCheckbox.checked = true;
                fotoUploadForm.style.display = 'block';
            }

            if ({{ Auth::user()->profile ? json_encode(Auth::user()->profile->resume) : 'null' }} === null) {
                showResumeCheckbox.checked = true;
                resumeUlploadForm.style.display = 'block';
            }

            if ({{ Auth::user()->perusahaan ? json_encode(Auth::user()->perusahaan->logo) : 'null' }} === null) {
                showLogoCheckbox.checked = true;
                logoUploadForm.style.display = 'block';
            }

            if ({{ Auth::user()->perusahaan ? json_encode(Auth::user()->perusahaan->siu) : 'null' }} === null) {
                showSiuCheckbox.checked = true;
                siuUlploadForm.style.display = 'block';
            }
        });
    </script>
@endpush

@push('customStyle')

    <link rel="stylesheet" href="/assets/css/select2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush