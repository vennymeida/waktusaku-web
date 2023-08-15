@extends('landing-page.app')
@section('main')
    <main class="bg-light">
        <section>
            <div class="col-md-12 py-5">
                <div class="d-flex justify-content-around align-items-center">
                    <div class="col-md-6">
                        <h1>Temukan Peluang Kerja di <span class="text-primary">Waktu</span><span
                                class="text-warning">Saku</span>
                            Sesuai Minat Bakat Anda!</h1>
                        <p>Platform yang dirancang untuk memudahkan mencari peluang kerja yang sesuai dengan kebutuhan Anda
                            khusus di daerah Malang Raya.</p>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Ketik posisi pekerjaan..." value="{{ app('request')->input('nama') }}"
                                    style="border-radius: 25px;">
                            </div>
                            <div class="form-group col-md-2">
                                <button id="search-button" class="btn btn-primary mr-1 px-4" type="submit"
                                    style="border-radius: 25px;">Cari</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{ asset('assets/img/landing-page/image-1.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="bg-secondary py-5" style="height: 100%;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <h2 class="text-center mt-4">Mengapa harus di <span class="text-white">WaktuSaku </span><span
                                    class="text-warning">Saku </span><span>?</span>
                            </h2>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-md-3">
                            <div class="card border-primary mb-2">
                                <div class="card-body text-center">
                                    <i class="fas fa-user-check text-primary fa-3x mb-4"></i>
                                    <h5 class="card-title font-weight-bold d-block mx-2">Peluang Pekerjaan Sesuai</h5>
                                    <p class="card-text text-center">
                                        Temukan lowongan kerja yang relevan dengan minat bakat Anda. Mulai dari perusahaan
                                        teknologi,
                                        media kreatif, hingga startup yang sedang berkembang pesat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-primary mb-2">
                                <div class="card-body text-center">
                                    <i class="fas fa-file-alt text-primary fa-3x mb-4"></i>
                                    <h5 class="card-title font-weight-bold d-block mx-2">Pengalaman Berharga</h5>
                                    <p class="card-text text-center">
                                        Peluang kerja di WaktuSaku membantu Anda dalam mendapatkan pengalaman
                                        kerja lebih awal. WaktuSaku akan memberikan keuntungan yang
                                        signifikan dalam pasar kerja setelah lulus.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-primary mb-2">
                                <div class="card-body text-center">
                                    <i class="fas fa-history text-primary fa-3x mb-4"></i>
                                    <h5 class="card-title font-weight-bold d-block mx-2">Waktu yang Fleksibel</h5>
                                    <p class="card-text text-center">
                                        Kamu memahami prioritas utama Anda sebagai mahasiswa. Oleh karena itu, Anda
                                        dapat menyesuaikan jadwal kerja Anda dengan jadwal kuliah dan kegiatan lainnya.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-primary mb-2">
                                <div class="card-body text-center">
                                    <i class="fas fa-percent text-primary fa-3x mb-4"></i>
                                    <h5 class="card-title font-weight-bold d-block mx-2">Mendapatkan Gaji Bonus</h5>
                                    <p class="card-text text-center">
                                        Selain mendapatkan peluang pekerjaan yang sesuai, Anda mendapatkan gaji bonus
                                        dari masing-masing perusahaan yang Anda minati jika Anda pekerja aktif.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="col-md-12 py-5">
                <div class="d-flex justify-content-around align-items-center">
                    <div class="col-md-4">
                        <img class="img-fluid" src="{{ asset('assets/img/landing-page/image-2.svg') }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <h1>Mau Tahu Status Lamaran Kamu Saat Ini Bagaimana ? <span class="text-primary">Bisa!</span></h1>
                        <p>Lacak status terbaru lamaran kerjamu kapan saja.</p>
                        <p>Yuk Buat Akun Sekarang juga!</p>
                        <a id="register-button" class="btn btn-primary px-4" href="{{ route('register') }}"
                            style="border-radius: 25px;">Buat Akun
                            Sekarang</a>
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
                            <div class="card">
                                <div class="card-body d-flex flex-column">
                                    <div class="position-relative">
                                        <div class="gradient-overlay"></div>
                                        <img class="img-fluid mb-3 fixed-height-image position-absolute top-0 start-50 translate-middle-x"
                                            src="{{ asset('storage/' . $loker->logo) }}" alt="Company Logo">
                                        <p class="text-white card-title font-weight-bold mb-0 ml-2 overlap-text"
                                            style="font-size: 20px;">
                                            {{ $loker->judul }}
                                        </p>
                                        <p class="text-white mb-4 ml-2 overlap-text-2" style="font-size: 14px;">
                                            {{ $loker->nama }}
                                        </p>
                                    </div>
                                    <div class="card-text">
                                        <ul class="list-unstyled ml-2">
                                            {{-- <div class="float-right fas fa-bookmark"></div> --}}
                                            <li class="mb-2"><img class="img-fluid"
                                                    src="{{ asset('assets/img/landing-page/Office Building.svg') }}">
                                                {{ $loker->kategori }}
                                            </li>
                                            <li class="mb-2"><img class="img-fluid"
                                                    src="{{ asset('assets/img/landing-page/money.svg') }}">
                                                {{ 'Rp ' . number_format($loker->gaji_bawah, 0, ',', '.') }}
                                                <span>-</span>
                                                {{ 'Rp ' . number_format($loker->gaji_atas, 0, ',', '.') }}
                                            </li>
                                            <li class="mb-2"><img class="img-fluid"
                                                    src="{{ asset('assets/img/landing-page/job.svg') }}">
                                                {{ $loker->min_pengalaman }}
                                            </li>
                                            <li class="mb-2"><img class="img-fluid"
                                                    src="{{ asset('assets/img/landing-page/Graduation Cap.svg') }}">
                                                Minimal {{ $loker->min_pendidikan }}
                                            </li>
                                            <li class="mb-4"><img class="img-fluid"
                                                    src="{{ asset('assets/img/landing-page/location pin.svg') }}">
                                                {{ $loker->lokasi }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-center mb-3">
                                        <a id="detail-button" class="btn btn-primary px-4 py-2"
                                            style="border-radius: 25px;" href="#">Lihat Detail</a>
                                    </div>
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
