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
                                            <option value="" selected>-- Posisi Pekerjaan --</option>
                                            {{-- @foreach ($statuses as $status)
                                                <option value="{{ $status }}"
                                                    @if ($status == $selectedStatus) selected @endif>
                                                    {{ $status }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="search"
                                            value="{{ app('request')->input('search') }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('loker.index') }}" class="btn btn-secondary ml-2">Reset</a>
                                    </div>
                                </div>
                            </form>
                            </div>
                            @role('super-admin')
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Pelamar</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Resume</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        {{-- @foreach ($kategoris as $key => $kategori) --}}
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-center">Venny Meida Hersianty</td>
                                                <td class="text-center">venny@gmail.com</td>
                                                <td class="text-center">resume.pdf</td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">
                                                        <a href=""
                                                            class="btn btn-sm btn-info btn-icon "><i
                                                                class="fas fa-edit"></i>
                                                            Lihat Lamaran</a>
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
                                            </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                </table>
                                {{-- <div class="d-flex justify-content-center">
                                    {{ $kategoris->withQueryString()->links() }}
                                </div> --}}
                            </div>
                            @endrole
                            @role('Perusahaan')
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-12">
                                  <div class="card">
                                    <div class="card-header">
                                      <h4>Comments</h4>
                                    </div>
                                    <div class="card-body">
                                      <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                        <li class="media">
                                          <img alt="image" class="mr-3 rounded-circle" width="70" src="assets/img/avatar/avatar-1.png">
                                          <div class="media-body">
                                            <div class="media-right">
                                                <a href="#" class="btn btn-sm btn-primary btn-icon">
                                                    <i class="far fa-eye" id=""></i> Detail
                                                </a>
                                            </div>
                                            <div class="media-title mb-1">Rizal Fakhri</div>
                                            <div class="text-time">Frontend Developer</div>
                                            <div class="media-description text-muted">Melamar pada 7 Agustus 2023</div>
                                          </div>
                                        </li>
                                        <li class="media">
                                          <img alt="image" class="mr-3 rounded-circle" width="70" src="assets/img/avatar/avatar-2.png">
                                          <div class="media-body">
                                            <div class="media-right">
                                                <a href="#" class="btn btn-sm btn-primary btn-icon">
                                                    <i class="far fa-eye" id=""></i> Detail
                                                </a>
                                            </div>
                                            <div class="media-title mb-1">Bambang Uciha</div>
                                            <div class="text-time">Desain Grafis</div>
                                            <div class="media-description text-muted">Melamar pada 7 Agustus 2023</div>
                                          </div>
                                        </li>
                                        <li class="media">
                                          <img alt="image" class="mr-3 rounded-circle" width="70" src="assets/img/avatar/avatar-3.png">
                                          <div class="media-body">
                                            <div class="media-right">
                                                <a href="#" class="btn btn-sm btn-primary btn-icon">
                                                    <i class="far fa-eye" id=""></i> Detail
                                                </a>
                                            </div>
                                            <div class="media-title mb-1">Ujang Maman</div>
                                            <div class="text-time">Mobile Developer</div>
                                            <div class="media-description text-muted">Melamar pada 7 Agustus 2023</div>
                                          </div>
                                        </li>
                                      </ul>
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
