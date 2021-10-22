@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Laporan Kas </h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Saldo Awal</th>
                                    <th>Kas Masuk</th>
                                    <th>Kas Keluar</th>
                                    <th>Saldo Akhir</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($index as $i)
                                    {{-- @dd($i) --}}
                                    <tr class="text center">
                                        <td class="table-plus">{{ $loop->iteration }}</td>
                                        <td>{{ $i->tanggal }}</td>
                                        <td>{{ number_format($laporan->saldo_awal) }}</td>
                                        <td>{{ number_format($i->kas_masuk) }}</td>
                                        <td>{{ number_format($i->kas_keluar) }}</td>
                                        <td>{{ number_format($laporan->saldo_awal - $i->kas_keluar) }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                <a href="{{ route('laporan_detail', $i->id_laporan) }}"
                                                    class="btn btn-info mx-2">
                                                    Detail</a>
                                            </div>
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
