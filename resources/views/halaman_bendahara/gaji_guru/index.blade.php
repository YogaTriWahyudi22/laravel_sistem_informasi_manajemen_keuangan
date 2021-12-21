@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Pembayaran Gaji Guru</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="pd-20">
                        <a href="{{ route('pembayaran_gaji_tambah_get') }}" class="btn btn-primary" class="btn btn-primary"
                            id="pilih"><span class="text-capitalize">Pembayaran Gaji</span></a>
                    </div>
                    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Nomor</th>
                                        <th>Nama Guru</th>
                                        <th>NIP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor Telepon</th>
                                        <th>Bidang</th>
                                        <th class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gaji as $i)
                                        <tr class="text center">
                                            <td class="table-plus">{{ $loop->iteration }}</td>
                                            <td>{{ $i->nama_guru }}</td>
                                            <td>{{ $i->nip }}</td>
                                            <td>{{ $i->jk }}</td>
                                            <td>{{ $i->nohp }}</td>
                                            <td>{{ $i->bidang }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    <a href="{{ route('pembayaran_gaji_detail', $i->id_guru) }}"
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
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let jam = document.getElementById("jam")
            jam.addEventListener('keyup', function() {
                let total = "40000"
                document.getElementById("total").value = parseInt(total) * parseInt(this.value)
            });
        });

        function kategori() {
            var tes = document.getElementById("pilih").value;
            console.log(tes);
            $('#guru' + tes).modal('show');

        }
    </script>
@endsection
