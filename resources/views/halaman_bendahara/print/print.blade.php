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
