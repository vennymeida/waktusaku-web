@extends('layouts.app')

@section('content')
    @if (Auth::user()->hasRole('super-admin'))
        <section class="section">
            <div class="section-header">
                <h1>Edit Lowongan Pekerjaan</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Lowongan Pekerjaan</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('loker.update', $loker->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan Nama Perusahaan" value="{{ $loker->perusahaan->nama }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama Pemilik</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan Nama Perusahaan" value="{{ $loker->perusahaan->pemilik }}"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_kategori">Kategori</label>
                                        <input type="hidden" name="id_kategori" value="{{ $loker->id_kategori }}">
                                        <select class="form-control @error('id_kategori') is-invalid @enderror"
                                            id="id_kategori" name="id_kategori" disabled>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($kategoris as $kategori)
                                                <option @selected($kategori->id == $loker->id_kategori) value="{{ $kategori->id }}">
                                                    {{ $kategori->kategori }}</option>
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
                                        <input type="hidden" name="judul" value="{{ $loker->judul }}">
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                            id="judul" name="judul" placeholder="Masukkan Judul Lowongan Pekerjaan"
                                            value="{{ $loker->judul }}" disabled>
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="hidden" name="deskripsi" value="{{ $loker->deskripsi }}">
                                        <textarea name="deskripsi" id="deskripsi"
                                            class="form-control summernote-simple @error('deskripsi') is-invalid @enderror" type="text"
                                            style="height: 150px;" placeholder="Masukkan Deskripsi Pekerjaan" disabled>{{ $loker->deskripsi }}</textarea>
                                        @error('diskripsi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="requirement">Persyaratan</label>
                                        <input type="hidden" name="requirement" value="{{ $loker->requirement }}">
                                        <textarea name="requirement" id="requirement"
                                            class="form-control summernote-simple @error('requirement') is-invalid @enderror" type="text"
                                            style="height: 150px;" placeholder="Masukkan Persyaratan Pekerjaan" disabled>{{ $loker->requirement }}</textarea>
                                        @error('requirement')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                                        <input type="hidden" name="tipe_pekerjaan" value="{{ $loker->tipe_pekerjaan }}">
                                        <select class="form-control @error('tipe_pekerjaan') is-invalid @enderror"
                                            id="tipe_pekerjaan" name="tipe_pekerjaan" disabled>
                                            <option value="onsite"
                                                {{ $loker->tipe_pekerjaan === 'onsite' ? 'selected' : '' }}>
                                                Onsite</option>
                                            <option value="remote"
                                                {{ $loker->tipe_pekerjaan === 'remote' ? 'selected' : '' }}>
                                                Remote</option>
                                        </select>
                                        @error('tipe_pekerjaan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jumlah_pelamar">Jumlah Pelamar</label>
                                        <input type="hidden" name="jumlah_pelamar" value="{{ $loker->jumlah_pelamar }}">
                                        <input type="number"
                                            class="form-control @error('jumlah_pelamar') is-invalid @enderror"
                                            id="jumlah_pelamar" name="jumlah_pelamar"
                                            placeholder="Masukkan Jumlah Pelamar yang dibutuhkan"
                                            value="{{ $loker->jumlah_pelamar }}" disabled>
                                        @error('jumlah_pelamar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="gaji">Gaji</label>
                                        <input type="hidden" name="gaji" value="{{ $loker->gaji }}">
                                        <input type="number" class="form-control @error('gaji') is-invalid @enderror"
                                            id="gaji" name="gaji" placeholder="Masukkan Gaji yang diberikan"
                                            value="{{ $loker->gaji }}" disabled>
                                        @error('gaji')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Status Pekerjaan</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="pending" {{ $loker->status === 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="dibuka" {{ $loker->status === 'dibuka' ? 'selected' : '' }}>
                                                Dibuka</option>
                                            <option value="ditutup" {{ $loker->status === 'ditutup' ? 'selected' : '' }}>
                                                Ditutup</option>
                                        </select>
                                    </div>
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
    @endif
    @if (Auth::user()->hasRole('Perusahaan'))
        <section class="section">
            <div class="section-header">
                <h1>Tambah Lowongan Pekerjaan</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <form action="{{ route('loker.update', $loker) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{ $profileUser->id }}">
                                    <input type="hidden" name="id_perusahaan" value="{{ $perusahaan->id }}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori</label>
                                            <select class="form-control @error('id_kategori') is-invalid @enderror"
                                                id="id_kategori" name="id_kategori">
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($kategoris as $kategori)
                                                    <option @selected($kategori->id == $loker->id_kategori) value="{{ $kategori->id }}">
                                                        {{ $kategori->kategori }}</option>
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
                                            <input type="text"
                                                class="form-control @error('judul') is-invalid @enderror" id="judul"
                                                name="judul" placeholder="Masukkan Judul Lowongan Pekerjaan"
                                                value="{{ $loker->judul }}">
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
                                                style="height: 150px;" placeholder="Masukkan Deskripsi Pekerjaan">{{ $loker->deskripsi }}</textarea>
                                            @error('diskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="requirement">Persyaratan</label>
                                            <textarea name="requirement" id="requirement"
                                                class="form-control summernote-simple @error('requirement') is-invalid @enderror" type="text"
                                                style="height: 150px;" placeholder="Masukkan Persyaratan Pekerjaan">{{ $loker->requirement }}</textarea>
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
                                                <option value="onsite"
                                                    {{ $loker->tipe_pekerjaan === 'onsite' ? 'selected' : '' }}>
                                                    Onsite</option>
                                                <option value="remote"
                                                    {{ $loker->tipe_pekerjaan === 'remote' ? 'selected' : '' }}>
                                                    Remote</option>
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
                                                value="{{ $loker->jumlah_pelamar }}">
                                            @error('jumlah_pelamar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gaji">Gaji</label>
                                            <input type="number"
                                                class="form-control @error('gaji') is-invalid @enderror" id="gaji"
                                                name="gaji" placeholder="Masukkan Gaji yang diberikan"
                                                value="{{ $loker->gaji }}">
                                            @error('gaji')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8"></div>
                                    @if ($loker->status == 'pending')
                                        <input type="hidden" name="status" value="pending">
                                    @else
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">Status Pekerjaan</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="dibuka"
                                                        {{ $loker->status === 'dibuka' ? 'selected' : '' }}>
                                                        Dibuka</option>
                                                    <option value="ditutup"
                                                        {{ $loker->status === 'ditutup' ? 'selected' : '' }}>
                                                        Ditutup</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif
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
    @endif
@endsection
