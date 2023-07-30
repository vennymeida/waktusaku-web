@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table Kelurahan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit Kelurahan</h2>

            <div class="card">
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
                            <input type="text" id="kelurahan" name="kelurahan"
                                class="form-control @error('kelurahan') is-invalid @enderror "
                                placeholder="Masukan Kelurahan" value="{{ old('kelurahan', $kelurahan->kelurahan) }}"
                                data-id="input_kelurahan" autocomplete="off">
                            @error('kelurahan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Kirim</button>
                    <a class="btn btn-secondary" href="{{ route('kelurahan.index') }}">Batal</a>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
