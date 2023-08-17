@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>View Pencari Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pelamarperusahaan.index') }}">Pencari Kerja</a></div>
            <div class="breadcrumb-item active">View Pencari Kerja</div>
        </div>
    </div>
    <div class="section-body">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Pencari Kerja</h5>
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
                                <dt class="col-sm-4">Nama</dt>
                                <dd class="col-sm-8"></dd>

                                <dt class="col-sm-4 mt-3">Email</dt>
                                <dd class="col-sm-8 mt-3"></dd>

                                <dt class="col-sm-4 mt-3">Alamat</dt>
                                <dd class="col-sm-8 mt-3"></dd>

                                <dt class="col-sm-4 mt-3">Resume</dt>
                                <dd class="col-sm-8 mt-3">
                                    {{-- @if ($pelamar->profile && $pelamar->profile->resume) --}}
                                    <a href="" target="_blank"
                                        class="btn btn-primary btn-sm">View Resume</a>
                                    {{-- @else --}}
                                    <span class="text-muted">No Resume Available</span>
                                    @endif
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center mt-4">
                        <a href="{{ route('pelamarperusahaan.index') }}" class="btn btn-info">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
