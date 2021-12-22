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
                    <div class="pb-20">
                        <table class="data-table table table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="3">
                                        <h5> Pendapatan </h5>
                                    </td>
                                    <td colspan="5 ">
                                        <h5>Pengeluaran </h5>
                                    </td>
                                    <td>
                                        <h5>Saldo </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Sumber</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Satuan</th>
                                    <th>Banyak</th>
                                    <th>Jumlah</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan as $t)
                                    <tr class="text center">

                                        <td>{{ $t->tanggal_pendapatan }}</td>
                                        <td>{{ $t->sumber }}</td>
                                        <td>{{ number_format($t->jumlah_pendapatan) }}</td>
                                        <td>{{ $t->tanggal_pengeluaran }}</td>
                                        <td>{{ $t->keterangan }}</td>
                                        <td>{{ $t->satuan }}</td>
                                        <td>{{ $t->banyak }}</td>
                                        <td>{{ number_format($t->jumlah_pengeluaran) }}</td>
                                        <td>{{ number_format($t->jumlah_pendapatan - $t->jumlah_pengeluaran) }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td colspan="2">Total Pendapatan</td>
                                <td>Rp.{{ number_format($jumlah->pendapatan) }}</td>
                                <td colspan="4">Total Pengeluaran</td>
                                <td>Rp.{{ number_format($jumlah->pengeluaran) }}</td>
                                <td>Rp.{{ number_format($jumlah->pendapatan - $jumlah->pengeluaran) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
