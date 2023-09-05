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
                                    <p class="mb-2 text-justify" style="font-size: 14px;">{{ $profileUser->ringkasan }}</p>
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
                                        <dd class="col-sm-8 mt-2">{{ $profileUser->harapan_gaji }}</dd>

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
                                    <dl class="row">
                                        <dt class="col-sm-4 mt-2">Nama Institusi</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pendidikan->institusi }}</dd>

                                        <dt class="col-sm-4 mt-2">Gelar</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pendidikan->gelar }}</dd>

                                        <dt class="col-sm-4 mt-2">Jurusan</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pendidikan->jurusan }}</dd>

                                        <dt class="col-sm-4 mt-2">Prestasi</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pendidikan->prestasi }}</dd>

                                        <dt class="col-sm-4 mt-2">IPK</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pendidikan->ipk }}</dd>

                                        <dt class="col-sm-4 mt-2">Periode</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pendidikan->tahun_mulai }}<span> - </span>
                                            {{ $pendidikan->tahun_berakhir }}</dd>
                                    </dl>

                                    <hr class="my-4">
                                    <h5 class="font-weight-bolder">Keahlian </h5>
                                    <p class="mb-2" style="font-size: 14px;">List Keahlian</p>

                                    <hr class="my-4">
                                    <h5 class="font-weight-bolder">Pengalaman Kerja </h5>
                                    <dl class="row">
                                        <dt class="col-sm-4 mt-2">Nama Pekerjaan</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pengalaman->nama_pekerjaan }}</dd>

                                        <dt class="col-sm-4 mt-2">Nama Perusahaan</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pengalaman->nama_perusahaan }}</dd>

                                        <dt class="col-sm-4 mt-2">Alamat</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pengalaman->alamat }}</dd>

                                        <dt class="col-sm-4 mt-2">Tipe Pekerjaan</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pengalaman->tipe }}</dd>

                                        <dt class="col-sm-4 mt-2">Gaji</dt>
                                        <dd class="col-sm-8 mt-2">{{'IDR ' . $pengalaman->gaji }}</dd>

                                        <dt class="col-sm-4 mt-2">Periode</dt>
                                        <?php
                                            // Mengambil tanggal mulai dan tanggal berakhir dari kode HTML
                                            $tanggal_mulai = $pengalaman->tanggal_mulai;
                                            $tanggal_berakhir = $pengalaman->tanggal_berakhir;

                                            // Mengubah format tanggal ke "d F Y" (contoh: "4 August 2023")
                                            $tanggal_mulai = date("j F Y", strtotime($tanggal_mulai));
                                            $tanggal_berakhir = date("j F Y", strtotime($tanggal_berakhir));
                                            ?>

                                            <!-- Menampilkan tanggal dalam format yang diubah -->
                                            <dd class="col-sm-8 mt-2"><?= $tanggal_mulai ?><span> - </span><?= $tanggal_berakhir ?></dd>
                                    </dl>

                                    <hr class="my-4">
                                    <h5 class="font-weight-bolder">Pelatihan / Sertifikasi </h5>
                                    <dl class="row">
                                        <dt class="col-sm-4 mt-2">Nama Pelatihan</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pelatihan->nama_sertifikat }}</dd>

                                        <dt class="col-sm-4 mt-2">Deskripsi</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pelatihan->deskripsi }}</dd>

                                        <dt class="col-sm-4 mt-2">Dikeluarkan oleh</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pelatihan->penerbit }}</dd>

                                        <dt class="col-sm-4 mt-2">Tanggal Dikeluarkan</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pelatihan->tanggal_dikeluarkan }}</dd>

                                        <dt class="col-sm-4 mt-2">Sertifikat</dt>
                                        <dd class="col-sm-8 mt-2">{{ $pelatihan->sertifikat }}</dd>
                                    </dl>
                                </ul>
                                <br>
                                <br>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
