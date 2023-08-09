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
                                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                                            <option value="" disabled selected>Pilih Kategori</option>
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul"
                                            placeholder="Masukkan Judul Lowongan Pekerjaan" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control summernote-simple" type="text" style="height: 150px;"
                                            placeholder="Masukkan Deskripsi Pekerjaan"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="requirement">Persyaratan</label>
                                        <textarea name="requirement" id="requirement" class="form-control summernote-simple" type="text"
                                            style="height: 150px;" placeholder="Masukkan Persyaratan Pekerjaan"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                                        <select class="form-control" id="tipe_pekerjaan" name="tipe_pekerjaan" required>
                                            <option value="" disabled selected>Pilih Tipe Pekerjaan</option>
                                            <option value="remote">Remote</option>
                                            <option value="onsite">Onsite</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jumlah_pelamar">Jumlah Pelamar</label>
                                        <input type="number" class="form-control" id="jumlah_pelamar" name="jumlah_pelamar"
                                            placeholder="Masukkan Jumlah Pelamar yang dibutuhkan" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gaji">Gaji</label>
                                        <input type="number" class="form-control" id="gaji" name="gaji"
                                            placeholder="Masukkan Gaji yang diberikan" required>
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
@endpush

@push('customStyle')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
