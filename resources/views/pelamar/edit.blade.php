@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Pelamar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Pelamar</a></div>
                <div class="breadcrumb-item">Edit Pelamar</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Pelamar</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('pelamar.update', $pelamar) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $pelamar->name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $pelamar->email }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                           value="{{ optional($pelamar->profile)->alamat }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="L" {{ $pelamar->profile && $pelamar->profile->jenis_kelamin === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="P" {{ $pelamar->profile && $pelamar->profile->jenis_kelamin === 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp">No. Telepon</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                           value="{{ optional($pelamar->profile)->no_hp }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    @if ($pelamar->profile && $pelamar->profile->foto)
                                        <img src="{{ asset('storage/' . $pelamar->profile->foto) }}" alt="Foto" class="img-thumbnail">
                                    @else
                                        <span>No Photo Available</span>
                                    @endif
                                    <input type="file" class="form-control" id="foto" name="foto">
                                </div>

                                <div class="form-group">
                                    <label for="resume">Resume</label>
                                    @if ($pelamar->profile && $pelamar->profile->resume)
                                        <a href="{{ asset('storage/' . $pelamar->profile->resume) }}" target="_blank">View Resume</a>
                                    @else
                                        <span>No Resume Available</span>
                                    @endif
                                    <input type="file" class="form-control" id="resume" name="resume">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
