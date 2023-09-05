@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>View Pencari Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pelamar.index') }}">Pencari Kerja</a></div>
            <div class="breadcrumb-item active">View Pencari Kerja</div>
        </div>
    </div>
    <div class="section-body">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Pencari Kerja</h5>
                    <div class="row">
                        <!-- Foto -->
                        <div class="col-md-2">
                            <div class="text-center mb-4">
                                @if ($pelamar->profile && $pelamar->profile->foto)
                                <img src="{{ asset('storage/' . $pelamar->profile->foto) }}" alt="Foto"
                                    class="img-thumbnail rounded-circle" style="width: 200px; height: 200px;">
                                @else
                                <span>No Photo Available</span>
                                @endif
                            </div>
                        </div>
                        <!-- Nama and Ringkasan -->
                        <div class="col-md-9">
                            <h4><strong>{{ $pelamar->name }}</strong></h4>
                            <h6 class="mt-4"><strong>Ringkasan</strong></h6>
                            <p>{{ $pelamar->profile->ringkasan }}</p>
                            
                            <h6 class="mt-5"><strong>Personal Info</strong></h6>
                            <dl class="row">
                                <dt class="col-sm-3 mt-3">Email</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->email }}</dd>

                                <dt class="col-sm-3 mt-3">No. Telepon</dt>
                                <dd class="col-sm-7 mt-3">{{ optional($pelamar->profile)->no_hp ?: '-' }}</dd>

                                <dt class="col-sm-3 mt-3">Alamat</dt>
                                <dd class="col-sm-7 mt-3">{{ optional($pelamar->profile)->alamat ?: '-' }}</dd>

                                <dt class="col-sm-3 mt-3">Tanggal Lahir</dt>
                                <dd class="col-sm-7 mt-3">{{ \Carbon\Carbon::parse($pelamar->profile->tgl_lahir)->locale('id')->isoFormat('D MMMM Y') }}</dd>

                                <dt class="col-sm-3 mt-3">Jenis Kelamin</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->profile ? ($pelamar->profile->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan') : '-' }}</dd>

                                <dt class="col-sm-3 mt-3">Harapan Gaji</dt>
                                <dd class="col-sm-7 mt-3">IDR {{ number_format($pelamar->profile->harapan_gaji, 0, ',', '.') }}</dd>

                                <dt class="col-sm-3 mt-3">Resume</dt>
                                <dd class="col-sm-7 mt-3">
                                    @if ($pelamar->profile && $pelamar->profile->resume)
                                    <a href="{{ asset('storage/' . $pelamar->profile->resume) }}" target="_blank"
                                        class="btn btn-primary btn-sm">View Resume</a>
                                    @else
                                    <span class="text-muted">No Resume Available</span>
                                    @endif
                                </dd>
                            </dl>
                            <h6 class="mt-5"><strong>Pendidikan</strong></h6>
                            <dl class="row">
                                <dt class="col-sm-3 mt-3">Nama Institusi</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pendidikan->institusi }}</dd>

                                <dt class="col-sm-3 mt-3">Gelar</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pendidikan->gelar }}</dd>

                                <dt class="col-sm-3 mt-3">Jurusan</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pendidikan->jurusan }}</dd>

                                <dt class="col-sm-3 mt-3">Prestasi</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pendidikan->prestasi }}</dd>

                                <dt class="col-sm-3 mt-3">IPK</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pendidikan->ipk }}</dd>

                                <dt class="col-sm-3 mt-3">Periode</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pendidikan->tahun_mulai }} - {{ $pelamar->pendidikan->tahun_berakhir }}</dd>
                            </dl>
                            <h6 class="mt-5"><strong>Keahlian</strong></h6>
                            <dl class="row">
                                <dt class="col-sm-3 mt-3">Gelar</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pendidikan->gelar }}</dd>
                            </dl>

                            <h6 class="mt-5"><strong>Pengalaman Kerja</strong></h6>
                            <dl class="row">
                                <dt class="col-sm-3 mt-3">Nama Pekerjaan</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pengalaman->nama_pekerjaan }}</dd>

                                <dt class="col-sm-3 mt-3">Nama Perusahaan</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pengalaman->nama_perusahaan }}</dd>

                                <dt class="col-sm-3 mt-3">Alamat</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pengalaman->alamat }}</dd>

                                <dt class="col-sm-3 mt-3">Tipe Pekerjaan</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pengalaman->tipe }}</dd>

                                <dt class="col-sm-3 mt-3">Gaji</dt>
                                <dd class="col-sm-7 mt-3">IDR {{ number_format($pelamar->pengalaman->gaji, 0, ',', '.') }}</dd>

                                <dt class="col-sm-3 mt-3">Periode</dt>
                                <dd class="col-sm-7 mt-3">
                                    {{ date('d-m-Y', strtotime($pelamar->pengalaman->tanggal_mulai)) }} s/d
                                    {{ date('d-m-Y', strtotime($pelamar->pengalaman->tanggal_berakhir)) }}
                                </dd>
                            </dl>
                            <h6 class="mt-5"><strong>Pelatihan / Sertifikat</strong></h6>
                            <dl class="row">
                                <dt class="col-sm-3 mt-3">Nama Pelatihan</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pelatihan->nama_sertifikat }}</dd>

                                <dt class="col-sm-3 mt-3">Deskripsi</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pelatihan->deskripsi }}</dd>

                                <dt class="col-sm-3 mt-3">Dikeluarkan Oleh</dt>
                                <dd class="col-sm-7 mt-3">{{ $pelamar->pelatihan->penerbit }}</dd>

                                <dt class="col-sm-3 mt-3">Tanggal Dikeluarkan</dt>
                                <dd class="col-sm-7 mt-3">{{ \Carbon\Carbon::parse($pelamar->pelatihan->tanggal_dikeluarkan)->locale('id')->isoFormat('D MMMM Y') }}</dd>

                                <dt class="col-sm-3 mt-3">Sertifikat</dt>
                                <dd class="col-sm-7 mt-3">
                                    @if ($pelamar->pelatihan && $pelamar->pelatihan->sertifikat)
                                    <a href="{{ asset('storage/' . $pelamar->pelatihan->sertifikat) }}" target="_blank"
                                        class="btn btn-primary btn-sm">View Sertifikat</a>
                                    @else
                                    <span class="text-muted">Tidak ada Sertifikat</span>
                                    @endif
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center mt-4">
                        <a href="{{ route('pelamar.index') }}" class="btn btn-info">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection