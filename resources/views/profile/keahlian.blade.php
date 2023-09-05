@extends('landing-page.app')

@section('main')
    <div class="container">
        <form action="{{ route('profile.keahlian.update') }}" method="POST">
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
        </form>

        <h2>Keahlian yang Dipilih:</h2>
        @foreach (auth()->user()->keahlians as $keahlian)
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
    </div>
@endsection
