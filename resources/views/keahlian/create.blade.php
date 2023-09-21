@extends('layouts.app')
@section('title', 'WaktuSaku - Daftar Keahlian Pekerjaan')

@section('content')
    <section class="section">
        <div class="section-header" style="border-radius: 15px;">
            <h1>Table</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Keahlian</h2>

            <div class="card" style="border-radius: 15px;">
                <div class="card-header">
                    <h4>Validasi Tambah Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('keahlian.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="keahlian">Keahlian</label>
                            <input type="text" class="form-control @error('keahlian') is-invalid @enderror"
                                id="keahlian" name="keahlian" placeholder="Masukkan keahlian" style="border-radius: 15px;">
                            @error('keahlian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('keahlian.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
