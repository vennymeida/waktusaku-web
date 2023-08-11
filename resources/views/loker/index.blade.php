@extends('layouts.app')

@section('content')
    @if (Auth::user()->hasRole('super-admin'))
        <!-- Main Content -->
        <section class="section">
            <div class="section-header">
                <h1>Menu Lowongan Pekerjaan</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">Lowongan Pekerjaan</h2>

                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Tabel Lowongan Pekerjaan</h4>
                            </div>
                            <div class="card-body">
                                <div class="mt-0">
                                    <form action="{{ route('loker.index') }}" method="GET">
                                        <div class="form-row text-center">
                                            <div class="form-group col-md-4">
                                                <select name="status" class="form-control" id="statusSelect">
                                                    <option value="" selected>-- Pilih Status --</option>
                                                    @foreach ($statuses as $status)
                                                        <option value="{{ $status }}"
                                                            @if ($status == $selectedStatus) selected @endif>
                                                            {{ $status }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="search"
                                                    value="{{ app('request')->input('search') }}">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <a href="{{ route('loker.index') }}"
                                                    class="btn btn-secondary ml-2">Reset</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tbody>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Kategori Pekerjaan</th>
                                                <th>Tipe Pekerjaan</th>
                                                <th>Gaji</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                                <th class="text-center">Detail</th>
                                            </tr>
                                            @foreach ($allResults as $key => $loker)
                                                <tr>
                                                    <td>{{ ($allResults->currentPage() - 1) * $allResults->perPage() + $key + 1 }}
                                                    </td>
                                                    <td>{{ $loker->nama }}</td>
                                                    <td>{{ $loker->kategori }}</td>
                                                    <td>{{ $loker->tipe_pekerjaan }}</td>
                                                    <td>{{ 'Rp ' . number_format($loker->gaji, 0, ',', '.') }}</td>
                                                    <td>{{ $loker->status }}</td>
                                                    <td class="text-center">
                                                        <div class="d-flex justify-content-center">
                                                            <a href="{{ route('loker.edit', $loker->id) }}"
                                                                class="btn btn-sm btn-info btn-icon "><i
                                                                    class="fas fa-edit"></i>
                                                                Edit</a>
                                                            <form action="{{ route('loker.destroy', $loker->id) }}"
                                                                method="POST" class="ml-2">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button
                                                                    class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-times"></i> Hapus </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="d-flex justify-content-center">
                                                            <a href="#" class="btn btn-sm btn-primary btn-icon"
                                                                data-toggle="modal"
                                                                data-target="#detailModal{{ $loker->id }}">
                                                                <i class="far fa-eye" id="modal-{{ $loker->id }}"></i>
                                                                Detail
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {{ $allResults->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Modal -->
    @foreach ($allResults as $key => $loker)
        <div class="modal fade" id="detailModal{{ $loker->id }}" tabindex="-1" role="dialog"
            aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Lowongan Pekerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="text-left">Nama Pemilik</th>
                                    <td>{{ $loker->name }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Nama Perusahaan</th>
                                    <td>{{ $loker->nama }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Kategori Pekerjaan</th>
                                    <td>{{ $loker->kategori }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Judul Lowongan</th>
                                    <td>{{ $loker->judul }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Deskripsi</th>
                                    <td>{{ $loker->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Requirement</th>
                                    <td>{{ $loker->requirement }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Tipe Pekerjaan</th>
                                    <td>{{ $loker->tipe_pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Gaji</th>
                                    <td>{{ 'Rp ' . number_format($loker->gaji, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Kuota Pelamar</th>
                                    <td>{{ $loker->jumlah_pelamar }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left">Status</th>
                                    <td>{{ $loker->status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if (Auth::user()->hasRole('Perusahaan'))
        <section class="section">
            <div class="section-header d-flex justify-content-between align-items-center">
                <h1>Lowongan Pekerjaan</h1>
                {{-- @if (!empty($profilUser->id) && !empty($perusahaan->id)) --}}
                <a href="{{ route('loker.create') }}" class="btn btn-primary" style="border-radius: 25px;"><i
                        class="fas fa-plus-circle"></i>
                    Tambah Lowongan Kerja
                </a>
                {{-- @endif --}}
            </div>
            {{-- @if (empty($profilUser->id) || empty($perusahaan->id))
                <div class="alert alert-danger d-inline-block">
                    Lengkapi data diri dan data perusahaan terlebih dahulu untuk bisa menambah Lowongan Pekerjaan.
                </div>
            @endif --}}
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div>
                                <form id="search" method="GET" action="{{ route('loker.index') }}">
                                    <div class="form-row text-center">
                                        <div class="form-group col-md-10">
                                            <input type="text" name="search" class="form-control" id="search"
                                                placeholder="Cari...." value="{{ app('request')->input('search') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button id="submit-button" class="btn btn-primary mr-1"
                                                type="submit">Submit</button>
                                            <a id="reset-button" class="btn btn-secondary"
                                                href="{{ route('loker.index') }}">Reset</a>
                                        </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th class="col-md-2">Judul</th>
                                            <th class="col-md-3">Deskripsi</th>
                                            <th class="col-md-3">Persyaratan</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach ($loggedInUserResults as $key => $loker)
                                            <tr>
                                                <td>{{ ($loggedInUserResults->currentPage() - 1) * $loggedInUserResults->perPage() + $key + 1 }}
                                                </td>
                                                <td>{{ $loker->judul }}</td>
                                                <td>{{ $loker->deskripsi }}</td>
                                                <td>{{ $loker->requirement }}</td>
                                                <td>{{ $loker->status }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="#" class="btn btn-sm btn-primary btn-icon"
                                                            data-toggle="modal"
                                                            data-target="#detailModal{{ $loker->id }}">
                                                            <i class="far fa-eye" id="modal-{{ $loker->id }}"></i>
                                                            Detail
                                                        </a>
                                                        <a href="{{ route('loker.edit', $loker->id) }}"
                                                            class="btn btn-sm btn-info btn-icon ml-2"><i
                                                                class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('loker.destroy', $loker->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $loggedInUserResults->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    </div>
    </section>
    <!-- Modal -->
    {{-- <div class="modal fade" id="detailModal{{ $loker->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Lowongan Pekerjaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi detail lowongan pekerjaan di sini -->
                    <p>Nama Perusahaan: {{ $loker->nama }}</p>
                    <p>Kategori: {{ $loker->kategori }}</p>
                    <!-- ... dan seterusnya ... -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div> --}}
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

        function submitDel(id) {
            $('#del-' + id).submit()
        }
    </script>
    <script>
        const statusSelect = document.getElementById('statusSelect');

        statusSelect.addEventListener('change', function() {
            const selectedStatus = statusSelect.value;

            window.location.href = '{{ route('loker.index') }}?status=' + selectedStatus;
        });
    </script>
@endpush

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
@push('customScript')
    <script>
        document.getElementById('statusSelect').addEventListener('change', function() {
            document.getElementById('search').submit();
        });
    </script>
@endpush
