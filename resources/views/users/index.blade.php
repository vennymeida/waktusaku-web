@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>User List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">User Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>User List</h4>
                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('user.create') }}">Create New
                                    User</a>
                                <a class="btn btn-info btn-primary active search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Search User</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="show-search mb-3" style="display: none">
                                <form action="{{ route('user.index') }}" method="GET">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Search by Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ request()->query('name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="roles">Filter by Roles</label>
                                                <select name="roles[]" class="form-control select2" multiple>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}" {{ in_array($role->name, request()->query('roles', [])) ? 'selected' : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-danger">Clear Filters</a>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Roles</th> <!-- Add a new column for displaying roles -->
                                            <th class="text-right">Update Roles</th>
                                            <th class="text-right">Verify Email</th>
                                            <th class="text-right">Show</th> <!-- Add a new column for Actions -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->email_verified_at)
                                                        {{ $user->email_verified_at }}
                                                    @else
                                                        Access Denied
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach ($user->roles as $role)
                                                        {{ $role->name }}
                                                    @endforeach
                                                </td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="btn btn-sm btn-info btn-icon"><i
                                                                class="fas fa-edit"></i>
                                                            Edit</a>
                                                        <form action="{{ route('user.destroy', $user->id) }}"
                                                            method="POST" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        @if (is_null($user->email_verified_at))
                                                            <form
                                                                action="{{ route('user.verify-email', ['id' => $user->id, 'hash' => sha1($user->email)]) }}"
                                                                method="POST" class="d-inline-block"
                                                                id="vel-<?= $user->id ?>">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-primary ml-2"
                                                                    data-confirm="Verifikasi Data User |Apakah Kamu Yakin Verifikasi ?"
                                                                    data-confirm-yes="submitVeri(<?= $user->id ?>)"
                                                                    data-id="vel-{{ $user->id }}">Verify Email</button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('user.verify-email', ['id' => $user->id, 'hash' => sha1($user->email)]) }}"
                                                                method="POST" class="d-inline-block"
                                                                id="vel-<?= $user->id ?>">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger ml-2"
                                                                    data-confirm="Verifikasi Data User |Apakah Kamu Yakin Batalkan Verifikasi ?"
                                                                    data-confirm-yes="submitVeri(<?= $user->id ?>)"
                                                                    data-id="vel-{{ $user->id }}">Hapus Verify
                                                                    Email</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        <!-- Show button to view user details -->
                                                        <a href="{{ route('user.view', $user->id) }}" class="btn btn-sm btn-primary btn-icon">
                                                            <i class="fas fa-eye"></i> Show
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $users->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script>
        $(document).ready(function() {
            $('.import').click(function(event) {
                event.stopPropagation();
                $(".show-import").slideToggle("fast");
                $(".show-search").hide();
            });
            $('.search').click(function(event) {
                event.stopPropagation();
                $(".show-search").slideToggle("fast");
                $(".show-import").hide();
            });
            //ganti label berdasarkan nama file
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        });
    </script>
@endpush

@push('customStyle')
<script>
 function submitDel(id) {
            $('#del-' + id).submit()
        }

        function submitVeri(id) {
            $('#vel-' + id).submit()
        }

</script>
@endpush
@push('customStyle')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush

@push('customScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endpush
