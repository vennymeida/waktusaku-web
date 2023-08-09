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
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Perusahaan</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                @if ($perusahaan->profile && $perusahaan->profile->foto)
                                <img src="{{ asset('storage/' . $perusahaan->profile->foto) }}" alt="Logo"
                                    class="img-thumbnail rounded-circle" style="width: 200px; height: 200px;">
                                @else
                                <span>No Logo Available</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <dl class="row">
                                <dt class="col-sm-4">Pemilik</dt>
                                <dd class="col-sm-8">{{ $perusahaan->pemilik ?: '-' }}</dd>

                                <dt class="col-sm-4">Nama</dt>
                                <dd class="col-sm-8">{{ $perusahaan->name ?: '-' }}</dd>

                                <dt class="col-sm-4">Alamat</dt>
                                <dd class="col-sm-8">{{ optional($perusahaan->profile)->alamat ?: '-' }}</dd>

                                <dt class="col-sm-4">Email</dt>
                                <dd class="col-sm-8">{{ $perusahaan->email ?: '-' }}</dd>

                                <dt class="col-sm-4">Website</dt>
                                <dd class="col-sm-8">{{ $perusahaan->website ?: '-' }}</dd>

                                <dt class="col-sm-4">No. Telepon</dt>
                                <dd class="col-sm-8">{{ optional($perusahaan->profile)->no_hp ?: '-' }}</dd>

                                <dt class="col-sm-4">Deskripsi</dt>
                                <dd class="col-sm-8">{{ $perusahaan->deskripsi ?: '-' }}</dd>

                                <dt class="col-sm-4">SIU</dt>
                                <dd class="col-sm-8">
                                    @if ($perusahaan->siu)
                                    <a href="{{ asset('storage/' . $perusahaan->siu) }}" target="_blank"
                                        class="btn btn-primary btn-sm">View SIU</a>
                                    @else
                                    <span class="text-muted">No SIU Available</span>
                                    @endif
                                </dd>
                            </dl>
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
</section>
@endsection