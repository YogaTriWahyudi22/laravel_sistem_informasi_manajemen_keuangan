@extends('template.admin')

@section('content')

    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="{{ asset('vendors/images/banner-img.png') }}" alt="">
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            Welcome back <div class="weight-600 font-30 text-blue">{{ Auth::user()->nama }}</div>
                        </h4>
                        {{-- <p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
                            hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure
                            fugiat, veniam non quaerat mollitia animi error corporis.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div class="text-center"
                                    style="background-color: #045de9;
                                                                                                        background-image: linear-gradient(315deg, #045de9 0%, #09c6f9 74%);">
                                    <h1> <i class="micon icon-copy fa fa-money" aria-hidden="true"></i> </h1>
                                </div>
                            </div>

                            <div class="widget-data">
                                <div class="h4 mb-0">SALDO AWAL</div>
                                <div class="weight-600 font-14">
                                    @php
                                        $tgl_kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
                                        $laporan = DB::table('laporan')
                                            ->where('tanggal', $tgl_kemarin)
                                            ->first();
                                    @endphp
                                    Rp.@if (isset($laporan))

                                        {{ number_format($laporan->saldo_awal) }} @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div class="text-center" style="background-color: #f7b42c;
                                                                                                        background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%);
                                                                                                         ">
                                    <h1><span class="micon icon-copy fa fa-level-down"></h1></span>
                                </div>
                            </div>
                            @php
                                $tgl_sekarang = date('Y-m-d');
                                $laporan1 = DB::table('laporan')
                                    ->where('tanggal', $tgl_sekarang)
                                    ->first();
                            @endphp
                            <div class="widget-data">
                                <div class="h4 mb-0">KAS MASUK</div>
                                <div class="weight-600 font-14">Rp.@if (isset($laporan1))
                                        {{ number_format($laporan1->kas_masuk) }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div class="text-center" style="background-color: #7ee8fa;
                                                                                background-image: linear-gradient(315deg, #7ee8fa 0%, #80ff72 74%);
                                                                                
                                                                                        ">
                                    <h1><span class="micon icon-copy fa fa-level-up"></span></h1>
                                </div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">KAS KELUAR</div>
                                <div class="weight-600 font-14">Rp.@if (isset($laporan1))

                                        {{ number_format($laporan1->kas_keluar) }}@endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card-box height-100-p widget-style1">
                        <div class="d-flex flex-wrap align-items-center">
                            <div class="progress-data">
                                <div class="text-center"
                                    style="background-color: #f5d020;
                                                                        background-image: linear-gradient(315deg, #f5d020 0%, #f53803 74%);">
                                    <h1> <i class="micon icon-copy fa fa-money" aria-hidden="true"></i> </h1>
                                </div>
                            </div>
                            <div class="widget-data">
                                <div class="h4 mb-0">SALDO AKHIR</div>
                                <div class="weight-600 font-14">Rp. @if (isset($laporan1))

                                        {{ number_format($laporan->saldo_awal - $laporan1->kas_keluar) }} @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-box mb-30">
                <h2 class="h4 pd-20"></h2>
                <div class="container">
                    <center>
                        <img src="{{ asset('gambar/logo2.png') }}" alt="">
                        <h3>SISTEM INFORMASI ADMINISTRASI KEUANGAN <br>
                            SMK CENDANA PADANG PANJANG</h3>
                    </center>
                </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit
                    Hingarajiya</a>
            </div>
        </div>
    </div>

@endsection
