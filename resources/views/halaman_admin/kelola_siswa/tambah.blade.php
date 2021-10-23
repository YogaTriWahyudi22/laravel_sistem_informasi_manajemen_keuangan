@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Kelola Siswa / Tambah Data</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <form action="{{ route('siswa_tambah') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Kelas</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="id_kelas" required>
                                    <option selected="">Pilih Kelas...</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id_kelas }}">{{ $k->kelas }} -- {{ $k->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Jurusan</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="id_jurusan" required>
                                    <option selected="">Pilih Jurusan...</option>
                                    @foreach ($jurusan as $j)
                                        <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nama Siswa</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="nama_siswa" placeholder="inputkan nama Siswa"
                                    type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">NIS</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="nis" placeholder="Inputkan Username" type="text"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="jk" placeholder="Inputkan Jenis Kelamin" type="text"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" type="date"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Wali SIswa</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="wali_siswa" placeholder="Inputkan Wali Siswa"
                                    type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="alamat_siswa" placeholder="Inputkan Alamat"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Status Siswa</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="status" required>
                                    <option selected="">Status Siswa...</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a href="{{ route('kelas') }}" class="btn btn-danger">Kembali</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
