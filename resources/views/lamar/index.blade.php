@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Menu Pelamar Pekerjaan</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">List Pelamar</h2>
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        @role('super-admin')
                        <div class="card-header">
                            <h4>Tabel Pelamar</h4>
                        </div>
                        @endrole
                        @role('Perusahaan')
                        <div class="card-header">
                            <h4>Data Pelamar Kerja</h4>
                        </div>
                        @endrole
                        <div class="card-body">
                        <form action="{{ route('pelamarkerja.index') }}" method="GET">
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
                                    <a href="{{ route('pelamarkerja.index') }}" class="btn btn-secondary ml-2">Reset</a>
                                </div>
                            </div>
                        </form>
                            @role('super-admin')
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Pelamar</th>
                                            <th class="text-center">Perusahaan</th>
                                            <th class="text-center">Posisi Pekerjaan</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach ($allResults as $key => $lamar)
                                            <tr>
                                                <td class="text-center">
                                                    {{ ($allResults->currentPage() - 1) * $allResults->perPage() + $key + 1 }}
                                                </td>
                                                <td class="text-center">{{ $lamar->name}}</td>
                                                <td class="text-center">{{ $lamar->nama }}</td>
                                                <td class="text-center">{{ $lamar->judul }}</td>
                                                <td class="text-center">{{ $lamar->status }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('pelamarkerja.show', $lamar->id) }}"
                                                            class="btn btn-sm btn-info btn-icon "><i
                                                                class="fas fa-edit"></i>
                                                            Lihat Lamaran</a>
                                                            <form action="{{ route('pelamarkerja.destroy', $lamar->id) }}"
                                                                method="POST" class="ml-2">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-times"></i> Hapus </button>
                                                            </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endrole
                            @role('Perusahaan')
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Data Pelamar</h4>
                                        </div>
                                        @foreach ($loggedInUserResults as $key => $lamar)
                                        <div class="card-body">
                                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                                <li class="media">
                                                    <div class="text-center">
                                                        @if ($lamar && $lamar->foto)
                                                        <img src="{{ asset('storage/' . $lamar->foto) }}" alt="Foto"
                                                            class="rounded-circle mr-4" style="width: 100px; height: 100px;">
                                                        @else
                                                        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                                            class="rounded-circle mr-4" style="width: 100px; height: 100px;">
                                                        @endif
                                                    </div>
                                                    <div class="media-body ml-4">
                                                        <div class="media-right">
                                                            <a href="{{ route('pelamarkerja.show', $lamar->id) }}" class="btn btn-sm btn-primary btn-icon">
                                                                <i class="far fa-eye"></i> Detail
                                                            </a>
                                                            <br>
                                                            <br>
                                                            <a href="#" class="badge
                                                                @if ($lamar->status === 'pending')
                                                                    badge-warning
                                                                @elseif ($lamar->status === 'diterima')
                                                                    badge-success
                                                                @elseif ($lamar->status === 'ditolak')
                                                                    badge-danger
                                                                @endif
                                                                ">
                                                                {{ $lamar->status }}
                                                            </a>
                                                        </div>
                                                        <div class="media-title mb-1">{{ $lamar->name }}</div>
                                                        <div class="text-time">{{ $lamar->judul }}</div>
                                                        <div class="card-text">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <ul class="list-unstyled ml-2">
                                                                        <li class="mb-2"><img class="img-fluid icon-small"
                                                                                src="{{ asset('assets/img/lamar/calendar.svg') }}">
                                                                            02 Mei 2002
                                                                        </li>
                                                                        <li class="mb-2"><img class="img-fluid icon-small"
                                                                                src="{{ asset('assets/img/lamar/email.svg') }}">
                                                                            {{ $lamar->email }}
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <ul class="list-unstyled ml-2">
                                                                        <li class="mb-2"><img class="img-fluid icon-small"
                                                                                src="{{ asset('assets/img/lamar/call.svg') }}">
                                                                            {{ $lamar->no_hp }}
                                                                        </li>
                                                                        <li class="mb-4"><img class="img-fluid icon-small"
                                                                                src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                                                                            Jl. Pesantren 06, Malang
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media-description text-muted">
                                                            Melamar pada {{ date('j F Y', strtotime($lamar->created_at)) }}
                                                        </div>
                                                        {{-- <div class="media-description text-muted">
                                                            Melamar pada 22 Agustus 2023
                                                        </div> --}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endrole
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

        function submitDel(id) {
            $('#del-' + id).submit()
        }
    </script>
    <script>
        const statusSelect = document.getElementById('statusSelect');

        statusSelect.addEventListener('change', function() {
            const selectedStatus = statusSelect.value;

            window.location.href = '{{ route('pelamarkerja.index') }}?status=' + selectedStatus;
        });
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
