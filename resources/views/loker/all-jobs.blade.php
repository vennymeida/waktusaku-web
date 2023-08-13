@extends('landing-page.app')

@section('main')
    <main class="bg-light">
        <section>
            <div class="bg-secondary py-5" style="height: 100%;">
                <div class="container">
                    <div class="row my-5">
                        <div class="col-md-12 mx-auto">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h4 class="card-title font-weight-bold">Daftar Lowongan Pekerjaan</h4>
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
                                                        <input type="text" name="name" class="form-control"
                                                            id="name" placeholder="Ketik Posisi Pekerjaan"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" name="name" class="form-control"
                                                            id="name" placeholder="Lokasi" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-briefcase"></i>
                                                            </div>
                                                        </div>
                                                        <input type="text" name="name" class="form-control"
                                                            id="name" placeholder="Kategori" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button id="search-button" class="btn btn-primary mr-1"
                                                        type="submit">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                    <article class="article">
                                        <div class="article-header">
                                            <div class="article-image" data-background="assets/img/news/img08.jpg">
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
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
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
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                cillum dolore eu fugiat nulla pariatur. </p>
                                            <div class="article-cta">
                                                <a href="#" class="btn btn-primary">Read More</a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
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
                                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
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
                    </div>
                </div>
        </section>
    </main>
@endsection
