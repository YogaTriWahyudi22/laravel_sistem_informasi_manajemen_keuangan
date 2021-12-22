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
                <div class="pb-20">
                    <div class="container mt-5">
                        <h2>LAPORAN KEUANGAN TAHUNAN SMK CENDANA PADANG PANJANG</h2>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                                <th>Saldo</th>
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
