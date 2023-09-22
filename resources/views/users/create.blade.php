@extends('layouts.app')
@section('title', 'WaktuSaku - Daftar Seluruh Pengguna')

@section('content')
    <section class="section">
        <div class="section-header" style="border-radius: 15px;">
            <h1>Table Users</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah User</h2>

            <div class="card" style="border-radius: 15px;">
                <div class="card-header">
                    <h4>Validasi Tambah Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter User Name" value="{{ old('name') }}"
                                style="border-radius: 15px;">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Enter User Email" value="{{ old('email') }}"
                                style="border-radius: 15px;">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Enter User Password"
                                style="border-radius: 15px;">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="user_type">Assign Roles</label>
                            <select class="select2 form-control @error('user_type') is-invalid @enderror" id="user_type"
                                name="user_type">
                                <option value="">Pilih Role</option>
                                <option value="pencari_kerja" {{ old('user_type') === 'pencari_kerja' ? 'selected' : '' }}>
                                    Pencari Kerja</option>
                                <option value="perusahaan" {{ old('user_type') === 'perusahaan' ? 'selected' : '' }}>
                                    Perusahaan</option>
                            </select>
                            @error('user_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('user.index') }}">Cancel</a>
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
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
