@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Daftar Pelamar Pekerjaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('pelamarkerja.index') }}">Pelamar Pekerjaan</a></div>
            <div class="breadcrumb-item active">Detail</div>
        </div>
    </div>
    <div class="section-body">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Pelamar Pekerjaan</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                @if ($profileUser->foto)
                                    <img src="{{ asset('storage/' . $profileUser->foto) }}" alt="Foto"
                                    class="rounded-circle mr-1" style="width: 200px; height: 200px;">
                                @else
                                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                    class="rounded-circle mr-1" style="width: 200px; height: 200px;">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <dl class="row">
                                <dt class="col-sm-4">Nama</dt>
                                <dd class="col-sm-8">{{$namaPengguna}}</dd>

                                <dt class="col-sm-4 mt-3">Nama Perusahaan</dt>
                                <dd class="col-sm-8 mt-3">{{ $namaPerusahaan }}</dd>

                                <dt class="col-sm-4 mt-3">Email</dt>
                                <dd class="col-sm-8 mt-3">{{ $email }}</dd>

                                <dt class="col-sm-4 mt-3">Posisi Pekerjaan</dt>
                                <dd class="col-sm-8 mt-3">{{ $judulPekerjaan }}</dd>

                                <dt class="col-sm-4 mt-3">Status</dt>
                                <dd class="col-sm-8 mt-3">{{ $lamar->status }}</dd>

                                <dt class="col-sm-4 mt-3">Resume</dt>
                                <dd class="col-sm-8 mt-3">
                                    @if ($profileUser && $profileUser->resume)
                                    <a href="{{ asset('storage/' . $profileUser->resume) }}" target="_blank"
                                        class="btn btn-primary btn-sm">View Resume</a>
                                    @else
                                    <span class="text-muted">No Resume Available</span>
                                    @endif
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <hr>
                    @role('Perusahaan')
                    <div class="text-center mt-4">
                        <form action="{{ route('pelamarkerja.update', ['pelamarkerja' => $lamar->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="diterima">
                            <button type="submit" class="btn btn-success btn-lg" style="width: 800px;">Terima</button>
                        </form>
                    </div>
                    <div class="text-center mt-4">
                        <form action="{{ route('pelamarkerja.update', ['pelamarkerja' => $lamar->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="ditolak">
                            <button type="submit" class="btn btn-secondary btn-lg" style="width: 800px;">Tolak</button>
                        </form>
                    </div>
                    @endrole
                    <div class="text-center mt-4">
                        <a href="{{ route('pelamarkerja.index') }}" class="btn btn-info">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
