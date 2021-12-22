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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <h5> Pendapatan </h5>
                                </td>
                                <td colspan="5 ">
                                    <h5>Pengeluaran </h5>
                                </td>
                                <td>
                                    <h5>Saldo </h5>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <th>Sumber</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Satuan</th>
                                <th>Banyak</th>
                                <th>Jumlah</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $t)
                                <tr class="text center">

                                    <td>{{ $t->tanggal_pendapatan }}</td>
                                    <td>{{ $t->sumber }}</td>
                                    <td>{{ number_format($t->jumlah_pendapatan) }}</td>
                                    <td>{{ $t->tanggal_pengeluaran }}</td>
                                    <td>{{ $t->keterangan }}</td>
                                    <td>{{ $t->satuan }}</td>
                                    <td>{{ $t->banyak }}</td>
                                    <td>{{ number_format($t->jumlah_pengeluaran) }}</td>
                                    <td>{{ number_format($t->jumlah_pendapatan - $t->jumlah_pengeluaran) }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="2">Total Pendapatan</td>
                            <td>Rp.{{ number_format($jumlah->pendapatan) }}</td>
                            <td colspan="4">Total Pengeluaran</td>
                            <td>Rp.{{ number_format($jumlah->pengeluaran) }}</td>
                            <td>Rp.{{ number_format($jumlah->pendapatan - $jumlah->pengeluaran) }}</td>
                        </tr>
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
        </div>
    </div>
    {{-- </div> --}}

</body>
<script>
    window.print();
</script>

</html>
