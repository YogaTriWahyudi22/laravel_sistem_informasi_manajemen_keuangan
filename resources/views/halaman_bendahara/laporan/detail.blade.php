@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Detail Laporan Kas <a href="{{ route('laporan') }}" class="btn btn-primary">Kembali</a>
                                </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <h2> Kas Masuk </h2>
                    <hr>
                    @if (isset($pendaftaran))
                        <div class="pb-20">
                            <h5 style="background-color: #7CB9E8">Uang Pendaftaran</h5>
                            <table class="table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Nomor</th>
                                        <th>Nama Siswa</th>
                                        <th>Nominal</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendaftaran as $i)
                                        <tr class="text center">
                                            <td class="table-plus">{{ $loop->iteration }}</td>
                                            <td>{{ $i->nama_siswa }}</td>
                                            <td>{{ number_format($i->nominal) }}</td>
                                            <td>{{ $i->tanggal }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    @if (isset($uang_spp))

                        <div class="pb-20">
                            <h5 style="background-color: #fd5c63">Uang SPP</h5>
                            <table class="table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Nomor</th>
                                        <th>Nama Siswa</th>
                                        <th>Bulan</th>
                                        <th>Nominal</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($uang_spp as $spp)
                                        <tr class="text center">
                                            <td class="table-plus">{{ $loop->iteration }}</td>
                                            <td>{{ $spp->nama_siswa }}</td>
                                            <td>{{ $spp->bulan }}</td>
                                            <td>{{ number_format($spp->nominal) }}</td>
                                            <td>{{ $spp->tanggal }}</td>
                                            <td>{{ $spp->waktu }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    @if (isset($uang_pkl))
                        <div class="pb-20">
                            <h5 style="background-color: #00BFFF">Uang PKL</h5>
                            <table class="table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Nomor</th>
                                        <th>Nama Siswa</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($uang_pkl as $pkl)
                                        <tr class="text center">
                                            <td class="table-plus">{{ $loop->iteration }}</td>
                                            <td>{{ $pkl->nama_siswa }}</td>
                                            <td>{{ number_format($pkl->nominal) }}</td>
                                            <td>{{ $pkl->keterangan }}</td>
                                            <td>{{ $pkl->tanggal }}</td>
                                            <td>{{ $pkl->waktu }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    @if (isset($uang_seragam))
                        <div class="pb-20">
                            <h5 style="background-color: #568203">Uang Seragam</h5>
                            <table class="table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Nomor</th>
                                        <th>Nama Siswa</th>
                                        <th>Nominal</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($uang_seragam as $seragam)
                                        <tr class="text center">
                                            <td class="table-plus">{{ $loop->iteration }}</td>
                                            <td>{{ $seragam->nama_siswa }}</td>
                                            <td>{{ number_format($seragam->nominal) }}</td>
                                            <td>{{ $seragam->status }}</td>
                                            <td>{{ $seragam->tanggal }}</td>
                                            <td>{{ $seragam->waktu }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    @if (isset($uang_ujian))
                        <div class="pb-20">
                            <h5 style="background-color: #B9D9EB">Uang Ujian</h5>
                            <table class="table stripe hover ">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Nomor</th>
                                        <th>Nama Siswa</th>
                                        <th>Nominal</th>
                                        <th>Periode</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($uang_ujian as $ujian)
                                        <tr class="text center">
                                            <td class="table-plus">{{ $loop->iteration }}</td>
                                            <td>{{ $ujian->nama_siswa }}</td>
                                            <td>{{ number_format($ujian->nominal) }}</td>
                                            <td>{{ $ujian->periode }}</td>
                                            <td>{{ $ujian->tanggal }}</td>
                                            <td>{{ $ujian->waktu }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>

                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <h2> Kas Keluar </h2>
                    <hr>
                    @if (isset($biaya_lain))
                        <div class="pb-20">
                            <h5 style="background-color: #FF7F50">Biaya Lain</h5>
                            <table class="table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Nomor</th>
                                        <th>Nama Admin</th>
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($biaya_lain as $lain)
                                        <tr class="text center">
                                            <td class="table-plus">{{ $loop->iteration }}</td>
                                            <td>{{ $lain->nama }}</td>
                                            <td>{{ $lain->keterangan }}</td>
                                            <td>{{ number_format($lain->nominal) }}</td>
                                            <td>{{ $lain->tanggal }}</td>
                                            <td>{{ $lain->waktu }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    @if (isset($gaji))
                        <div class="pb-20">
                            <h5 style="background-color: #4FFFB0">Gaji</h5>
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Nomor</th>
                                        <th>Nama Guru</th>
                                        <th>Periode</th>
                                        <th>Jam Mengejar</th>
                                        <th>Nominal</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gaji as $g)
                                        <tr class="text center">
                                            <td class="table-plus">{{ $loop->iteration }}</td>
                                            <td>{{ $g->nama_guru }}</td>
                                            <td>{{ $g->periode }}</td>
                                            <td>{{ $g->jam }}</td>
                                            <td>{{ number_format($g->nominal) }}</td>
                                            <td>{{ $g->tanggal }}</td>
                                            <td>{{ $g->waktu }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
