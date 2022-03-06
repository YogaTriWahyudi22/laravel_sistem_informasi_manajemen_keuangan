@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Detail Laporan Piutang Siswa
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
                    <form action="{{ route('cari_piutang') }}" method="POST">
                        @csrf
                        <div class="row float-center">

                            <select class="form-control" name="nama_siswa" aria-label="Default select example">
                                @php
                                    $nama_siswa = DB::table('siswa')->get();
                                @endphp
                                @foreach ($nama_siswa as $nama)
                                    <option value="{{ $nama->id_siswa }}">{{ $nama->nama_siswa }} </option>
                                @endforeach

                            </select>
                            <button type="submit" class="btn btn-primary my-2">Cari</button>
                            <a href="{{ route('piutang') }}" class="btn btn-danger my-2 mx-2">Reset</a>

                            @if (isset($id_siswa))
                                <a href="{{ route('piutang_print1', $id_siswa) }}" target="_blank"
                                    class="btn btn-success my-2">Print</a>
                            @else
                                <a href="{{ route('piutang_print') }}" target="_blank"
                                    class="btn btn-success my-2 ">Print</a>
                            @endif

                        </div>
                    </form>
                    <div class="pb-20">
                        <table class="data-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Bulan</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Uang SPP</th>
                                    <th>Uang SERAGAM</th>
                                    <th>UANG DSP</th>
                                    <th>UANG UJIAN</th>
                                    <th>UANG PKL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_siswa as $siswa)
                                    @php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $spp = DB::table('uang_spp')
                                            ->where('id_siswa', $siswa->id_siswa)
                                            ->first();
                                        
                                        if (isset($spp)) {
                                            $tanggal = date('m', strtotime($spp->tanggal));
                                            $dsp = DB::table('uang_dsp')
                                                ->whereMonth('tanggal', $tanggal)
                                                ->where('id_siswa', $siswa->id_siswa)
                                                ->first();
                                        
                                            $pkl = DB::table('uang_pkl')
                                                ->where('id_siswa', $siswa->id_siswa)
                                                ->whereMonth('tanggal', $tanggal)
                                                ->first();
                                        
                                            $seragam = DB::table('uang_seragam')
                                                ->where('id_siswa', $siswa->id_siswa)
                                                ->whereMonth('tanggal', $tanggal)
                                                ->first();
                                        
                                            $ujian = DB::table('uang_ujian')
                                                ->where('id_siswa', $siswa->id_siswa)
                                                ->whereMonth('tanggal', $tanggal)
                                                ->first();
                                        }
                                    @endphp
                                    <tr class="text center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if (isset($tanggal))
                                                @if ($tanggal == 12)
                                                    {{ 'Desember' }}
                                                @elseif($tanggal == 11)
                                                    {{ 'November' }}
                                                @elseif($tanggal == 10)
                                                    {{ 'October' }}
                                                @elseif($tanggal == 9)
                                                    {{ 'September' }}
                                                @elseif($tanggal == 8)
                                                    {{ 'Agustus' }}
                                                @elseif($tanggal == 7)
                                                    {{ 'Juli' }}
                                                @elseif($tanggal == 6)
                                                    {{ 'Juni' }}
                                                @elseif($tanggal == 5)
                                                    {{ 'May' }}
                                                @elseif($tanggal == 4)
                                                    {{ 'April' }}
                                                @elseif($tanggal == 3)
                                                    {{ 'Maret' }}
                                                @elseif($tanggal == 2)
                                                    {{ 'February' }}
                                                @elseif($tanggal == 1)
                                                    {{ 'January' }}
                                                @endif
                                            @endif

                                        </td>
                                        <td>{{ $siswa->nama_siswa }}</td>
                                        <td>{{ $siswa->kelas }} => {{ $siswa->nama_kelas }}</td>
                                        <td>
                                            @if (isset($spp->nominal))
                                                {{ 'Sudah Lunas' }}
                                            @else
                                                {{ 'Belum Lunas' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($seragam->nominal))
                                                {{ 'Sudah Lunas' }}
                                            @else
                                                {{ 'Belum Lunas' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($dsp->status))
                                                {{ 'Sudah Lunas' }}
                                            @else
                                                {{ 'Belum Lunas' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($ujian->nominal))
                                                {{ 'Sudah Lunas' }}
                                            @else
                                                {{ 'Belum Lunas' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($pkl->status))
                                                {{ 'Sudah Lunas' }}
                                            @else
                                                {{ 'Belum Lunas' }}
                                            @endif
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
