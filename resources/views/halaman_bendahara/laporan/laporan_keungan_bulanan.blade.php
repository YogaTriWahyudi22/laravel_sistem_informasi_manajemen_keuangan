@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Detail Laporan Kas Bulanan
                                </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('m');
                    @endphp
                    <form action="{{ route('cari_bulan') }}" method="POST">
                        @csrf
                        <div class="row float-center">

                            <select class="form-control" name="periode" aria-label="Default select example">
                                @php
                                    $bulan = ['Januari' => '1', 'Februari' => '2', 'Maret' => '3', 'April' => '4', 'Mei' => '5', 'Juni' => '6', 'Juli' => '7', 'Agustus' => '8', 'September' => '9', 'Oktober' => '10', 'November' => '11', 'Desember' => '12'];
                                @endphp
                                <option value="{{ $tgl }}">Pilih Bulan</option>
                                @foreach ($bulan as $b => $value_bulan)
                                    <option value="{{ $value_bulan }}">{{ $b }} </option>
                                @endforeach

                            </select>
                            <button type="submit" class="btn btn-primary my-2">Cari</button>
                            @if (isset($periode))
                                <a href="{{ route('print', $periode) }}" class="btn btn-success my-2 mx-2"
                                    target="_blank">Print</a>
                            @else
                                <a href="{{ route('print1') }}" class="btn btn-success my-2 mx-2"
                                    target="_blank">Print</a>
                            @endif
                            {{-- @dd($periode) --}}
                        </div>
                    </form>
                    <div class="pb-20 text-align: left;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <center>
                                            <h5> Pendapatan </h5>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Sumber</th>
                                    <th>Jumlah</th>
                                    <th></th>
                                </tr>

                                @foreach ($laporan_pendapatan as $pendapatan)
                                    <tr>
                                        @php
                                            $jumlah_pendapatan = $pendapatan->jumlah_pendapatan;
                                        @endphp
                                        <td>{{ $pendapatan->tanggal_pendapatan }}</td>
                                        <td>{{ $pendapatan->sumber }}</td>
                                        <td>{{ number_format($pendapatan->jumlah_pendapatan) }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                {{-- </tr> --}}
                            </thead>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="5">
                                        <center>
                                            <h5> Pengeluaran </h5>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Satuan</th>
                                    <th>Banyak</th>
                                    <th>Jumlah</th>
                                    <th></th>
                                </tr>

                                @foreach ($laporan_pengeluaran as $pengeluaran)
                                    <tr>
                                        @php
                                            $jumlah_pengeluaran = $pengeluaran->jumlah_pengeluaran;
                                        @endphp
                                        <td>{{ $pengeluaran->tanggal_pengeluaran }}</td>
                                        <td>{{ $pengeluaran->keterangan }}</td>
                                        <td>{{ $pengeluaran->satuan }}</td>
                                        <td>{{ $pengeluaran->banyak }}</td>
                                        <td>{{ number_format($pengeluaran->jumlah_pengeluaran) }}</td>
                                    </tr>
                                @endforeach
                            </thead>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="5">
                                        <center>
                                            <h5> Total Saldo </h5>
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Pendapatan</td>
                                    <td>Rp.{{ number_format($jumlah->pendapatan) }}</td>
                                </tr>
                                <tr>
                                    <td>Total Pengeluaran</td>
                                    <td>Rp.{{ number_format($jumlah->pengeluaran) }}</td>
                                </tr>
                            </thead>
                            <tr>
                                <td>
                                    <h5> Total Saldo </h5>
                                </td>
                                <td>Rp.{{ number_format($jumlah->pendapatan - $jumlah->pengeluaran) }}</td>
                            </tr>
                        </table>
                    </div>
                    {{-- @dd() --}}
                    <div class="float-left mt-4">
                        <div class="mb-5"> Mengetahui </div>
                        Kepala Sekolah<p class="fst-italic">
                            <br><br><br><br><br>{{ $user_kepsek->nama }}
                        </p>
                    </div>
                    <div class="float-right mt-4">
                        <div class="mb-5"> Mengetahui, </div>
                        Ketua Yayasan<p class="fst-italic">
                            <br><br><br><br><br> {{ $user_yayasan->nama }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
