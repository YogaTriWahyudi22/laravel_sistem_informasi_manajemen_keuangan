@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Detail Laporan Arsip Siswa
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
                    <form action="{{ route('cari_arsip') }}" method="POST">
                        @csrf
                        <div class="row float-center">

                            <select class="form-control" name="arsip_siswa" aria-label="Default select example">
                                @php
                                    $nama_siswa = DB::table('siswa')->get();
                                @endphp
                                @foreach ($nama_siswa as $nama)
                                    <option value="{{ $nama->id_siswa }}">{{ $nama->nama_siswa }} </option>
                                @endforeach

                            </select>
                            <button type="submit" class="btn btn-primary my-2">Cari</button>
                            <a href="{{ route('arsip_siswa') }}" class="btn btn-danger my-2 mx-2">Reset</a>


                            @if (isset($arsip))
                                <a href="{{ route('arsip_print1', $arsip) }}" target="_blank"
                                    class="btn btn-success my-2">Print</a>
                            @else
                                <a href="{{ route('arsip_print') }}" target="_blank"
                                    class="btn btn-success my-2 ">Print</a>
                            @endif

                        </div>
                    </form>
                    <div class="pb-20">
                        <table class="data-table table table-bordered">
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
                </div>
            </div>
        </div>
    </div>
@endsection
