@extends('landing-page.app')
@section('main')
    <main class="bg-light">
        <section>
            <div class="col-md-12">
                <div class="d-flex justify-content-around align-items-center">
                    <div class="col-md-6">
                        <h1>Temukan Peluang Kerja di <span class="text-primary">Waktu</span><span class="text-warning">Saku</span>
                        Sesuai Minat Bakat Anda!</h1>
                        <p>Platform yang dirancang untuk memudahkan mencari peluang kerja yang sesuai dengan kebutuhan Anda khusus di daerah Malang Raya.</p>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Ketik Posisi Pekerjaan" value="{{ app('request')->input('nama') }}">
                            </div>
                            <div class="form-group col-md-2">
                                <button id="search-button" class="btn btn-primary mr-1" type="submit">Cari</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{ asset('assets/img/landing-page/image-3.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="bg-secondary my-5 mx-auto" style="height: 100%;">
                <div class="row">
                    <div class="col-md-10 my-5 mx-auto">
                        <h2 class="text-center">Mengapa harus di <span class="text-white">WaktuSaku </span><span class="text-warning">Saku </span><span>?</span>
                        </h2>
                    </div>
                </div>
                <div class="row col-md-12 my-5 mx-auto">
                    <div class="col-md-3">
                        <div class="card" style="border: none;">
                            <div class="card-body">
                                <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 50px; margin-top:50px">
                                    <i class="fas fa-user-check text-primary fa-3x"></i>
                                </div>
                                <p class="card-title text-center font-weight-bold h5">Peluang Pekerjaan Sesuai</p>
                                <p class="card-text text-justify">
                                    Temukan lowongan kerja yang relevan dengan minat bakat Anda. Mulai dari perusahaan teknologi,
                                    media kreatif, hingga startup yang sedang berkembang pesat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="border: none;">
                            <div class="card-body">
                                <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 50px; margin-top:50px">
                                    <i class="fas fa-file-alt text-primary fa-3x"></i>
                                </div>
                                <p class="card-title text-center font-weight-bold h5">Pengalaman Berharga</p>
                                <p class="card-text text-justify">
                                    Peluang kerja di WaktuSaku membantu Anda dalam mendapatkan pengalaman
                                    kerja lebih awal. WaktuSaku akan memberikan keuntungan yang
                                    signifikan dalam pasar kerja setelah lulus.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="border: none;">
                            <div class="card-body">
                                <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 50px; margin-top:50px">
                                    <i class="fas fa-history text-primary fa-3x"></i>
                                </div>
                                <p class="card-title text-center font-weight-bold h5">Waktu yang Fleksibel</p>
                                <p class="card-text text-justify">
                                    Kamu memahami prioritas utama Anda sebagai mahasiswa. Oleh karena itu, Anda
                                    dapat menyesuaikan jadwal kerja Anda dengan jadwal kuliah dan kegiatan lainnya.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="border: none;">
                            <div class="card-body">
                                <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 50px; margin-top:50px">
                                    <i class="fas fa-percent text-primary fa-3x"></i>
                                </div>
                                <p class="card-title text-center font-weight-bold h5">Mendapatkan gaji bonus</p>
                                <p class="card-text text-justify">
                                    Selain mendapatkan peluang pekerjaan yang sesuai, Anda mendapatkan gaji bonus
                                    dari masing - masing perusahaan yang Anda minati jika Anda pekerja aktif.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="col-md-12">
                <div class="d-flex justify-content-around align-items-center">
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{ asset('assets/img/landing-page/image-4.png') }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <h1>Mau Tahu Status Lamaran Kamu Saat Ini Bagaimana ? <span class="text-primary">Bisa!</span></h1>
                        <p>Lacak status terbaru lamaran kerjamu kapan saja.</p>
                        <p>Yuk Buat Akun Sekarang juga!</p>
                        <a id="register-button" class="btn btn-primary" href="{{ route('register') }}">Buat Akun Sekarang</a>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="col-md-10 mt-5 mx-auto">
                <h2 class="text-center">Lowongan Kerja Terbaru di <span class="text-primary">WaktuSaku</span></h2>
                <div class="row flex-nowrap overflow-auto mt-5 horizontal-scroll equal-height-cards">
                    <div class="scroll-arrow left bg-transparent text-secondary">
                        <i class="fas fa-angle-left"></i>
                    </div>
                    @foreach ($allResults as $key => $loker)
                        <div class="col-md-4">
                            <div class="card" style="border: none;">
                                <div class="card-body">
                                    <img class="img-fluid mb-3 fixed-height-image"
                                        src="{{ asset('storage/' . $loker->logo) }}" alt="">
                                    <p class="card-title text-center font-weight-bold h5">{{ $loker->judul }}</p>
                                    <p class="card-text text-justify">
                                        {{ $loker->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="scroll-arrow right bg-transparent text-secondary">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        const scrollableContent = document.querySelector('.horizontal-scroll');
        const scrollLeftArrow = document.querySelector('.scroll-arrow.left');
        const scrollRightArrow = document.querySelector('.scroll-arrow.right');

        scrollLeftArrow.addEventListener('click', () => {
            scrollableContent.scrollLeft -= 360;
        });

        scrollRightArrow.addEventListener('click', () => {
            scrollableContent.scrollLeft += 360;
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll(".card-text");
            let maxHeight = 0;

            cards.forEach(card => {
                const cardHeight = card.clientHeight;
                if (cardHeight > maxHeight) {
                    maxHeight = cardHeight;
                }
            });

            cards.forEach(card => {
                card.style.height = maxHeight + "px";
            });
        });
    </script>
@endsection
