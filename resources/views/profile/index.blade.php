<!-- Modal Tambah Postingan -->
<div class="modal fade" id="modal-create-postingan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header m-4">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #6777ef; font-weight: bold;">Tambah
                    Postingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pendidikan.store') }}" class="needs-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <!-- Informasi Nama User dan Profile -->
                                <div class="media mb-4">
                                    <img class="mr-3 rounded-circle" width="50" src="{{ Auth::user()->profile ? Storage::url(Auth::user()->profile->foto) : '' }}"
                                        alt="Profile Image">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{ auth()->user()->name }}</h5>
                                        <!-- Informasi tambahan mengenai user, seperti bio atau status -->
                                        <!-- Misalnya: <p>{{ auth()->user()->alamat }}</p> -->
                                    </div>
                                </div>

                                <!-- Form untuk Membuat Postingan -->
                                <form method="POST" action="" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="content">Konten Postingan</label>
                                        <textarea id="content" class="form-control @error('content') is-invalid @enderror" name="content" rows="4"
                                            required>{{ old('content') }}</textarea>

                                        @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar (Opsional)</label>
                                        <input id="image" type="file"
                                            class="form-control-file @error('image') is-invalid @enderror"
                                            name="image" accept="image/*">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke m-4">
                <button type="button" class="btn btn-primary" onclick="$('form', this.closest('.modal')).submit();"
                    style="border-radius: 15px; font-size: 14px">Tambah Postingan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="border-radius: 15px; font-size: 14px">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pendidikan -->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header m-4">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #6777ef; font-weight: bold;">Tambah
                    Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pendidikan.store') }}" class="needs-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-12 col-12">
                            <label for="gelar">Gelar</label>
                            <select class="form-control custom-input @error('gelar') is-invalid @enderror"
                                name="gelar" id="gelar">
                                <option value="">Pilih Gelar</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="D3">Diploma III</option>
                                <option value="D4">Diploma IV</option>
                                <option value="S1">Sarjana</option>
                                <option value="S2">Magister</option>
                            </select>
                            @error('gelar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-12 col-12">
                            <label>Nama Institusi</label>
                            <input name="institusi" type="text"
                                class="form-control custom-input @error('institusi') is-invalid @enderror"
                                value="{{ old('institusi') }}">
                            @error('institusi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-12 col-12">
                            <label>Jurusan</label>
                            <input name="jurusan" type="text"
                                class="form-control custom-input @error('jurusan') is-invalid @enderror"
                                value="{{ old('jurusan') }}">
                            @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-12 col-12">
                            <label>Prestasi Akademik (Opsional)</label>
                            <textarea name="prestasi" class="form-control custom-input @error('prestasi') is-invalid @enderror" rows="4">{{ old('prestasi') }}</textarea>
                            @error('prestasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="col-md-12 mb-1 form-group">
                            <label for="tahun">Periode Waktu</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <select class="form-control custom-input @error('tahun_mulai') is-invalid @enderror"
                                name="tahun_mulai" id="tahun_mulai">
                                <option value="">Pilih Tahun</option>
                                @for ($tahun = 2017; $tahun <= date('Y'); $tahun++)
                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                @endfor
                            </select>
                            @error('tahun_mulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <span> - </span>
                        <div class="col-md-3 form-group">
                            <select class="form-control custom-input @error('tahun_berakhir') is-invalid @enderror"
                                name="tahun_berakhir" id="tahun_berakhir">
                                <option value="">Pilih Tahun</option>
                                @for ($tahun = 2017; $tahun <= date('Y'); $tahun++)
                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                @endfor
                                <option value="Saat Ini">Saat Ini</option>
                            </select>
                            @error('tahun_berakhir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-1 form-group">
                            <label for="ipk">IPK (Opsional)</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input name="ipk" type="number" step="0.01"
                                class="form-control custom-input @error('ipk') is-invalid @enderror"
                                value="{{ old('ipk') }}">
                            @error('ipk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke m-4">
                <button type="button" class="btn btn-primary" onclick="$('form', this.closest('.modal')).submit();"
                    style="border-radius: 15px; font-size: 14px">Tambah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="border-radius: 15px; font-size: 14px">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pengalaman -->
<div class="modal fade" id="modal-create-pengalaman" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header m-4">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #6777ef; font-weight: bold;">Tambah
                    Pengalaman Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pengalaman.store') }}" class="needs-validation"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-12 col-12">
                            <label for="nama_pekerjaan">Nama Pekerjaaan</label>
                            <input name="nama_pekerjaan" type="text"
                                class="form-control custom-input @error('nama_pekerjaan') is-invalid @enderror"
                                value="{{ old('nama_pekerjaan') }}">
                            @error('nama_pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-12 col-12">
                            <label>Nama Perusahaan</label>
                            <input name="nama_perusahaan" type="text"
                                class="form-control custom-input @error('nama_perusahaan') is-invalid @enderror"
                                value="{{ old('nama_perusahaan') }}">
                            @error('nama_perusahaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-12 col-12">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control custom-input @error('alamat') is-invalid @enderror" rows="4">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-6 col-12">
                            <label>Tipe Pekerjaan</label>
                            <select class="form-control custom-input @error('tipe') is-invalid @enderror"
                                name="tipe" id="tipe">
                                <option value="">Pilih Tipe Pekerjaan</option>
                                <option value="Fulltime">Fulltime</option>
                                <option value="Parttime">Part Time</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Internship">Internship</option>
                            </select>
                            @error('tipe')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label for="gaji">Gaji (Opsional)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text custom-input">
                                        <a>Rp</a>
                                    </div>
                                </div>
                                <input name="gaji" type="number" step="100000"
                                    class="form-control custom-input @error('gaji') is-invalid @enderror"
                                    value="{{ old('gaji') }}">
                                @error('gaji')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-6 col-12">
                            <label>Tanggal Mulai</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text custom-input">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                                <input name="tanggal_mulai" type="date"
                                    class="form-control custom-input @error('tanggal_mulai') is-invalid @enderror"
                                    value="{{ old('tanggal_mulai') }}">
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-6 col-12">
                            <label>Tanggal Berakhir</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text custom-input">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                                <input name="tanggal_berakhir" type="date"
                                    class="form-control custom-input @error('tanggal_berakhir') is-invalid @enderror"
                                    value="{{ old('tanggal_berakhir') }}">
                                @error('tanggal_berakhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke m-4">
                <button type="button" class="btn btn-primary" onclick="$('form', this.closest('.modal')).submit();"
                    style="border-radius: 15px; font-size: 14px">Tambah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="border-radius: 15px; font-size: 14px">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pelatihan -->
<div class="modal fade" id="modal-create-pelatihan" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header m-4">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #6777ef; font-weight: bold;">Tambah
                    Pelatihan/Sertifikat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pelatihan.store') }}" class="needs-validation"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-12 col-12">
                            <label for="nama_sertifikat">Nama</label>
                            <input name="nama_sertifikat" type="text"
                                class="form-control custom-input @error('nama_sertifikat') is-invalid @enderror"
                                value="{{ old('nama_sertifikat') }}">
                            @error('nama_sertifikat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-12 col-12">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control custom-input @error('deskripsi') is-invalid @enderror"
                                rows="4">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-12 col-12">
                            <label>Penerbit</label>
                            <input name="penerbit" type="text"
                                class="form-control custom-input @error('penerbit') is-invalid @enderror"
                                value="{{ old('penerbit') }}">
                            @error('penerbit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-6 col-12">
                            <label>Tanggal Dikeluarkan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text custom-input">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                                <input name="tanggal_dikeluarkan" type="date"
                                    class="form-control custom-input @error('tanggal_dikeluarkan') is-invalid @enderror"
                                    value="{{ old('tanggal_dikeluarkan') }}">
                                @error('tanggal_dikeluarkan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row ml-4 mr-4">
                        <div class="form-group col-md-12 col-12">
                            <label>Unggah Sertifikat (Opsional)</label>
                            <input id="sertifikat" name="sertifikat" type="file"
                                class="form-control custom-input @error('sertifikat') is-invalid @enderror">
                            @error('sertifikat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="text-warning small" style="font-size: 13px; font-weight:medium;">
                                (Tipe berkas : pdf | Max size : 2MB)</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke m-4">
                <button type="button" class="btn btn-primary" onclick="$('form', this.closest('.modal')).submit();"
                    style="border-radius: 15px; font-size: 14px">Tambah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="border-radius: 15px; font-size: 14px">Batal</button>
            </div>
        </div>
    </div>
</div>

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
                                        <p style="line-height: 1.5; margin-top: -2%;"><br><br><br><br></p>
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
        @if (Auth::user()->hasRole('Pencari Kerja'))
            <section class="centered-section">
                <div class="bg-primary-section col-md-10 py-1">
                    <div class="profile-widget-description m-3"
                        style="font-weight: bold; font-size: 18px; display: flex; align-items: center;">
                        <div class="flex-grow-1">
                            <div class="profile-widget-name">Activity / Postingan</div>
                        </div>
                        <div class="d-flex justify-content-end" style="font-size: 2.00em;" id="fluid">
                            <a href="#" data-toggle="modal" data-target="#modal-create-postingan">
                                <img class="img-fluid" style="width: 35px; height: 35px;"
                                    src="{{ asset('assets/img/landing-page/Plus.svg') }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="media mb-2">
                            <img class="mr-3 rounded" width="50" src="assets/img/products/product-1-50.png"
                                alt="product">
                            <div class="media-body">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus nulla quibusdam
                                architecto aut hic itaque sed! Mollitia facilis quasi
                                nulla asperiores voluptatum alias dolore aut delectus veniam eveniet optio ipsa excepturi
                                esse eos tempore doloremque perspiciatis, unde ratione
                                ut dicta hic quis veritatis explicabo nihil?
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <a href="{{ url('/pendidikan') }}">
                        <p class="corner-text">Lihat Selengkapnya...</p>
                    </a>
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
                            <a href="#" data-toggle="modal" data-target="#modal-create">
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
                                    src="{{ asset('assets/img/landing-page/Graduation Cap (2).svg') }}">&nbsp&nbsp&nbsp&nbspD4
                                Teknik Informatika
                            </li>
                            <li class="mb-2"><img class="img-fluid"
                                    src="{{ asset('assets/img/landing-page/Award.svg') }}">&nbsp&nbsp&nbspMengikuti Lomba
                                KMIPN
                            </li>
                            <li class="mb-2"><img class="img-fluid"
                                    src="{{ asset('assets/img/landing-page/timeline.svg') }}">&nbsp&nbsp&nbsp&nbsp3.75
                            </li>
                            <li class="mb-2"><img class="img-fluid"
                                    src="{{ asset('assets/img/landing-page/Time.svg') }}">&nbsp&nbsp&nbsp&nbsp2020-2024
                            </li>
                        </ul>
                    </div>
                    <a href="{{ url('/pendidikan') }}">
                        <p class="corner-text">Lihat Selengkapnya...</p>
                    </a>
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
                            <a href="{{ url('/profile/keahlian/edit') }}">
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
                            <a href="#" data-toggle="modal" data-target="#modal-create-pengalaman">
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
                            <div class="profile-widget-name" style="font-size: 16px; display: flex; align-items: center;">
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
                                    src="{{ asset('assets/img/landing-page/Time.svg') }}">&nbsp&nbsp&nbsp13 Mei 2020 - 13
                                Agustus 2023
                            </li>
                        </ul>
                    </div>
                    <a href="{{ url('/pengalaman') }}">
                        <p class="corner-text">Lihat Selengkapnya...</p>
                    </a>
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
                            <a href="#" data-toggle="modal" data-target="#modal-create-pelatihan">
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
                            <div class="profile-widget-name" style="font-size: 16px; display: flex; align-items: center;">
                                Lorem Ipsum is simply dummy text of the
                                printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                                a
                                type specimen book. It has survived not only five centuries
                            </div>
                        </div>
                        <ul class="list-unstyled ml-2">
                            <li class="mb-2"><img class="img-fluid"
                                    src="{{ asset('assets/img/landing-page/Office Building-2.svg') }}">&nbsp&nbsp&nbspDikeluarkan
                                oleh Dicoding
                            </li>
                            <li class="mb-2"><img class="img-fluid"
                                    src="{{ asset('assets/img/landing-page/Time.svg') }}">&nbsp&nbsp&nbsp&nbsp&nbsp13
                                Agustus
                                2023
                            </li>
                        </ul>
                    </div>
                    <a href="{{ url('/pelatihan') }}">
                        <p class="corner-text">Lihat Selengkapnya...</p>
                    </a>
                </div>
            </section>
        @endif
    </main>
@endsection

@push('customScript')
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endpush
@push('customStyle')
    <style>
        .modal-lg {
            max-width: 60%;
        }
    </style>
@endpush
