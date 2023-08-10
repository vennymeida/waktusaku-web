@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pelamar User List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Pelamar</a></div>
                <div class="breadcrumb-item">User List</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Pencari Kerja Management</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                    @include('layouts.alert')
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pelamar List</h4>
                        </div>
                        <div class="card-body">
                            <form id="search-form" method="GET" action="{{ route('pelamar.index') }}">
                                <div class="form-row">
                                    <div class="form-group col-md-10">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Search...." value="{{ app('request')->input('name') }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button id="search-button" class="btn btn-primary mr-1" type="submit">Search</button>
                                        <a id="reset-button" class="btn btn-danger" href="{{ route('pelamar.index') }}">Reset</a>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Telp</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pelamar as $key => $user)
                                            <tr>
                                                <td>{{ ($pelamar->currentPage() - 1) * $pelamar->perPage() + $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ optional($user->profile)->alamat }}</td>
                                                <td>
                                                    @if ($user->profile)
                                                        @if ($user->profile->jenis_kelamin === 'L')
                                                            Laki-Laki
                                                        @elseif ($user->profile->jenis_kelamin === 'P')
                                                            Perempuan
                                                        @else
                                                            {{ $user->profile->jenis_kelamin }}
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{ optional($user->profile)->no_hp }}</td>
                                                <td>
                                                    <a href="{{ route('pelamar.show', $user) }}" class="btn btn-sm btn-primary btn-icon">
                                                    <i class="fas fa-eye"></i> Details
                                                </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $pelamar->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection