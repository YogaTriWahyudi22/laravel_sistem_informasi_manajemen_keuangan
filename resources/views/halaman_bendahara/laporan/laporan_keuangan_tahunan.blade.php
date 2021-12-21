@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Detail Laporan Kas Tahunan
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
                        $tgl = date('Y');
                    @endphp
                    <form action="{{ route('cari_tahunan') }}" method="POST">
                        @csrf
                        <div class="row float-center">

                            <select class="form-control" name="periode_tahunan" aria-label="Default select example">
                                @php
                                    $bulan = ['2021', '2022', '2023', '2024', '2025', '2026'];
                                @endphp
                                <option value="{{ $tgl }}">Pilih Bulan</option>
                                @foreach ($bulan as $b => $value_tahunan)
                                    <option value="{{ $value_tahunan }}">{{ $value_tahunan }} </option>
                                @endforeach

                            </select>
                            <button type="submit" class="btn btn-primary my-2">Cari</button>
                            @if (isset($periode_tahunan))
                                <a href="{{ route('print_tahun', $periode_tahunan) }}" class="btn btn-success my-2 mx-2"
                                    target="_blank">Print</a>
                            @else
                                <a href="{{ route('print_tahun1') }}" class="btn btn-success my-2 mx-2"
                                    target="_blank">Print</a>
                            @endif
                        </div>
                    </form>
                    <div class="pb-20">
                        <table class="data-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Masuk</th>
                                    <th>Keluar</th>
                                    <th>Saldo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tahunan as $t)
                                    <tr class="text center">
                                        <td>
                                            @if ($t->pengeluaran_bulan == 12)
                                                {{ 'Desember' }}
                                            @elseif($t->pengeluaran_bulan == 11)
                                                {{ 'November' }}
                                            @elseif($t->pengeluaran_bulan == 10)
                                                {{ 'October' }}
                                            @elseif($t->pengeluaran_bulan == 9)
                                                {{ 'September' }}
                                            @elseif($t->pengeluaran_bulan == 8)
                                                {{ 'Agustus' }}
                                            @elseif($t->pengeluaran_bulan == 7)
                                                {{ 'Juli' }}
                                            @elseif($t->pengeluaran_bulan == 6)
                                                {{ 'Juni' }}
                                            @elseif($t->pengeluaran_bulan == 5)
                                                {{ 'May' }}
                                            @elseif($t->pengeluaran_bulan == 4)
                                                {{ 'April' }}
                                            @elseif($t->pengeluaran_bulan == 3)
                                                {{ 'Maret' }}
                                            @elseif($t->pengeluaran_bulan == 2)
                                                {{ 'February' }}
                                            @elseif($t->pengeluaran_bulan == 1)
                                                {{ 'January' }}
                                            @endif

                                        </td>
                                        <td>{{ number_format($t->TotalPendapatan) }}</td>
                                        <td>{{ number_format($t->TotalPengeluaran) }}</td>
                                        <td>{{ number_format($t->TotalPendapatan - $t->TotalPengeluaran) }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
