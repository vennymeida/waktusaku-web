@extends('landing-page.app2')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <div class="card" style="border-radius: 15px;">
                <div class="card-header">
                    <h4>Daftar Lowongan Pekerjaan</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Ketik Posisi Pekerjaan" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Lokasi" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                </div>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Kategori" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <button id="search-button" class="btn btn-primary mr-1" type="submit">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <article class="article" style="border-radius: 3%;  overflow: hidden;">
                        <div class="article-header">
                            <div class="" data-background="">
                                <img src="{{ asset('assets/img/news/img08.jpg') }}" class="article-image" alt=""
                                    srcset="">
                            </div>
                            <div class="article-title">
                                <h2><a href="#">Judul Lowongan</a>
                                </h2>
                                <h4><a href="#">Nama Perusahaan</a>
                                </h4>
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="fa fa-bookmark d-flex justify-content-end" style="font-size: 2.00em;" id="bookmark"
                                onclick="Klikme()">
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-city"></i>
                                    <a class="pl-2">Kategori Pekerjaan</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-dollar-sign"></i>
                                    <a class="pl-3">Range Gaji</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-briefcase"></i>
                                    <a class="pl-2">Pengalaman Kerja</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-graduation-cap"></i>
                                    <a class="pl-2">Lulusan Minimal</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <a class="pl-3">Lokasi Kantor</a>
                                </div>
                            </div>
                            <div class="article-cta mt-2">
                                <a href="#" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <article class="article" style="border-radius: 3%;  overflow: hidden;">
                        <div class="article-header">
                            <div class="" data-background="">
                                <img src="{{ asset('assets/img/news/img08.jpg') }}" class="article-image" alt=""
                                    srcset="">
                            </div>
                            <div class="article-title">
                                <h2><a href="#">Judul Lowongan</a>
                                </h2>
                                <h4><a href="#">Nama Perusahaan</a>
                                </h4>
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="fa fa-bookmark d-flex justify-content-end" style="font-size: 2.00em;" id="bookmark"
                                onclick="Klikme()">
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-city"></i>
                                    <a class="pl-2">Kategori Pekerjaan</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-dollar-sign"></i>
                                    <a class="pl-3">Range Gaji</a>
                                </div>
                            </div>
                            <div class="details-item">

                                <div class="icon-details">
                                    <i class="fas fa-briefcase"></i>
                                    <a class="pl-2">Pengalaman Kerja</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-graduation-cap"></i>
                                    <a class="pl-2">Lulusan Minimal</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <a class="pl-3">Lokasi Kantor</a>
                                </div>
                            </div>
                            <div class="article-cta mt-2">
                                <a href="#" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <article class="article" style="border-radius: 3%;  overflow: hidden;">
                        <div class="article-header">
                            <div class="" data-background="">
                                <img src="{{ asset('assets/img/news/img08.jpg') }}" class="article-image" alt=""
                                    srcset="">
                            </div>
                            <div class="article-title">
                                <h2><a href="#">Judul Lowongan</a>
                                </h2>
                                <h4><a href="#">Nama Perusahaan</a>
                                </h4>
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="fa fa-bookmark d-flex justify-content-end" style="font-size: 2.00em;" id="bookmark"
                                onclick="Klikme()">
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-city"></i>
                                    <a class="pl-2">Kategori Pekerjaan</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-dollar-sign"></i>
                                    <a class="pl-3">Range Gaji</a>
                                </div>
                            </div>
                            <div class="details-item">

                                <div class="icon-details">
                                    <i class="fas fa-briefcase"></i>
                                    <a class="pl-2">Pengalaman Kerja</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-graduation-cap"></i>
                                    <a class="pl-2">Lulusan Minimal</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <a class="pl-3">Lokasi Kantor</a>
                                </div>
                            </div>
                            <div class="article-cta mt-2">
                                <a href="#" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <article class="article" style="border-radius: 3%;  overflow: hidden;">
                        <div class="article-header">
                            <div class="" data-background="">
                                <img src="{{ asset('assets/img/news/img08.jpg') }}" class="article-image" alt=""
                                    srcset="">
                            </div>
                            <div class="article-title">
                                <h2><a href="#">Judul Lowongan</a>
                                </h2>
                                <h4><a href="#">Nama Perusahaan</a>
                                </h4>
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="fa fa-bookmark d-flex justify-content-end" style="font-size: 2.00em;" id="bookmark"
                                onclick="Klikme()">
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-city"></i>
                                    <a class="pl-2">Kategori Pekerjaan</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-dollar-sign"></i>
                                    <a class="pl-3">Range Gaji</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-briefcase"></i>
                                    <a class="pl-2">Pengalaman Kerja</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-graduation-cap"></i>
                                    <a class="pl-2">Lulusan Minimal</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <a class="pl-3">Lokasi Kantor</a>
                                </div>
                            </div>
                            <div class="article-cta mt-2">
                                <a href="#" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <article class="article" style="border-radius: 3%;  overflow: hidden;">
                        <div class="article-header">
                            <div class="" data-background="">
                                <img src="{{ asset('assets/img/news/img08.jpg') }}" class="article-image" alt=""
                                    srcset="">
                            </div>
                            <div class="article-title">
                                <h2><a href="#">Judul Lowongan</a>
                                </h2>
                                <h4><a href="#">Nama Perusahaan</a>
                                </h4>
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="fa fa-bookmark d-flex justify-content-end" style="font-size: 2.00em;" id="bookmark"
                                onclick="Klikme()">
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-city"></i>
                                    <a class="pl-2">Kategori Pekerjaan</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-dollar-sign"></i>
                                    <a class="pl-3">Range Gaji</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-briefcase"></i>
                                    <a class="pl-2">Pengalaman Kerja</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-graduation-cap"></i>
                                    <a class="pl-2">Lulusan Minimal</a>
                                </div>
                            </div>
                            <div class="details-item">
                                <div class="icon-details">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <a class="pl-3">Lokasi Kantor</a>
                                </div>
                            </div>
                            <div class="article-cta mt-2">
                                <a href="#" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('customScript')
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>
    <script>
        function Klikme() {
            document.getElementById('bookmark').style.color = "#6777ef";
        }
    </script>
@endpush

@push('customStyle')
@endpush
