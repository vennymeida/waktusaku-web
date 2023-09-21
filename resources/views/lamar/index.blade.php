@extends('layouts.app')
@section('title', 'WaktuSaku - Daftar Pelamar Kerja')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header" style="border-radius: 15px;">
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
                    <div class="card card-primary" style="border-radius: 15px;">
                        <div class="card-header">
                            <h4>Tabel Pelamar</h4>
                        </div>
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
                                            value="{{ app('request')->input('search') }}" placeholder="Cari...">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('pelamarkerja.index') }}" class="btn btn-secondary ml-2">Reset</a>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Pelamar</th>
                                                <th class="text-center">Perusahaan</th>
                                                <th class="text-center">Posisi Pekerjaan</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        @if ($allResults->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">Data tidak tersedia</td>
                                            </tr>
                                        @else
                                            @foreach ($allResults as $key => $lamar)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ ($allResults->currentPage() - 1) * $allResults->perPage() + $key + 1 }}
                                                    </td>
                                                    <td class="text-center">{{ $lamar->name }}</td>
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
                                                                <button
                                                                    class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-times"></i> Hapus </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
