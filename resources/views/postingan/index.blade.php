@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Menu Postingan Pengguna</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Postingan Pengguna</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Tabel Postingan Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">No</th>
                                            <th class="text-center" style="width: 250px">Gambar</th>
                                            <th class="text-center">Isi Postingan</th>
                                            <th class="text-center" style="width: 200px">Action</th>
                                        </tr>
                                        </thead>
                                        @foreach ($postingans as $key => $postingan)
                                            <tr>
                                                <td>{{ ($postingans->currentPage() - 1) * $postingans->perPage() + $key + 1 }}
                                                </td>
                                                <td>{{ $postingan->gambar }}</td>
                                                <td class="text-justify">{{ $postingan->konteks }}</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <form action="{{ route('postinganadmin.destroy', $postingan->id) }}"
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
                                <div class="d-flex justify-content-center">
                                    {{ $postingans->withQueryString()->links() }}
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
