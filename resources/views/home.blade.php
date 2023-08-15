@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header" style="border-radius: 15px;">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <h1>Selamat Datang</h1>
                </div>
                <div class="col-md-12">
                    <h6>Sedang Melakukan Apa Hari ini ?</h6>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-statistic-1" style="border-radius: 15px;">
                            <div class="card-icon bg-primary" style="border-radius: 50%;">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Pencari Kerja</h4>
                                </div>
                                <div class="card-body">
                                    {{ App\Models\ProfileUser::whereNotNull('resume')->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-statistic-1" style="border-radius: 15px;">
                            <div class="card-icon bg-success" style="border-radius: 50%;">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Perusahaan</h4>
                                </div>
                                <div class="card-body">
                                    {{ App\Models\Perusahaan::count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-statistic-1" style="border-radius: 15px;">
                            <div class="card-icon bg-warning" style="border-radius: 50%;">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Lowongan Pekerjaan</h4>
                                </div>
                                <div class="card-body">
                                    {{ App\Models\LowonganPekerjaan::count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-statistic-1" style="border-radius: 15px;">
                            <div class="card-icon bg-danger" style="border-radius: 50%;">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Lamaran</h4>
                                </div>
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-header">
                                <h4>Budget vs Sales</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" height="158"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-header">
                        <h4>Pelamar Kerja Terbaru</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="media-title">Venny Meida</div>
                                    <span class="text-small text-muted">PT Hummasoft Technology</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="media-title">Venny Meida</div>
                                    <span class="text-small text-muted">PT Hummasoft Technology</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="media-title">Venny Meida</div>
                                    <span class="text-small text-muted">PT Hummasoft Technology</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
