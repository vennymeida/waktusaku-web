@extends('layouts.app')
@section('title', 'WaktuSaku - Daftar Kelurahan')

@section('content')
    <section class="section">
        <div class="section-header" style="border-radius: 15px;">
            <h1>Table Kelurahan</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Kelurahan</h2>

            <div class="card" style="border-radius: 15px;">
                <div class="card-body">
                    <form action="{{ route('kelurahan.update', $kelurahan) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select class="form-control select2 @error('id_kecamatan') is-invalid @enderror"
                                id="id_kecamatan" name="id_kecamatan" data-id="select-id_kecamatan">
                                <option value="">-- select kecamatan --</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option @selected($kecamatan->id == $kelurahan->id_kecamatan) value="{{ $kecamatan->id }}">
                                        {{ $kecamatan->kecamatan }}
                                    </option>
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
                            <input type="text" class="form-control @error('kelurahan') is-invalid @enderror"
                                id="kelurahan" name="kelurahan" value="{{ $kelurahan->kelurahan }}"
                                style="border-radius: 15px;">
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
