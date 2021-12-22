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
                    <h4>Laporan Gaji Guru Tahunan</h4>
                </div>
                <table class="table table-bordered">
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
                        @foreach ($print_gaji as $t)
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
