<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('pembagian_template.css')
    @include('pembagian_template.script')
</head>

<body>
    {{-- <div class="main-container"> --}}
    <center>
        <table width="80%">
            <tr>
                <td><img src="{{ asset('gambar/logo.png') }}" width="100" height="100"></td>
                <td align="center">
                    <font style="font-family: Tahoma; font-size:12;">PEMERINTAH PROVINSI SUMATERA BARAT </font>
                    <br>
                    <font style="font-family: Tahoma; font-size:14;"><b>SMK Cendana Padang Panjang</b></font>
                    <br>
                    <font style="font-family: Tahoma; font-size:10;">Paninjauan, Kec. Sepuluh Koto, Kabupaten Tanah
                        Datar, Sumatera Barat 27118 </font><br>
                    <font style="font-family: Tahoma; font-size:10;">(0752) 5748211
                    </font><br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr style="border: 2px solid black;">
                    <hr style="border: 0.3px solid rgb(104, 104, 104); margin-top: -4px;">
                </td>
            </tr>
        </table>
    </center>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

            <div class="pb-20 text-align: left;">

                <table class="table table-bordered">
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
                                $tanggal = date('m', strtotime($spp->tanggal));
                                if (isset($tanggal)) {
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

            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $tanggal = date('Y-m-d');
                    @endphp
                    <div class="row">Mengetahui : <br> Kepala Sekolah Smk Cendana Padang Panjang
                        <br><br><br><br><br> {{ $user_kepsek->nama }} <br>
                    </div>
                    <div class="row">Padang Panjang ,{{ $tanggal }} <br>Ketua Yayasan Smk Cendana Padang
                        Panjang
                        <br><br><br><br><br> {{ $user_yayasan->nama }}
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}

</body>
<script>
    window.print();
</script>

</html>
