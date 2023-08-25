@extends('landing-page.app')
@section('main')
    <main class="bg-secondary">
        <section class="centered-section">
            <div class="bg-primary-section col-md-10 py-1">
                <div class="profile-widget-description m-3"
                    style="font-weight: bold; font-size: 18px; display: flex; align-items: center;">
                    <div class="flex-grow-1">
                        <div class="profile-widget-name" style="color:#6777ef">List Data Pendidikan</div>
                    </div>
                </div>
            </div>
        </section>

        @if (count($pendidikan) > 0)
            @foreach ($pendidikan as $item)
                <section class="centered-section">
                    <div class="bg-primary-section col-md-10 py-1">
                        <div class="profile-widget-description m-3"
                            style="font-weight: bold; font-size: 16px; display: flex; align-items: center;">
                            <div class="flex-grow-1">
                                <div class="profile-widget-name"
                                    style="font-weight: bold; font-size: 18px; display: flex; align-items: center;">
                                    {{ $item->institusi }}
                                </div>
                            </div>
                            <div class="d-flex justify-content-end" style="font-size: 2.00em;" id="fluid">
                                <a href="#" data-id="{{ $item->id }}"
                                    data-edit-url="{{ route('pendidikan.edit', ['pendidikan' => $item->id]) }}"
                                    class="modal-edit-trigger">
                                    <img class="img-fluid" style="width: 30px; height: 30px;"
                                        src="{{ asset('assets/img/landing-page/edit-pencil.svg') }}">
                                </a>


                            </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="list-unstyled ml-2">
                                <li class="mb-2"><img class="img-fluid"
                                        src="{{ asset('assets/img/landing-page/Graduation Cap (2).svg') }}">&nbsp&nbsp&nbsp&nbsp
                                    {{ $item->gelar }} - {{ $item->jurusan }}
                                </li>
                                <li class="mb-2"><img class="img-fluid"
                                        src="{{ asset('assets/img/landing-page/Award.svg') }}">&nbsp&nbsp&nbsp
                                    {{ $item->prestasi }}
                                </li>
                                <li class="mb-2"><img class="img-fluid"
                                        src="{{ asset('assets/img/landing-page/timeline.svg') }}">&nbsp&nbsp&nbsp&nbsp
                                    {{ $item->ipk }}
                                </li>
                                <li class="mb-2"><img class="img-fluid"
                                        src="{{ asset('assets/img/landing-page/Time.svg') }}">&nbsp&nbsp&nbsp&nbsp
                                    {{ $item->tahun_mulai }} - {{ $item->tahun_berakhir }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <div id="modal-edit" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Pendidikan Edit</h4>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('pendidikan.update', $item->id) }}" class="needs-validation" novalidate=""
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="` + data.id + `">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label for="gelar">Gelar</label>
                                            <select class="form-control custom-input @error('gelar') is-invalid @enderror"
                                                name="gelar" id="gelar">
                                                <option value="">Pilih Gelar</option>
                                                <option value="SMA/SMK">SMA/SMK</option>
                                                <option value="D3">Diploma III</option>
                                                <option value="D4">Diploma IV</option>
                                                <option value="S1">Sarjana</option>
                                                <option value="S2">Magister</option>
                                            </select>
                                            @error('gelar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Nama Institusi</label>
                                            <input name="institusi" type="text"
                                                class="form-control custom-input @error('institusi') is-invalid @enderror"
                                                value="{{ old('institusi') }}">
                                            @error('institusi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Jurusan</label>
                                            <input name="jurusan" type="text"
                                                class="form-control custom-input @error('jurusan') is-invalid @enderror"
                                                value="{{ old('jurusan') }}">
                                            @error('jurusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Prestasi Akademik (Opsional)</label>
                                            <textarea name="prestasi" class="form-control custom-input @error('prestasi') is-invalid @enderror" rows="4">{{ old('prestasi') }}</textarea>
                                            @error('prestasi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-1 form-group">
                                            <label for="tahun">Periode Waktu</label>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <select
                                                class="form-control custom-input @error('tahun_mulai') is-invalid @enderror"
                                                name="tahun_mulai" id="tahun_mulai">
                                                <option value="">Pilih Tahun</option>
                                                @for ($tahun = 2017; $tahun <= date('Y'); $tahun++)
                                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                                @endfor
                                            </select>
                                            @error('tahun_mulai')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <span> - </span>
                                        <div class="col-md-3 form-group">
                                            <select
                                                class="form-control custom-input @error('tahun_berakhir') is-invalid @enderror"
                                                name="tahun_berakhir" id="tahun_berakhir">
                                                <option value="">Pilih Tahun</option>
                                                @for ($tahun = 2017; $tahun <= date('Y'); $tahun++)
                                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                                @endfor
                                                <option value="Saat Ini">Saat Ini</option>
                                            </select>
                                            @error('tahun_berakhir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-1 form-group">
                                            <label for="ipk">IPK (Opsional)</label>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <input name="ipk" type="number" step="0.01"
                                                class="form-control custom-input @error('ipk') is-invalid @enderror"
                                                value="{{ old('ipk') }}">
                                            @error('ipk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer bg-whitesmoke">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="modal-save-button">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </main>
@endsection

@push('customScript')
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.modal-edit-trigger').on('click', function() {
                var itemId = $(this).data('id');
                var editUrl = "{{ route('pendidikan.edit', ['pendidikan' => '_id_']) }}".replace(
                    '_id_', itemId);

                $.ajax({
                    url: editUrl,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {


                        $('#modal-edit select[name="gelar"]').val(data.gelar);
                        $('#modal-edit input[name="institusi"]').val(data.institusi);
                        $('#modal-edit input[name="jurusan"]').val(data.jurusan);
                        $('#modal-edit textarea[name="prestasi"]').val(data.prestasi);
                        $('#modal-edit select[name="tahun_mulai"]').val(data.tahun_mulai);
                        $('#modal-edit select[name="tahun_berakhir"]').val(data.tahun_berakhir);
                        $('#modal-edit input[name="ipk"]').val(data.ipk);
                        $('#modal-edit').modal('show');
                    }
                });
            });

            $('#modal-save-button').on('click', function() {
            var form = $('#modal-edit form');
            var formData = new FormData(form[0]);
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('_method', 'PUT');

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('Error! ' + response.message);
                    }
                },
                error: function() {
                    alert('Error while updating data!');
                }
            });
        });
    });
    </script>
@endpush
@push('customStyle')
@endpush
