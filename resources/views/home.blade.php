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
                                    {{ App\Models\LowonganPekerjaan::where('status', 'dibuka')->count() }}
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
                                    {{ App\Models\lamar::count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-header">
                                <h4>Perusahaan dengan Pelamar Terbanyak</h4>
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
                            @foreach($dashboard as $lamar)
                                <li class="media">
                                    @if ($lamar->foto)
                                        <img src="{{ asset('storage/' . $lamar->foto) }}" alt="Foto" class="mr-3 rounded-circle" style="width: 50px; height: 50px;">
                                    @else
                                        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                        class="mr-3 rounded-circle" style="width: 50px; height: 50px;">
                                    @endif
                                    <div class="media-body">
                                        <div class="media-title">{{ $lamar->name }}</div>
                                        <span class="text-small text-muted">{{ $lamar->perusahaan }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/chart.min.js')}}"></script>
<script src="{{asset('assets/js/grafik.js')}}"></script>

@endpush
