<<<<<<< Updated upstream
=======
@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>View Pelamar</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pelamar.index') }}">Pelamar</a></div>
            <div class="breadcrumb-item active">View Pelamar</div>
        </div>
    </div>
    <div class="section-body">
        <div class="d-flex justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Pelamar</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    @if ($pelamar->profile && $pelamar->profile->foto)
                                    <img src="{{ asset('storage/' . $pelamar->profile->foto) }}" alt="Foto"
                                        class="img-thumbnail rounded-circle" style="width: 200px; height: 200px;">
                                    @else
                                    <span>No Photo Available</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <dl class="row">
                                    <dt class="col-sm-4">Name</dt>
                                    <dd class="col-sm-8">{{ $pelamar->name }}</dd>

                                    <dt class="col-sm-4">Email</dt>
                                    <dd class="col-sm-8">{{ $pelamar->email }}</dd>

                                    <dt class="col-sm-4">Alamat</dt>
                                    <dd class="col-sm-8">{{ optional($pelamar->profile)->alamat ?: '-' }}</dd>

                                    <dt class="col-sm-4">Jenis Kelamin</dt>
                                    <dd class="col-sm-8">{{ $pelamar->profile ? ($pelamar->profile->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan') : '-' }}</dd>

                                    <dt class="col-sm-4">No. Telepon</dt>
                                    <dd class="col-sm-8">{{ optional($pelamar->profile)->no_hp ?: '-' }}</dd>

                                    <dt class="col-sm-4">Resume</dt>
                                    <dd class="col-sm-8">
                                        @if ($pelamar->profile && $pelamar->profile->resume)
                                        <a href="{{ asset('storage/' . $pelamar->profile->resume) }}" target="_blank"
                                            class="btn btn-primary btn-sm">View Resume</a>
                                        @else
                                        <span class="text-muted">No Resume Available</span>
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
>>>>>>> Stashed changes
