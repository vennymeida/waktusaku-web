@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Perusahaan User List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Perusahaan</a></div>
                <div class="breadcrumb-item">User List</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Perusahaan Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card card-primary">
                            <div class="card-header">
                            <h4>Perusahaan List</h4>
                        </div>
                        <div class="card-body">
                            <form id="search-form" method="GET" action="{{ route('perusahaan.index') }}">
                                <div class="form-row">
                                    <div class="form-group col-md-10">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Search...." value="{{ app('request')->input('name') }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button id="search-button" class="btn btn-primary mr-1" type="submit">Search</button>
                                        <a id="reset-button" class="btn btn-danger" href="{{ route('perusahaan.index') }}">Reset</a>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perusahaanData as $key => $perusahaan)
                                            <tr>
                                                <td>{{ ($perusahaanData->currentPage() - 1) * $perusahaanData->perPage() + $key + 1 }}</td>
                                                <td>{{ $perusahaan->perusahaan->name }}</td>
                                                <td>{{ $perusahaan->perusahaan->email }}</td>
                                                <td>{{ $perusahaan->perusahaan->alamat }}</td>
                                                <td>{{ $perusahaan->perusahaan->no_hp }}</td>
                                                <td>
                                                    <a href="{{ route('perusahaan.show', $perusahaan) }}" class="btn btn-sm btn-primary btn-icon">
                                                        <i class="fas fa-eye"></i> Details
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $perusahaanData->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
