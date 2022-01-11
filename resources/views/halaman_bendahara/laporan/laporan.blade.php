@extends('template.admin')

@section('content')

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Dashboard</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                    {{-- <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                January 2018
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Export List</a>
                                <a class="dropdown-item" href="#">Policies</a>
                                <a class="dropdown-item" href="#">View Assets</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="row clearfix progress-box">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <a href="{{ route('laporan_keungan_bulanan') }}">
                                <img src="{{ asset('gambar/icon1.gif') }}" alt="">
                                <h5 class="text-blue padding-top-10 h5">LAPORAN KEUANGAN BULANAN SMK CENDANA PADANG PANJANG
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <a href="{{ route('laporan_keungan_tahunan') }}">
                                <img src="{{ asset('gambar/icon1.gif') }}" alt="">
                                <h5 class="text-blue padding-top-10 h5">LAPORAN KEUANGAN TAHUNAN SMK CENDANA PADANG PANJANG
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <a href="{{ route('laporan_keuangan_mahasiswa') }}">
                                <img src="{{ asset('gambar/icon2.gif') }}" alt="">
                                <h5 class="text-blue padding-top-10 h5">LAPORAN KEUANGAN SISWA SMK CENDANA PADANG PANJANG
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <a href="{{ route('laporan_gaji_bulan') }}">
                                <img src="{{ asset('gambar/icon3.gif') }}" alt="">
                                <h5 class="text-blue padding-top-10 h5">LAPORAN GAJI GURU BULANAN
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <a href="{{ route('laporan_gaji_tahunan') }}">
                                <img src="{{ asset('gambar/icon3.gif') }}" alt="">
                                <h5 class="text-blue padding-top-10 h5">LAPORAN GAJI GURU TAHUNAN
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <a href="{{ route('slip_ganji') }}">
                                <img src="{{ asset('gambar/icon3.gif') }}" alt="">
                                <h5 class="text-blue padding-top-10 h5">LAPORAN SLIP GAJI
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial2" value="70" data-width="120" data-height="120"
                                data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#00e091"
                                data-angleOffset="180" readonly
                            <h5 class="text-light-green padding-top-10 h5">Business Captured</h5>
                            <span class="d-block">75% Average <i
                                    class="fa text-light-green fa-line-chart"></i></span>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial3" value="90" data-width="120" data-height="120"
                                data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#f56767"
                                data-angleOffset="180" readonly>
                            <h5 class="text-light-orange padding-top-10 h5">Projects Speed</h5>
                            <span class="d-block">90% Average <i
                                    class="fa text-light-orange fa-line-chart"></i></span>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
                    <div class="card-box pd-30 height-100-p">
                        <div class="progress-box text-center">
                            <input type="text" class="knob dial4" value="65" data-width="120" data-height="120"
                                data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#a683eb"
                                data-angleOffset="180" readonly>
                            <h5 class="text-light-purple padding-top-10 h5">Panding Orders</h5>
                            <span class="d-block">65% Average <i
                                    class="fa text-light-purple fa-line-chart"></i></span>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
