@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>View Perusahaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('perusahaan.index') }}">Perusahaan</a></div>
            <div class="breadcrumb-item active">View Perusahaan</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Detail Perusahaan</h2>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-12"> <!-- Use col-12 to take up the full width -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Perusahaan</h5>
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
                                    <p class="mb-2" style="font-size: 14px;">Isi Ringkasan</p>
                                    <h5 class="font-weight-bolder">Personal Info </h5>
                                    <p class="mb-2" style="font-size: 14px;">Email  </p>
                                    <p class="mb-2" style="font-size: 14px;">Nomor Telepon </p>
                                    <p class="mb-2" style="font-size: 14px;">Alamat  </p>
                                    <p class="mb-2" style="font-size: 14px;">Tanggal Lahir </p>
                                    <p class="mb-2" style="font-size: 14px;">Jenis Kelamin </p>
                                    <p class="mb-2" style="font-size: 14px;">Gaji </p>
                                    <p class="mb-2" style="font-size: 14px;">Resume </p>

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
                        <div class="text-center mt-4">
                            <a href="{{ route('perusahaan.index') }}" class="btn btn-info">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
