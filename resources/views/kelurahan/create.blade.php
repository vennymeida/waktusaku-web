@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header" style="border-radius: 15px;">
            <h1>Table Kelurahan</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Kelurahan</h2>

            <div class="card" style="border-radius: 15px;">
                <div class="card-header">
                    <h4>Validasi Tambah Kelurahan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelurahan.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select class="form-control select2 @error('id_kecamatan') is-invalid @enderror"
                                name="id_kecamatan" data-id="select-kecamatan" id="id_kecamatan">
                                <option value="">-- select kecamatan --</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">
                                        {{ $kecamatan->kecamatan }}</option>
                                @endforeach
                            </select>
                            @error('id_kecamatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kelurahan</label>
                            <input type="text" id="kelurahan" name="kelurahan"
                                class="form-control @error('kelurahan') is-invalid @enderror"
                                placeholder="Masukan Kelurahan" autocomplete="off" style="border-radius: 15px;">
                            @error('kelurahan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('kelurahan.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
