@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Detail Laporan Gaji Guru Tahunan
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
                    <form action="{{ route('gaji_tahunan') }}" method="POST">
                        @csrf
                        <div class="row float-center">

                            <select class="form-control" name="guru_tahun" aria-label="Default select example">
                                @php
                                    $bulan = ['2021', '2022', '2023', '2024', '2025', '2026'];
                                @endphp
                                <option value="{{ $tgl }}">Pilih Tahun</option>
                                @foreach ($bulan as $b)
                                    <option value="{{ $b }}">{{ $b }} </option>
                                @endforeach

                            </select>
                            <button type="submit" class="btn btn-primary my-2">Cari</button>
                            @if (isset($cari_guru_tahunan))
                                <a href="{{ route('print_gaji_tahun', $cari_guru_tahunan) }}"
                                    class="btn btn-success my-2 mx-2" target="_blank">Print</a>
                            @else
                                <a href="{{ route('print_gaji_tahun1') }}" class="btn btn-success my-2 mx-2"
                                    target="_blank">Print</a>
                            @endif
                            <a href="{{ route('laporan_gaji_bulan') }}" class="btn btn-danger my-2">Reset</a>
                        </div>
                    </form>
                    <div class="pb-20">
                        <table class="data-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>NAMA GURU</th>
                                    <th>PERIODE</th>
                                    <th>JAM MENGAJAR</th>
                                    <th>NOMINAL</th>
                                    <th>TANGGAL</th>
                                    <th>WAKTU</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guru_tahun as $t)
                                    <tr class="text center">
                                        <td>{{ $t->nama_guru }}</td>
                                        <td>{{ $t->periode }}</td>
                                        <td>{{ $t->jam }}</td>
                                        <td>{{ number_format($t->nominal) }}</td>
                                        <td>{{ $t->tanggal }}</td>
                                        <td>{{ $t->waktu }}</td>


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
