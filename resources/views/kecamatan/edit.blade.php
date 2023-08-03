@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table Kecamatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Kecamatan</h2>

            <div class="card">
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
                                    id="kecamatan" name="kecamatan" value="{{ $kecamatan->kecamatan }}">
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
