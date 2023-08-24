@extends('landing-page.app')
@section('main')
    <main class="bg-secondary">
        @if(count($pendidikan) > 0)
            @foreach($pendidikan as $item)
                <section class="centered-section">
                    <div class="bg-primary-section col-md-10 py-1">
                        <div class="profile-widget-description m-3"
                            style="font-weight: bold; font-size: 18px; display: flex; align-items: center;">
                            <div class="flex-grow-1">
                                <div class="profile-widget-name">Pendidikan</div>
                            </div>
                            <div class="d-flex justify-content-end" style="font-size: 2.00em;" id="fluid">
                                <a href="#" id="modal-edit">
                                    <img class="img-fluid" style="width: 35px; height: 35px;"
                                        src="{{ asset('assets/img/landing-page/edit-pencil.svg') }}">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="flex-grow-1 mb-2">
                                <div class="profile-widget-name"
                                    style="font-weight: bold; font-size: 16px; display: flex; align-items: center;">
                                    {{ $item->institusi }}
                                </div>
                            </div>
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
            @endforeach
        @endif
    </main>
@endsection

@push('customScript')
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
    <script>
        $("#modal-edit").fireModal({
            title: 'Edit Pendidikan',
            footerClass: 'bg-whitesmoke',
            body: `
            <form method="POST" action="{{ route('pendidikan.store') }}" class="needs-validation"
                novalidate="" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label for="gelar">Gelar</label>
                        <select class="form-control custom-input @error('gelar') is-invalid @enderror" name="gelar" id="gelar">
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
                        <input name="institusi" type="text" class="form-control custom-input @error('institusi') is-invalid @enderror"
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
                        <input name="jurusan" type="text" class="form-control custom-input @error('jurusan') is-invalid @enderror"
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
                        <select class="form-control custom-input @error('tahun_mulai') is-invalid @enderror" name="tahun_mulai" id="tahun_mulai">
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
                        <select class="form-control custom-input @error('tahun_berakhir') is-invalid @enderror" name="tahun_berakhir" id="tahun_berakhir">
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
                        <input name="ipk" type="number" step="0.01" class="form-control custom-input @error('ipk') is-invalid @enderror" value="{{ old('ipk') }}">
                        @error('ipk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </form>
            `,
            buttons: [{
                    text: 'Batal',
                    class: 'btn btn-secondary',
                    handler: function(modal) {
                        modal.modal('hide');
                    }
                },
                {
                    text: 'Simpan',
                    class: 'btn btn-primary',
                    handler: function(modal) {
                        $('form', modal).submit();
                    }
                }
            ]
        });
    </script>
@endpush
@push('customStyle')
@endpush
