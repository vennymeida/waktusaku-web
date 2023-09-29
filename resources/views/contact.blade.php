@extends('landing-page.app')
@section('title', 'WaktuSaku - Contact Us')
@section('main')
    <main class="bg-light">
        <section>
            <div class="col-md-12 my-5">
                <div class="col-md-6 mx-auto text-center my-5">
                    <h1 class="font-weight-bold">Kontak <span class="text-primary">Kami</span></h1>
                    <p>Silahkan tinggalkan pesan Anda, pada kolom yang tersedia.</p>
                </div>
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="col-md-10 my-5 mx-auto bg-white p-5 card-contact">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="name" class="label-title">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" placeholder="Masukkan nama lengkap Anda"
                                        style="border-radius: 15px;" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="label-title">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Masukkan alamat email Anda"
                                        style="border-radius: 15px;" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message" class="label-title">Pesan</label>
                                    <textarea class="form-control form-message @error('pesan') is-invalid @enderror" id="pesan" name="pesan"
                                        rows="4" placeholder="Pesan yang ingin disampaikan...">{{ old('pesan') }}</textarea>
                                    @error('pesan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5 mx-auto img-contact">
                                <img class="img-fluid my-3" src="{{ asset('assets/img/landing-page/contact.svg') }}">
                            </div>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary px-5" style="border-radius: 15px;">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script>
        @if (session('success') === 'success')
            Swal.fire({
                icon: 'success',
                title: 'Pesan berhasil dikirim!',
                text: 'Terima kasih atas pesan yang Anda kirim.',
                confirmButtonText: 'OK'
            });
        @endif
    </script>
@endsection

@push('customScript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
@endpush
