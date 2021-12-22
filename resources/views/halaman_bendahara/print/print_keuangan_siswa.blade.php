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
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <div class="pb-20 mt-5">
                    @if (isset($siswa_print))
                        @php
                            $nama_siswa = DB::table('siswa')
                                ->where('nama_siswa', $siswa_print)
                                ->leftjoin('kelas', 'siswa.id_kelas', '=', 'kelas.id_kelas')
                                ->first();
                        @endphp
                    @endif
                    NAMA SISWA :{{ $nama_siswa->nama_siswa }} <br>
                    NIS : {{ $nama_siswa->nis }} <br>
                    KELAS : {{ $nama_siswa->kelas }} ({{ $nama_siswa->nama_kelas }})<br>
                    <div class="container">

                    </div>
                    <table class="table table-bordered">
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
                            @foreach ($print_siswa as $t)
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
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $tanggal = date('Y-m-d');
                    @endphp
                    <div class="row">Mengetahui : <br> Kepala Sekolah Smk Cendana Padang Panjang
                        <br><br><br><br><br> Drs. Khalil Taj <br>Nip:
                    </div>
                    <div class="row">Padang Panjang ,{{ $tanggal }} <br>Bendahara
                        <br><br><br><br><br>Eva Erianti S.Pd
                        <br>Nip:
                    </div>
                </div>
            </div>
            {{-- <div class="d-flex justify-content-end">
                Penanggung Jawab
                <br> <br><br><br><br>
                {{ Auth::user()->name }}
            </div>
            <div class="d-flex justify-content-start">
                Penanggung Jawab
                <br> <br><br><br><br>
                {{ Auth::user()->name }}
            </div> --}}
        </div>
    </div>

</body>
<script>
    window.print();
</script>

</html>
