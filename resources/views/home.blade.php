@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <h1>Selamat Datang</h1>
                </div>
                <div class="col-md-12">
                    <h6>Sedang Melakukan Apa Hari ini ?</h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="main-content">
                <section class="section">
                  <div class="row justify-content-center">
                    <div class="col-md-4">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                          <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Pencari Kerja</h4>
                          </div>
                          <div class="card-body">
                                {{
                                    App\Models\ProfileUser::whereNotNull('resume')->count()
                                }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                          <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Perusahaan</h4>
                          </div>
                          <div class="card-body">
                            {{
                                App\Models\Perusahaan::count()
                            }}
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="row justify-content-center">
                    <div class="col-md-4">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Lowongan Pekerjaan</h4>
                          </div>
                          <div class="card-body">
                            {{
                                App\Models\LowonganPekerjaan::count()
                            }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                          <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Lamaran</h4>
                          </div>
                          <div class="card-body">
                            {{-- {{
                                App\Models\Daftar::count()
                            }} --}}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
        </div>
        <div class="section-body">

        </div>
    </section>
@endsection
