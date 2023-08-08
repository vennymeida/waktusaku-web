@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Lowongan Pekerjaan</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Lowongan Pekerjaan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('loker.update', $loker->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="user">Nama User</label>
                        <input type="text" class="form-control" id="user" name="user"
                            placeholder="Masukkan Nama User" value="{{ $loker->user }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Masukkan Nama Perusahaan" value="{{ $loker->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori"
                            placeholder="Masukkan kategori" value="{{ $loker->kategori }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul Lowongan</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            placeholder="Masukkan judul lowongan pekerjaan" value="{{ $loker->judul }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Pekerjaan</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                            placeholder="Masukkan deskripsi pekerjaan" value="{{ $loker->deskripsi }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="requirement">Persyaratan Pekerjaan</label>
                        <input type="text" class="form-control" id="requirement" name="requirement"
                            placeholder="Masukkan persyaratan pekerjaan" value="{{ $loker->requirement }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Pekerjaan</label>
                        <input type="text" class="form-control" id="tipe" name="tipe"
                            value="{{ $loker->tipe === 'onsite' ? 'Onsite' : 'Remote' }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="gaji">Gaji Pekerjaan</label>
                        <input type="text" class="form-control" id="gaji" name="gaji"
                            placeholder="Masukkan gaji Pekerjaan" value="{{ $loker->gaji }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="kuota">Kuota yang Dibutuhkan</label>
                        <input type="text" class="form-control" id="kuota" name="kuota"
                            placeholder="Masukkan kuota lowongan pekerjaan" value="{{ $loker->kuota }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Pekerjaan</label>
                        <select class="form-control" id="status" name="status">
                            <option value="pending" {{ $loker->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="dibuka" {{ $loker->status === 'dibuka' ? 'selected' : '' }}>Dibuka</option>
                            <option value="ditutup" {{ $loker->status === 'ditutup' ? 'selected' : '' }}>Ditutup</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a class="btn btn-secondary" href="{{ route('loker.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
