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
                <form method="POST" action="{{ route('loker.update', $loker->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Masukkan Nama Perusahaan" value="{{ $loker->nama }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori"
                                    placeholder="Masukkan kategori" value="{{ $loker->kategori }}" disabled>
                            </div>
                            <!-- Tambahkan input lain di sini untuk kolom pertama -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipe">Tipe Pekerjaan</label>
                                <input type="text" class="form-control" id="tipe" name="tipe"
                                    value="{{ $loker->tipe_pekerjaan === 'onsite' ? 'Onsite' : 'Remote' }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="gaji">Gaji Pekerjaan</label>
                                <input type="text" class="form-control" id="gaji" name="gaji"
                                    placeholder="Masukkan gaji Pekerjaan" value="{{ $loker->gaji }}" disabled>
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
