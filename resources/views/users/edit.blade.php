@extends('layouts.app')
@section('title', 'WaktuSaku - Daftar Seluruh Pengguna')

@section('content')
    <section class="section">
        <div class="section-header" style="border-radius: 15px;">
            <h1>Table Users</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Edit User</h2>
            <div class="card" style="border-radius: 15px;">
                <form action="{{ route('user.update', $user) }}" method="POST">
                    <div class="card-header">
                        <h4>Validasi Edit Data User</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $user->name }}" style="border-radius: 15px;">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ $user->email }}" style="border-radius: 15px;">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Add role assignment form with select2 library -->
                        <div class="form-group">
                            <label for="roles">Assign Roles</label>
                            <select name="roles[]" class="form-control select2">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
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
