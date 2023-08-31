@extends('landing-page.app')
@section('main')
    <main class="bg-light">
        <section>
            <div class="col-md-12 my-5">
                <div class="col-md-6 mx-auto text-center my-5">
                    <h1 class="font-weight-bold">Kontak <span class="text-primary">Kami</span></h1>
                    <p>Silahkan tinggalkan pesan Anda, pada kolom yang tersedia.</p>
                </div>
                <div class="col-md-10 my-5 mx-auto bg-white p-5 card-contact">
                    <div class="row">
                        <div class="col-md-5">
                            <form>
                                <div class="form-group">
                                    <label for="name" class="label-title">Nama</label>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Masukkan nama lengkap Anda" style="border-radius: 15px;">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="label-title">Email</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Masukkan alamat email Anda" style="border-radius: 15px;">
                                </div>
                                <div class="form-group">
                                    <label for="message" class="label-title">Pesan</label>
                                    <textarea class="form-control form-message" id="message" rows="4" placeholder="Pesan yang ingin disampaikan..."></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 mx-auto">
                            <img class="img-fluid my-3" src="{{ asset('assets/img/landing-page/contact.svg') }}">
                        </div>
                    </div>
                    <div class="col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary px-5" style="border-radius: 15px;">Kirim</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
