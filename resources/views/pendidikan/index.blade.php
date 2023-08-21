@extends('landing-page.app')
@section('main')
    <main class="bg-secondary">
        <section>
            <div class="container" style="margin-top: 5%; margin-bottom: 5%">
                <div class="col-md-9 mx-auto">
                    <div class="card border-primary mb-2">
                        <div class="card-body">
                            <div class="text-left mb-4 mt-2 ml-2">
                                <h5 class="card-title font-weight-bold d-block mx-2" style="color:#6777EF;">Pendidikan</h5>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('profile.user.update') }}" class="needs-validation"
                                    novalidate="" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label for="gelar">Gelar</label>
                                            <select
                                                class="form-control select2 custom-input @error('gelar') is-invalid @enderror"
                                                name="gelar" id="gelar">
                                                <option value="">Pilih Gelar</option>
                                                <option value="sma"
                                                    {{ Auth::user()->pendidikan && Auth::user()->pendidikan->gelar === 'sma' ? 'selected' : '' }}>
                                                    SMA/SMK</option>
                                                <option value="D3"
                                                    {{ Auth::user()->pendidikan && Auth::user()->pendidikan->gelar === 'D3' ? 'selected' : '' }}>
                                                    Diploma III</option>
                                                <option value="D4"
                                                    {{ Auth::user()->pendidikan && Auth::user()->pendidikan->gelar === 'D4' ? 'selected' : '' }}>
                                                    Diploma IV</option>
                                                <option value="S1"
                                                    {{ Auth::user()->pendidikan && Auth::user()->pendidikan->gelar === 'S1' ? 'selected' : '' }}>
                                                    Sarjana</option>
                                                <option value="S2"
                                                    {{ Auth::user()->pendidikan && Auth::user()->pendidikan->gelar === 'S2' ? 'selected' : '' }}>
                                                    Magister</option>
                                                @error('gelar')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label>Nama Institusi</label>
                                            <input name="institusi" type="text"
                                                class="form-control custom-input @error('institusi') is-invalid @enderror"
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->institusi : '' }}">
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
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->jurusan : '' }}">
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
                                            <input name="jurusan" type="text"
                                                class="form-control custom-input @error('jurusan') is-invalid @enderror"
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->jurusan : '' }}">
                                            @error('jurusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">

                                            <label>Periode Waktu</label>
                                        <div class="row">
                                        <div class="form-group col-md-2">

                                            <input name="institusi" type="text"
                                                class="form-control custom-input @error('institusi') is-invalid @enderror"
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->institusi : '' }}">
                                            @error('institusi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input name="institusi" type="text"
                                                class="form-control custom-input @error('institusi') is-invalid @enderror"
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->institusi : '' }}">
                                            @error('institusi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="form-group col-md-3 ml-5">
                                            <label>IPK (Opsional)</label>
                                            <input name="jurusan" type="text"
                                                class="form-control custom-input @error('jurusan') is-invalid @enderror"
                                                value="{{ Auth::user()->pendidikan ? Auth::user()->pendidikan->jurusan : '' }}">
                                            @error('jurusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3 col-12 text-right">
                                            <button class="btn btn-primary custom-input" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('customScript')
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
    <script>
        $("#modal-create").fireModal({
            title: 'Tambah User',
            footerClass: 'bg-whitesmoke',
            body: `
             <form method="post" action="add_user.php">
                 <div class="form-group">
                     <label for="nama_kecamatan">Nama Kecamatan</label>
                     <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan"
                         placeholder="Masukkan Kecamatan" required />
                 </div>


                 <input type="hidden" name="type" value="0" />
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
