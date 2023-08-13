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
                                        {{-- <input type="hidden" name="id_kategori" value="{{ $loker->id_kategori }}">
                                        <select class="form-control @error('id_kategori') is-invalid @enderror"
                                            id="id_kategori" name="id_kategori" disabled>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($kategoris as $kategori)
                                                <option @selected($kategori->id == $loker->id_kategori) value="{{ $kategori->id }}">
                                                    {{ $kategori->kategori }}</option>
                                            @endforeach
                                        </select> --}}
                                        <select name="id_kategori[]" class="form-control select2" multiple disabled>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}"
                                                    {{ in_array($kategori->id, $loker->kategori->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $kategori->kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="hidden" name="judul" value="{{ $loker->judul }}">
                                        <input type="text" class="form-control" id="judul" name="judul"
                                            value="{{ $loker->judul }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="hidden" name="deskripsi" value="{{ $loker->deskripsi }}">
                                        <textarea name="deskripsi" id="deskripsi" class="form-control summernote-simple" type="text" style="height: 150px;"
                                            disabled>{{ $loker->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="requirement">Persyaratan</label>
                                        <input type="hidden" name="requirement" value="{{ $loker->requirement }}">
                                        <textarea id="requirement-2" class="form-control" type="text" style="height: 150px;" disabled>{{ str_replace(['<ol>', '</ol>', '<li>', '</li>', '<br>'], ['', '', '', "\n", ''], $loker->requirement) }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="min_pendidikan">Minimal Pendidikan</label>
                                        <input type="hidden" name="min_pendidikan" value="{{ $loker->min_pendidikan }}">
                                        <select class="form-control select2" id="min_pendidikan" name="min_pendidikan"
                                            disabled>
                                            <option value="" disabled selected>Pilih minimal pendidikan</option>
                                            <option value="SMA"
                                                {{ $loker->min_pendidikan === 'SMA' ? 'selected' : '' }}>
                                                SMA
                                            </option>
                                            <option value="SMK"
                                                {{ $loker->min_pendidikan === 'SMK' ? 'selected' : '' }}>
                                                SMK
                                            </option>
                                            <option value="SMA/SMK"
                                                {{ $loker->min_pendidikan === 'SMA/SMK' ? 'selected' : '' }}>
                                                SMA/SMK
                                            </option>
                                            <option value="S1" {{ $loker->min_pendidikan === 'S1' ? 'selected' : '' }}>
                                                S1
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="min_pengalaman">Minimal Pengalaman</label>
                                        <input type="hidden" name="min_pengalaman" value="{{ $loker->min_pengalaman }}">
                                        <select class="form-control select2" id="min_pengalaman" name="min_pengalaman"
                                            disabled>
                                            <option value="" disabled selected>Pilih minimal pengalaman</option>
                                            <option value="tidak ada"
                                                {{ $loker->min_pengalaman === 'tidak ada' ? 'selected' : '' }}>
                                                Tidak ada
                                            </option>
                                            <option value="kurang dari setahun"
                                                {{ $loker->min_pengalaman === 'kurang dari setahun' ? 'selected' : '' }}>
                                                Kurang dari setahun
                                            </option>
                                            <option value="lebih dari setahun"
                                                {{ $loker->min_pengalaman === 'lebih dari setahun' ? 'selected' : '' }}>
                                                Lebih dari setahun
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gaji">Gaji</label>
                                        <input type="hidden" name="gaji_bawah" value="{{ $loker->gaji_bawah }}">
                                        <input type="hidden" name="gaji_atas" value="{{ $loker->gaji_atas }}">
                                        <div class="d-flex">
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <input type="text" class="form-control mr-2" id="gaji_bawah"
                                                    name="gaji_bawah"
                                                    value="{{ 'Rp ' . number_format($loker->gaji_bawah, 0, ',', '.') }}"
                                                    disabled>
                                                <span class="mr-2">-</span>
                                                <input type="text" class="form-control" id="gaji_atas"
                                                    name="gaji_atas"
                                                    value="{{ 'Rp ' . number_format($loker->gaji_atas, 0, ',', '.') }}"
                                                    disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                                        <input type="hidden" name="tipe_pekerjaan"
                                            value="{{ $loker->tipe_pekerjaan }}">
                                        <select class="form-control select2" id="tipe_pekerjaan" name="tipe_pekerjaan"
                                            disabled>
                                            <option value="onsite"
                                                {{ $loker->tipe_pekerjaan === 'onsite' ? 'selected' : '' }}>
                                                Onsite</option>
                                            <option value="remote"
                                                {{ $loker->tipe_pekerjaan === 'remote' ? 'selected' : '' }}>
                                                Remote</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jumlah_pelamar">Jumlah Pelamar</label>
                                        <input type="hidden" name="jumlah_pelamar"
                                            value="{{ $loker->jumlah_pelamar }}">
                                        <input type="number" class="form-control" id="jumlah_pelamar"
                                            name="jumlah_pelamar" value="{{ $loker->jumlah_pelamar }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tutup">Lowongan di tutup</label>
                                        <input type="hidden" name="tutup" value="{{ $loker->tutup }}">
                                        <input type="text" class="form-control" id="tutup" name="tutup"
                                            value="{{ \Carbon\Carbon::parse($loker->tutup)->format('d F Y') }}" disabled>
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
                                <select name="id_kategori[]" class="form-control" multiple style="display: none;">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ in_array($kategori->id, $loker->kategori->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $kategori->kategori }}
                                        </option>
                                    @endforeach
                                </select>
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
                                            <select name="id_kategori[]"
                                                class="form-control select2 @error('id_kategori') is-invalid @enderror"
                                                multiple>
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($kategoris as $kategori)
                                                    <option value="{{ $kategori->id }}"
                                                        {{ in_array($kategori->id, $loker->kategori->pluck('id')->toArray()) ? 'selected' : '' }}>
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
                                                style="height: 290px;" placeholder="Masukkan Deskripsi Pekerjaan">{{ $loker->deskripsi }}</textarea>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="min_pendidikan">Minimal Pendidikan</label>
                                            <select
                                                class="form-control select2 @error('min_pendidikan') is-invalid @enderror"
                                                id="min_pendidikan" name="min_pendidikan">
                                                <option value="" disabled selected>Pilih minimal pendidikan</option>
                                                <option value="SMA"
                                                    {{ $loker->min_pendidikan === 'SMA' ? 'selected' : '' }}>
                                                    SMA
                                                </option>
                                                <option value="SMK"
                                                    {{ $loker->min_pendidikan === 'SMK' ? 'selected' : '' }}>
                                                    SMK
                                                </option>
                                                <option value="SMA/SMK"
                                                    {{ $loker->min_pendidikan === 'SMA/SMK' ? 'selected' : '' }}>
                                                    SMA/SMK
                                                </option>
                                                <option value="S1"
                                                    {{ $loker->min_pendidikan === 'S1' ? 'selected' : '' }}>
                                                    S1
                                                </option>
                                            </select>
                                            @error('min_pendidikan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="min_pengalaman">Minimal Pengalaman</label>
                                            <select
                                                class="form-control select2 @error('min_pengalaman') is-invalid @enderror"
                                                id="min_pengalaman" name="min_pengalaman">
                                                <option value="" disabled selected>Pilih minimal pengalaman</option>
                                                <option value="tidak ada"
                                                    {{ $loker->min_pengalaman === 'tidak ada' ? 'selected' : '' }}>
                                                    Tidak ada
                                                </option>
                                                <option value="kurang dari setahun"
                                                    {{ $loker->min_pengalaman === 'kurang dari setahun' ? 'selected' : '' }}>
                                                    Kurang dari setahun
                                                </option>
                                                <option value="lebih dari setahun"
                                                    {{ $loker->min_pengalaman === 'lebih dari setahun' ? 'selected' : '' }}>
                                                    Lebih dari setahun
                                                </option>
                                            </select>
                                            @error('min_pengalaman')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gaji">Gaji</label>
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center flex-grow-1">
                                                    <input type="number"
                                                        class="form-control mr-2 @error('gaji_bawah') is-invalid @enderror"
                                                        id="gaji_bawah" name="gaji_bawah"
                                                        value="{{ $loker->gaji_bawah }}" placeholder="contoh: 3000000">
                                                    <span class="mr-2">-</span>
                                                    <input type="number"
                                                        class="form-control @error('gaji_atas') is-invalid @enderror"
                                                        id="gaji_atas" name="gaji_atas" value="{{ $loker->gaji_atas }}"
                                                        placeholder="contoh: 3000000">
                                                </div>
                                            </div>
                                            @if ($errors->has('gaji_bawah') && !$errors->has('gaji_atas'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first('gaji_bawah') }}
                                                </div>
                                            @elseif (!$errors->has('gaji_bawah') && $errors->has('gaji_atas'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first('gaji_atas') }}
                                                </div>
                                            @elseif ($errors->has('gaji_bawah') && $errors->has('gaji_atas'))
                                                <div class="invalid-feedback d-block">
                                                    {{ $errors->first('gaji_atas') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                                            <select
                                                class="form-control select2 @error('tipe_pekerjaan') is-invalid @enderror"
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
                                            <label for="tutup">Lowongan di tutup</label>
                                            <input type="date"
                                                class="form-control @error('tutup') is-invalid @enderror" id="tutup"
                                                name="tutup" placeholder="Masukkan tanggal"
                                                value="{{ $loker->tutup }}">
                                            @error('tutup')
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
                                                <select class="form-control select2" id="status" name="status">
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

@push('customStyle')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush

@push('customScript')
    <script src="{{ asset('assets/js/summernote-bs4.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#requirement').summernote({
                placeholder: 'Masukkan Persyaratan Pekerjaan',
                height: 200,
            });
        });
    </script>
@endpush
