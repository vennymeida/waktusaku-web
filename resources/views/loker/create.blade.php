@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Table</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">Tambah Lowongan Pekerjaan</h2>
        <div class="card">
            <div class="card-header">
                <h4>Validasi Tambah Data</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="user">Nama User</label>
                        <input type="text" class="form-control @error('user') is-invalid @enderror" id="user"
                            name="user" placeholder="Masukkan Nama User" value="">
                        @error('user')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Perusahaan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Masukkan Nama Perusahaan" value="">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori"
                            name="kategori" placeholder="Masukkan kategori" value="">
                        @error('kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Lowongan</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                            name="judul" placeholder="Masukkan judul lowongan pekerjaan " value="">
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Pekerjaan</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                            name="deskripsi" placeholder="Masukkan deskripsi pekerjaan " value="">
                        @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="requirement">Persyaratan Pekerjaan</label>
                        <input type="text" class="form-control @error('requirement') is-invalid @enderror" id="requirement"
                            name="requirement" placeholder="Masukkan persyaratan pekerjaan" value="">
                        @error('requirement')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Pekerjaan</label>
                        <select class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe">
                            <option value="">Pilih Tipe Pekerjaan</option>
                            <option value="onsite">Onsite</option>
                            <option value="remote">Remote</option>
                        </select>
                        @error('tipe')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gaji">Gaji Pekerjaan</label>
                        <input type="integer" class="form-control @error('gaji') is-invalid @enderror" id="gaji"
                            name="gaji" placeholder="Masukkan gaji Pekerjaan" value="">
                        @error('gaji')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kuota">Kuota yang Dibutuhkan</label>
                        <input type="text" class="form-control @error('kuota') is-invalid @enderror" id="kuota"
                            name="kuota" placeholder="Masukkan kuota lowongan pekerjaan" value="">
                        @error('kuota')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status Pekerjaan</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="">Pilih Status Pekerjaan</option>
                            <option value="pending">Pending</option>
                            <option value="dibuka">Dibuka</option>
                            <option value="ditutup">Ditutup</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('loker.index') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('customStyle')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush

@push('customScript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
@endpush
