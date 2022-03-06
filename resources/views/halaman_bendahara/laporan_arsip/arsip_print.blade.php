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
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_arsip as $siswa)
                            <tr class="text center">

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->nama_siswa }}</td>
                                <td>{{ $siswa->kelas }} => {{ $siswa->nama_kelas }}</td>

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
