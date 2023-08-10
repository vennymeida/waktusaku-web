@extends('layouts.app')

@section('content')
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
                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('loker.create') }}">Tambah
                                    Lowongan Pekerjaan Baru</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="search" method="GET" action="{{ route('loker.index') }}">
                                    <div class="form-row text-center">
                                        <div class="form-group col-md-10">
                                            <input type="text" name="loker" class="form-control" id="loker"
                                                placeholder="Cari...." value="{{ app('request')->input('loker') }}">
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
                                            <th>No</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Kategori Pekerjaan</th>
                                            <th>Tipe Pekerjaan</th>
                                            <th>Gaji</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Detail</th>
                                        </tr>
                                        {{-- @foreach ($lokers as $key => $loker) --}}
                                            <tr>
                                                <td>1</td>
                                                <td>Hummasoft Technology</td>
                                                <td>Programmer</td>
                                                <td>Remote</td>
                                                <td>Rp 3.500.000</td>
                                                <td>Pending</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href=""
                                                            class="btn btn-sm btn-info btn-icon "><i
                                                                class="fas fa-edit"></i>
                                                            Edit</a>
                                                            <form action=""
                                                                method="POST" class="ml-2">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-times"></i> Hapus </button>
                                                            </form>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href=""
                                                        class="btn btn-sm btn-primary btn-icon">
                                                            <i class="far fa-eye"></i>
                                                            Detail</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{-- {{ $lokers->withQueryString()->links() }} --}}
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
