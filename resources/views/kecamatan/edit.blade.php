@extends('layouts.app')
@section('title', 'WaktuSaku - Daftar Kecamatan')

@section('content')
    <section class="section">
        <div class="section-header" style="border-radius: 15px;">
            <h1>Table Kecamatan</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Kecamatan</h2>

            <div class="card" style="border-radius: 15px;">
                <div class="card-body">
                    <form action="{{ route('kecamatan.update', $kecamatan) }}" method="POST">
                        <div class="card-header">
                            <h4>Validasi Edit Data Kecamatan</h4>
                        </div>
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                    id="kecamatan" name="kecamatan" value="{{ $kecamatan->kecamatan }}"
                                    style="border-radius: 15px;">
                                @error('kecamatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a class="btn btn-secondary" href="{{ route('kecamatan.index') }}">Cancel</a>
                            </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
