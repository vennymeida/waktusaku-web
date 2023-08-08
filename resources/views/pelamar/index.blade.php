@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pelamar List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Pelamar Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pelamar List</h4>
                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('pelamar.create') }}">Add New</a>
                                <a class="btn btn-info btn-primary active search">
                                    <i class="fa fa-search" aria-hidden="true"></i> Search Pelamar</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <div class="show-search mb-3"
                                style="display: {{ app('request')->input('name') ? 'block' : 'none' }};"> --}}
                                <form id="search" method="GET" action="{{ route('pelamar.index') }}">
                                    <div class="form-row text-center">
                                        <div class="form-group col-md-10">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Search...." value="{{ app('request')->input('name') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button id="submit-button" class="btn btn-primary mr-1"
                                                type="submit">Submit</button>
                                            <a id="reset-button" class="btn btn-secondary"
                                                href="{{ route('pelamar.index') }}">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                                                <td>{{ $user->profile->alamat }}</td>
                                                <td>
                                                    @if ($user->profile->jenis_kelamin === 'L')
                                                        Laki-Laki
                                                    @elseif ($user->profile->jenis_kelamin === 'P')
                                                        Perempuan
                                                    @else
                                                        {{ $user->profile->jenis_kelamin }}
                                                    @endif
                                                </td>
                                                <td>{{ $user->profile->no_hp }}</td>
                                                <td>
                                                    <a href="{{ route('pelamar.edit', $user) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('pelamar.show', $user) }}" class="btn btn-info">View</a>
                                                    <form action="{{ route('pelamar.destroy', $user) }}" method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
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
