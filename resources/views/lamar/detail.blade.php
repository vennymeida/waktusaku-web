@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>View Perusahaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pelamarkerja.index') }}">Data Pelamar Kerja</a></div>
            <div class="breadcrumb-item active">View Pelamar Kerja</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Detail Pelamar Kerja</h2>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-12"> <!-- Use col-12 to take up the full width -->
                <div class="card">
                    <div class="card-body">
                        <p class="card-title font-weight-bolder" style="font-size: 25px;"><a href="{{ route('pelamarkerja.index') }}"><i class="fas fa-arrow-left" style="font-size: 20px;"></i></a> Detail Pelamar Kerja</p>
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-start justify-content-center">
                                @if ($profileUser->foto)
                                        <img src="{{ asset('storage/' . $profileUser->foto) }}" alt="Foto"
                                        class="rounded-circle mr-1" style="width: 200px; height: 200px;">
                                    @else
                                    <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                        class="rounded-circle mr-1" style="width: 200px; height: 200px;">
                                    @endif
                            </div>
                            <div class="col-md-7">
                                <ul class="list-unstyled">
                                    <p class="mb-2 text-primary font-weight-bold" style="font-size: 28px;">{{$namaPengguna}}
                                    </p>
                                    <h5 class="font-weight-bolder">Ringkasan </h5>
                                    <dl class="row">
                                        <dt class="col-sm-4 mt-2">Email</dt>
                                        <dd class="col-sm-8 mt-2">{{ $email }}</dd>

                                        <dt class="col-sm-4 mt-2">No Telepon</dt>
                                        <dd class="col-sm-8 mt-2">{{ $profileUser->no_hp }}</dd>

                                        <dt class="col-sm-4 mt-2">Alamat</dt>
                                        <dd class="col-sm-8 mt-2">{{ $profileUser->alamat }}</dd>

                                        <dt class="col-sm-4 mt-2">Tanggal Lahir</dt>
                                        <dd class="col-sm-8 mt-2"></dd>

                                        <dt class="col-sm-4 mt-2">Jenis Kelamin</dt>
                                        <dd class="col-sm-8 mt-2">{{ $profileUser->jenis_kelamin }}</dd>

                                        <dt class="col-sm-4 mt-2">Gaji</dt>
                                        <dd class="col-sm-8 mt-2"></dd>

                                        <dt class="col-sm-4 mt-2">Resume</dt>
                                        <dd class="col-sm-8 mt-2">
                                            @if ($lamar && $lamar->resume)
                                        <a href="{{ asset('storage/' . $lamar->resume) }}" target="_blank"
                                            class="btn btn-primary btn-sm">View Resume</a>
                                        @else
                                        <span class="text-muted">No Resume Available</span>
                                        @endif
                                        </dd>
                                    </dl>

                                    <hr class="my-4">
                                    <h5 class="font-weight-bolder">Pendidikan </h5>
                                    <p class="mb-2" style="font-size: 14px;">Nama Institusi  </p>
                                    <p class="mb-2" style="font-size: 14px;">Gelar </p>
                                    <p class="mb-2" style="font-size: 14px;">Jurusan  </p>
                                    <p class="mb-2" style="font-size: 14px;">Prestasi </p>
                                    <p class="mb-2" style="font-size: 14px;">IPK </p>
                                    <p class="mb-2" style="font-size: 14px;">Periode </p>

                                    <hr class="my-4">
                                    <h5 class="font-weight-bolder">Keahlian </h5>
                                    <p class="mb-2" style="font-size: 14px;">List Keahlian</p>

                                    <hr class="my-4">
                                    <h5 class="font-weight-bolder">Pengalaman Kerja </h5>
                                    <p class="mb-2" style="font-size: 14px;">Nama Pekerjaan  </p>
                                    <p class="mb-2" style="font-size: 14px;">Nama Perusahaan </p>
                                    <p class="mb-2" style="font-size: 14px;">Alamat  </p>
                                    <p class="mb-2" style="font-size: 14px;">Tipe Pekerjaan </p>
                                    <p class="mb-2" style="font-size: 14px;">Gaji </p>
                                    <p class="mb-2" style="font-size: 14px;">Periode </p>

                                    <hr class="my-4">
                                    <h5 class="font-weight-bolder">Pelatihan / Sertifikasi </h5>
                                    <p class="mb-2" style="font-size: 14px;">Nama Pelatihan  </p>
                                    <p class="mb-2" style="font-size: 14px;">Deskripsi </p>
                                    <p class="mb-2" style="font-size: 14px;">Dikeluarkan oleh  </p>
                                    <p class="mb-2" style="font-size: 14px;">Tanggal Dikeluarkan </p>
                                    <p class="mb-2" style="font-size: 14px;">Sertifikat </p>
                                </ul>
                                <br>
                                <br>
                            </div>
                        </div>
                        <hr>
                        {{-- <div class="text-center mt-4">
                            <a href="{{ route('pelamarkerja.index') }}" class="btn btn-info">Kembali</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
