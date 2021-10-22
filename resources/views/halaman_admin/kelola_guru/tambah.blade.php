@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Kelola Guru / Tambah Data</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <form action="{{ route('guru_tambah') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nama Guru</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="nama_guru" placeholder="Input Nama Guru"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">NIP</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="nip" placeholder="Input NIP" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="nohp" placeholder="Input Nomor Telpon"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-12 col-md-10">

                                <select class="form-control" name="jk" aria-label="Default select example" required>
                                    <option selected>Jenis Kelamin</option>
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Bidang</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="bidang" placeholder="Input Bidang" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="alamat" placeholder="Input Alamat" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Status</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="status" required>
                                    <option selected="">Status...</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak_Aktif">Tidak_Aktif</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a href="{{ route('jurusan') }}" class="btn btn-danger">Kembali</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
