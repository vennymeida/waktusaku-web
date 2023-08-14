@extends('landing-page.app2')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-body">
            <div class="card">
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
                    <article class="article">
                        <div class="article-header">
                            <div class="article-image" data-background="{{asset('assets/img/news/img08.jpg')}}">
                            </div>
                            <div class="article-title">
                                <h2><a href="#">Judul Lowongan</a>
                                </h2>
                                <h4><a href="#">Nama Perusahaan</a>
                                </h4>
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="details-item">
                                <div class="icon-details"><i class="fas fa-city"></i></div>
                                <a>Kategori Pekerjaan</a>
                            </div>
                            <div class="details-item">
                                <div class="icon-details"><i class="fas fa-dollar-sign"></i></div>
                                <a>Range Gaji</a>
                            </div>
                            <div class="details-item">
                                <div class="icon-details"><i class="fas fa-briefcase"></i></div>
                                <a>Pengalaman Kerja</a>
                            </div>
                            <div class="details-item">
                                <div class="icon-details"><i class="fas fa-graduation-cap"></i></div>
                                <a>Lulusan Minimal</a>
                            </div>
                            <div class="details-item">
                                <div class="icon-details"><i class="fas fa-map-marker-alt"></i></div>
                                <a>Lokasi Kantor</a>
                            </div>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <div class="article-cta">
                                <a href="#" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <article class="article">
                        <div class="article-header">
                            <div class="article-image" data-background="assets/img/news/img04.jpg">
                            </div>
                            <div class="article-title">
                                <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a>
                                </h2>
                            </div>
                        </div>
                        <div class="article-details">
                            <table class="custom-table">
                                <tr>
                                    <td class="small-cell"><i class="fas fa-city"></i></td>
                                    <td class="large-cell">Kategori Pekerjaan</td>
                                </tr>
                                <tr>
                                    <td>Baris 2, Kolom 1</td>
                                    <td>Baris 2, Kolom 2</td>
                                </tr>
                                <tr>
                                    <td>Baris 3, Kolom 1</td>
                                    <td>Baris 3, Kolom 2</td>
                                </tr>
                            </table>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. </p>
                            <div class="article-cta">
                                <a href="#" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <article class="article">
                        <div class="article-header">
                            <div class="article-image" data-background="assets/img/news/img09.jpg">
                            </div>
                            <div class="article-title">
                                <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a>
                                </h2>
                            </div>
                        </div>
                        <div class="article-details">
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. </p>
                            <div class="article-cta">
                                <a href="#" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <article class="article">
                        <div class="article-header">
                            <div class="article-image" data-background="assets/img/news/img12.jpg">
                            </div>
                            <div class="article-title">
                                <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a>
                                </h2>
                            </div>
                        </div>
                        <div class="article-details">
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. </p>
                            <div class="article-cta">
                                <a href="#" class="btn btn-primary">Read More</a>
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
@endpush

@push('customStyle')

@endpush
