@extends('landing-page.app')

@section('main')
    <div class="container">
        {{-- <form action="{{ route('profile.keahlian.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Pilih Keahlian:</label>
                <select name="keahlian_ids[]" multiple class="form-control">
                    @foreach ($keahlians as $keahlian)
                        <option value="{{ $keahlian->id }}" {{ in_array($keahlian->id, $selectedKeahlians) ? 'selected' : '' }}>
                            {{ $keahlian->keahlian }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form> --}}

        {{-- <h2>Keahlian yang Dipilih:</h2> --}}
        {{-- @foreach (auth()->user()->keahlians as $keahlian)
            <div>
                {{ $keahlian->keahlian }}
                <form action="{{ route('profile.keahlian.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="keahlian_id" value="{{ $keahlian->id }}">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        @endforeach
    </div> --}}
{{-- @endsection --}}
    <main class="bg-light">
        <section>
            <div class="col-md-11 mx-auto mt-4">
                <div class="col md-10 bg-white mx-auto py-4" style="border-radius: 15px;">
                    <div class="col-md-11 mx-auto mt-4">
                        <h6 class="font-weight-bolder">Tambah Keahlian Yang Kamu Miliki</h6>
                    </div>
                    <form action="{{ route('profile.keahlian.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="col-md-10 mx-auto mt-4">
                            <div class="form-group">
                                <label>Keahlian</label>
                                <select name="keahlian_ids[]" multiple class="form-control select2">
                                    <option value="" disabled selected>Pilih Keahlian</option>
                                    @foreach ($keahlians as $keahlian)
                                        <option value="{{ $keahlian->id }}"
                                            {{ in_array($keahlian->id, $selectedKeahlians) ? 'selected' : '' }}>
                                            {{ $keahlian->keahlian }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-11 text-right my-4">
                            <button class="btn btn-primary mr-1 px-4" style="border-radius: 15px;">Simpan</button>
                            <a class="btn btn-secondary px-4" href="{{ url('/profile') }}" style="border-radius: 15px;">
                                Batal
                            </a>
                        </div>
                    </form>
                    <hr class="my-4">
                    <div class="col-md-11 mx-auto">
                        <h6 class="font-weight-bolder">List Data Keahlian</h6>
                    </div>
                    <div class="col-md-11 mx-auto">
                        @foreach (auth()->user()->keahlians as $keahlian)
                            <button class="px-4 mt-2 mr-1 btn btn-skill">{{ $keahlian->keahlian }}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

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
