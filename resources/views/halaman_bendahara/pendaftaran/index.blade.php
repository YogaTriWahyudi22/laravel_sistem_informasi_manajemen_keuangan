@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Pembayaran Pendaftaran</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="pd-20">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data
                        </button>

                    </div>
                    {{-- Pemanggilan Modal --}}

                    @include('halaman_bendahara.pendaftaran.tambah')

                    {{-- !Pemanggilan Modal --}}
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr class="text-center">
                                    <th class="table-plus datatable-nosort">Nomor</th>
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                    <th>Jurusan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Wali Siswa</th>
                                    <th>Alamat Siswa</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($index as $i)
                                    @php
                                        $id = $i->id_draf;
                                    @endphp
                                    <tr class="text center">
                                        <td class="table-plus">{{ $loop->iteration }}</td>
                                        <td>{{ $i->nama_siswa }}</td>
                                        <td>{{ $i->nis }}</td>
                                        <td>{{ $i->nama_jurusan }}</td>
                                        <td>{{ $i->jk }}</td>
                                        <td>{{ $i->tanggal_lahir }}</td>
                                        <td>{{ $i->wali_siswa }}</td>
                                        <td>{{ $i->alamat_siswa }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                @if ($i->bayar == null)

                                                    <a href="" class="btn btn-success" class="btn btn-primary" id="pilih"
                                                        onchange="kategori()" data-toggle="modal"
                                                        data-target="#modalsaya{{ $i->id_draf }}"><span
                                                            class="text-capitalize">bayar</span></a>
                                                @else

                                                    <a href="" class="btn btn-success" class="btn btn-primary" id="kelas"
                                                        onchange="kelas()" data-toggle="modal"
                                                        data-target="#kelassaya{{ $i->id_draf }}"><span
                                                            class="text-capitalize">kelas</span></a>
                                                @endif

                                                <a href="{{ route('pendaftaran_edit', $i->id_draf) }}"
                                                    class="btn btn-info mx-2"><i class="dw dw-edit2"></i>
                                                    Edit</a>
                                                <form action="{{ route('pendaftaran_hapus', $i->id_draf) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger"><i class="dw dw-delete-3 mr-2"></i>
                                                        Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
    @foreach ($index as $item)

        <!-- Modal -->
        <div class="modal fade" id="modalsaya{{ $item->id_draf }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span class="text-capitalize"> Pembayaran Uang
                                Pendaftaran</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('bayar', $item->id_draf) }}" method="POST">
                            @csrf
                            <span>{{ $item->nama_siswa }}</span>
                            @if (isset($pembayaran))
                                <input type="hidden" name="bayar" value="{{ $pembayaran->nominal }}">
                                <p>Konfirmasi Pembayaran Uang pendaftaran Dengan Nama:
                                    <strong>{{ $item->nama_siswa }}</strong>
                                    senilai Rp.{{ number_format($pembayaran->nominal) }}
                                </p>
                            @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span
                                class="text-capitalize">tutup</span></button>
                        <button type="submit" class="btn btn-primary"><span class="text-capitalize">simpan</span></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($index as $kelas)

        <!-- Modal -->
        <div class="modal fade" id="kelassaya{{ $kelas->id_draf }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span class="text-capitalize"> Pilih Kelas</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @php
                            $kelas_table = DB::table('kelas')->get();
                        @endphp
                        <form action="{{ route('pendaftaran_siswa', $kelas->id_draf) }}" method="POST">
                            @csrf
                            <select class="form-control" name="id_kelas" aria-label="Default select example" required>
                                <option selected>Pilih Kelas</option>
                                @foreach ($kelas_table as $k)
                                    <option value="{{ $k->id_kelas }}">{{ $k->kelas }} -- {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="id_jurusan" value="{{ $kelas->id_jurusan }}">
                            <input type="hidden" name="nama_siswa" value="{{ $kelas->nama_siswa }}">
                            <input type="hidden" name="nis" value="{{ $kelas->nis }}">
                            <input type="hidden" name="jk" value="{{ $kelas->jk }}">
                            <input type="hidden" name="tanggal_lahir" value="{{ $kelas->tanggal_lahir }}">
                            <input type="hidden" name="wali_siswa" value="{{ $kelas->wali_siswa }}">
                            <input type="hidden" name="alamat_siswa" value="{{ $kelas->alamat_siswa }}">
                            <input type="hidden" name="status" value="{{ $kelas->status }}">
                            <input type="hidden" name="bayar" value="{{ $kelas->bayar }}">
                            <input type="hidden" name="tanggal" value="{{ $kelas->tanggal }}">

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
            $('#modalsaya' + tes).modal('show');

        }

        function kelas() {
            var kelass = document.getElementById("kelas").value;
            console.log(tes);
            $('#kelassaya' + tes).modal('show');

        }
    </script>
@endsection
