@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Detail Laporan Keuangan Siswa
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
                    <form action="{{ route('cari_siswa') }}" method="POST">
                        @csrf
                        <div class="row float-center">

                            <select class="form-control" name="nama_siswa" aria-label="Default select example">
                                @php
                                    $nama_siswa = DB::table('siswa')->get();
                                @endphp
                                @foreach ($nama_siswa as $nama)
                                    <option value="{{ $nama->nama_siswa }}">{{ $nama->nama_siswa }} </option>
                                @endforeach

                            </select>
                            <button type="submit" class="btn btn-primary my-2">Cari</button>
                            @if (isset($siswa))
                                <a href="{{ route('print_siswa', $siswa) }}" class="btn btn-success my-2 mx-2"
                                    target="_blank">Print</a>
                            @else
                                <a href="{{ route('print_siswa1') }}" class="btn btn-success my-2 mx-2"
                                    target="_blank">Print</a>
                            @endif
                            <a href="{{ route('laporan_keuangan_mahasiswa') }}" class="btn btn-danger my-2">Reset</a>
                        </div>
                    </form>
                    <div class="pb-20">
                        <table class="data-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Uang SPP</th>
                                    <th>Uang SERAGAM</th>
                                    <th>UANG DSP</th>
                                    <th>UANG UJIAN</th>
                                    <th>JUMLAH</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $t)
                                    <tr class="text center">
                                        <td>
                                            @if ($t->bulan_semua == 12)
                                                {{ 'Desember' }}
                                            @elseif($t->bulan_semua == 11)
                                                {{ 'November' }}
                                            @elseif($t->bulan_semua == 10)
                                                {{ 'October' }}
                                            @elseif($t->bulan_semua == 9)
                                                {{ 'September' }}
                                            @elseif($t->bulan_semua == 8)
                                                {{ 'Agustus' }}
                                            @elseif($t->bulan_semua == 7)
                                                {{ 'Juli' }}
                                            @elseif($t->bulan_semua == 6)
                                                {{ 'Juni' }}
                                            @elseif($t->bulan_semua == 5)
                                                {{ 'May' }}
                                            @elseif($t->bulan_semua == 4)
                                                {{ 'April' }}
                                            @elseif($t->bulan_semua == 3)
                                                {{ 'Maret' }}
                                            @elseif($t->bulan_semua == 2)
                                                {{ 'February' }}
                                            @elseif($t->bulan_semua == 1)
                                                {{ 'January' }}
                                            @endif

                                        </td>
                                        <td>{{ number_format($t->TotalSPP) }}</td>
                                        <td>{{ number_format($t->TotalSeragam) }}</td>
                                        <td>{{ number_format($t->TotalDSP) }}</td>
                                        <td>{{ number_format($t->TotalUjian) }}</td>
                                        <td>{{ number_format($t->TotalSPP + $t->TotalSeragam + $t->TotalDSP + $t->TotalUjian) }}
                                        </td>

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
