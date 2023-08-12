@extends('landing-page.app')
@section('main')
    <main class="bg-light">
        <section>
            <div class="col-md-10 bg-white mx-auto my-5 p-5 rounded">
                <h1>Selamat datang di <span class="text-primary">WaktuSaku</span></h1>
                <p>Yuk daftar sekarang! Dapatakan tawaran pekerjaan sesuai minat bakat Anda</p>
            </div>
        </section>

        <section>
            <div class="card-primary col-md-10 bg-white mx-auto my-4 p-5 rounded">
                <h2>Apa itu <span class="text-primary">WaktuSaku </span><span>?</span></h2>
                <div class="d-flex justify-content-around align-items-center">
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{ asset('assets/img/landing-page/image2.png') }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-justify">
                            Platform yang dirancang khusus untuk Mahasiswa Malang Raya yang mencari peluang kerja . Di
                            WaktuSaku, kamu memahami betapa berharga waktu Anda sebagai mahasiswa yang sibuk. Oleh karena
                            itu, kamu menawarkan berbagai peluang pekerjaan yang fleksibel dan relevan dengan
                            minat bakat Anda.
                        </h6>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 my-5 mx-auto">
                        <h2 class="text-center">Mengapa harus di <span class="text-primary">WaktuSaku </span><span>?</span>
                        </h2>
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-md-5">
                        <div class="card d-flex align-items-center" style="height: 100%; border: none;">
                            <div class="row no-gutters">
                                <div class="col-md-5 d-flex justify-content-center align-items-center"
                                    style="padding-top: 50px;">
                                    <i class="fas fa-user-check text-primary fa-3x" style="margin-bottom: 150px;"></i>
                                </div>
                                <div class="col-md-7 bg-primary text-white rounded">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Peluang Pekerjaan yang Sesuai</h5>
                                        <p class="card-text text-justify">
                                            Temukan lowongan kerja yang
                                            relevan dengan minat bakat Anda. Mulai dari perusahaan teknologi,
                                            media kreatif, hingga startup yang sedang berkembang pesat.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card d-flex align-items-center" style="height: 100%; border: none;">
                            <div class="row no-gutters">
                                <div class="col-md-5 d-flex justify-content-center align-items-center"
                                    style="padding-top: 50px;">
                                    <i class="fas fa-file-alt text-primary fa-3x" style="margin-bottom: 150px;"></i>
                                </div>
                                <div class="col-md-7 bg-primary text-white rounded">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Pengalaman Berharga</h5>
                                        <p class="card-text text-justify">
                                            Peluang kerja di WaktuSaku membantu Anda dalam mendapatkan pengalaman
                                            kerja lebih awal. WaktuSaku akan memberikan keuntungan yang
                                            signifikan dalam pasar kerja setelah lulus.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="card d-flex align-items-center" style="height: 100%; border: none;">
                            <div class="row no-gutters">
                                <div class="col-md-5 d-flex justify-content-center align-items-center"
                                    style="padding-top: 50px;">
                                    <i class="fas fa-history text-primary fa-3x" style="margin-bottom: 150px;"></i>
                                </div>
                                <div class="col-md-7 bg-primary text-white rounded">
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Waktu yang Fleksibel</h5>
                                        <p class="card-text text-justify">
                                            Kamu memahami prioritas utama Anda sebagai mahasiswa. Oleh karena itu, Anda
                                            dapat menyesuaikan jadwal kerja Anda dengan jadwal kuliah dan kegiatan lainnya.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card d-flex align-items-center" style="height: 100%; border: none;">
                            <div class="row no-gutters">
                                <div class="col-md-5 d-flex justify-content-center align-items-center"
                                    style="padding-top: 50px;">
                                    <i class="fas fa-percent text-primary fa-3x" style="margin-bottom: 150px;"></i>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body bg-primary text-white rounded">
                                        <h5 class="card-title font-weight-bold">Mendapatkan gaji bonus</h5>
                                        <p class="card-text text-justify">
                                            Selain mendapatkan peluang pekerjaan yang sesuai, Anda mendapatkan gaji bonus
                                            dari masing - masing perusahaan yang Anda minati jika Anda pekerja aktif.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    {{-- @foreach ($allResults as $key => $loker)
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
                    @endforeach --}}
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
