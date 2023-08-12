@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Lowongan Pekerjaan</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <form action="{{ route('loker.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="user_id" value="{{ $profileUser->id }}">
                                <input type="hidden" name="id_perusahaan" value="{{ $perusahaan->id }}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_kategori">Kategori</label>
                                        <select name="id_kategori[]"
                                            class="form-control select2 @error('id_kategori') is-invalid @enderror"
                                            multiple>
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            @foreach ($kategoris as $kategori)
                                                <option
                                                    value="{{ $kategori->id }}"{{ in_array($kategori->id, old('id_kategori', [])) ? 'selected' : '' }}>
                                                    {{ $kategori->kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_kategori')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            id="judul" name="judul" placeholder="Masukkan Judul Lowongan Pekerjaan"
                                            value="{{ old('judul') }}">
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi"
                                            class="form-control summernote-simple @error('deskripsi') is-invalid @enderror" type="text"
                                            style="height: 290px;" placeholder="Masukkan Deskripsi Pekerjaan">{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="requirement">Persyaratan</label>
                                        <textarea name="requirement" id="requirement"
                                            class="form-control summernote-simple @error('requirement') is-invalid @enderror" type="text"
                                            style="height: 150px;" placeholder="Masukkan Persyaratan Pekerjaan">{{ old('requirement') }}</textarea>
                                        @error('requirement')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                                        <select class="form-control @error('tipe_pekerjaan') is-invalid @enderror"
                                            id="tipe_pekerjaan" name="tipe_pekerjaan">
                                            <option value="" disabled selected>Pilih Tipe Pekerjaan</option>
                                            <option value="remote"
                                                {{ old('tipe_pekerjaan') === 'remote' ? 'selected' : '' }}>
                                                Remote
                                            </option>
                                            <option value="onsite"
                                                {{ old('tipe_pekerjaan') === 'onsite' ? 'selected' : '' }}>
                                                Onsite
                                            </option>
                                        </select>
                                        @error('tipe_pekerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jumlah_pelamar">Jumlah Pelamar</label>
                                        <input type="number"
                                            class="form-control @error('jumlah_pelamar') is-invalid @enderror"
                                            id="jumlah_pelamar" name="jumlah_pelamar"
                                            placeholder="Masukkan Jumlah Pelamar yang dibutuhkan"
                                            value="{{ old('jumlah_pelamar') }}">
                                        @error('jumlah_pelamar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gaji">Gaji</label>
                                        <input type="number" class="form-control @error('gaji') is-invalid @enderror"
                                            id="gaji" name="gaji" placeholder="Masukkan Gaji yang diberikan"
                                            value="{{ old('gaji') }}">
                                        @error('gaji')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="status" value="pending">
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a class="btn btn-secondary" href="{{ route('loker.index') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script src="{{ asset('assets/js/summernote-bs4.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#requirement').summernote({
                placeholder: 'Masukkan Persyaratan Pekerjaan',
                height: 200,
            });
        });
    </script>
@endpush

@push('customStyle')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush

@push('customScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
