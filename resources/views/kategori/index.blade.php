@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Menu Kategori Pekerjaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Menu Kategori Pekerjaan</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Menu Kategori Pekerjaan</h4>
                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('kategori.create') }}">Create
                                    Kategori Pekerjaan Baru</a>
                                <a class="btn btn-info btn-primary active search"> <i class="fa fa-search"
                                        aria-hidden="true"></i> Search Kategori Pekerjaan</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="{{ route('kategori.index') }}">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="role">Kategori</label>
                                            <input type="text" name="kategori" class="form-control" id="kategori"
                                                placeholder=" kategori">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        <a class="btn btn-secondary" href="{{ route('kategori.index') }}">Reset</a>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>Nomer</th>
                                            <th>Kategori Pekerjaan</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach ($kategoris as $key => $kategori)
                                            <tr>
                                                <td>{{ ($kategoris->currentPage() - 1) * $kategoris->perPage() + $key + 1 }}
                                                </td>
                                                <td>{{ $kategori->kategori }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('kategori.edit', $kategori->id) }}"
                                                            class="btn btn-sm btn-info btn-icon "><i
                                                                class="fas fa-edit"></i>
                                                            Edit</a>
                                                        <form action="{{ route('kategori.destroy', $kategori->id) }}"
                                                            method="POST" class="ml-2" id="del-<?= $kategori->id ?>">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button type="submit" id="#submit"
                                                                class="btn btn-sm btn-danger btn-icon "
                                                                data-confirm="Hapus Kategori ?|Apakah Kamu Yakin?"
                                                                data-confirm-yes="submitDel(<?= $kategori->id ?>)"
                                                                data-id="del-{{ $kategori->id }}">
                                                                <i class="fas fa-times"> </i> Hapus </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $kategoris->withQueryString()->links() }}
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
