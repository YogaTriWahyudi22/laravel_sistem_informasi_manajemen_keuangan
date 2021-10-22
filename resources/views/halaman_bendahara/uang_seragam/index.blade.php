@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Pembayaran Uang Seragam</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="pd-20">
                        <form action="{{ route('uang_seragam_cari') }}" method="POST">
                            @csrf
                            <select class="form-control" name="cari" aria-label="Default select example">
                                <option value="0">Pilih Kelas</option>

                                @foreach ($pilih_kelas as $k)
                                    <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <button style="submit" class="btn btn-primary mt-2">Cari</button>
                        </form>
                    </div>
                    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Nomor</th>
                                        <th>Nama Siswa</th>
                                        <th>NIS</th>
                                        <th>Jurusan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status Pembayaran</th>
                                        <th class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $i)
                                        <tr class="text center">
                                            <td class="table-plus">{{ $loop->iteration }}</td>
                                            <td>{{ $i->nama_siswa }}</td>
                                            <td>{{ $i->nis }}</td>
                                            <td>{{ $i->nama_jurusan }}</td>
                                            <td>{{ $i->jk }}</td>
                                            <td>{{ $i->status_uang }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    @if ($i->status_uang == 'lunas')

                                                    @else
                                                        <a href="" class="btn btn-success" class="btn btn-primary"
                                                            id="pilih" onchange="kategori()" data-toggle="modal"
                                                            data-target="#pembayaran{{ $i->id_siswa }}"><span
                                                                class="text-capitalize">bayar</span></a>
                                                    @endif

                                                    <a href="{{ route('uang_seragam_detail', $i->id_siswa) }}"
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
    @foreach ($siswa as $k)

        <!-- Modal -->
        <div class="modal fade" id="pembayaran{{ $k->id_siswa }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span class="text-capitalize"> Form Pembayaran
                                Uang Seragam</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('uang_seragam_ujian') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_siswa" value="{{ $k->id_siswa }}">
                            <div class="form-group">
                                <label class="control-label"> Nominal</label>
                                <div><input type="text" readonly="" value="{{ $pembayaran->nominal }}" name="nominal"
                                        class="form-control"></div>
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
    @endforeach

    <script>
        function kategori() {
            var tes = document.getElementById("pilih").value;
            console.log(tes);
            $('#kelassaya' + tes).modal('show');

        }
    </script>
@endsection
