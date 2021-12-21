@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Biaya Lain</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="pd-20">
                        <a href="" class="btn btn-primary" id="pilih" onchange="kategori()" data-toggle="modal"
                            data-target="#pengeluaran"><span class="text-capitalize">Pengeluaran
                                Lain</span></a>
                    </div>
                    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Nomor</th>
                                        <th>Nama Bendahara</th>
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($biaya_lain as $i)
                                        <tr class="text center">
                                            <td class="table-plus">{{ $loop->iteration }}</td>
                                            <td>{{ $i->nama }}</td>
                                            <td>{{ $i->keterangan }}</td>
                                            <td>Rp.{{ number_format($i->nominal) }}</td>
                                            <td>{{ date('d/F/Y', strtotime($i->tanggal)) }}</td>
                                            <td>{{ $i->waktu }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    <a href="{{ route('pembayaran_lain_detail', $i->id_biaya_lain) }}"
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

    <!-- Modal -->
    <div class="modal fade" id="pengeluaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span class="text-capitalize">Form
                            Pembayaran</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pembayaran_lain_tambah') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label class="control-label"> Nominal</label>
                            <div><input type="text" name="nominal" id="harga_satuan" class="form-control"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label"> Keterangan</label>
                            <div><input type="text" name="keterangan" class="form-control"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label"> Satuan</label>
                            <div><input type="text" name="satuan" class="form-control"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label"> Kuantiti</label>
                            <div><input type="text" name="banyak" class="form-control"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                    class="text-capitalize">tutup</span></button>
                            <button type="submit" class="btn btn-primary"><span
                                    class="text-capitalize">simpan</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var rupiah = document.getElementById('harga_satuan');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
            // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function kategori() {
            var tes = document.getElementById("pilih").value;
            console.log(tes);
            $('#pengeluaran' + tes).modal('show');

        }
    </script>
@endsection
