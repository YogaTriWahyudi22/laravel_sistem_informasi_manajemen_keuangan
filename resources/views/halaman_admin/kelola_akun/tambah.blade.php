@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Kelola Akun / Tambah Data</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <form action="{{ route('akun_tambah') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="nama" placeholder="Input Nama Lengkap"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="username" placeholder="Inputkan Username" type="text"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="password" placeholder="********" type="password"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="nohp" placeholder="1-(111)-111-1111" type="tel"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Status</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="status" required>
                                    <option selected="">Pilih...</option>
                                    <option value="admin">admin</option>
                                    <option value="bendahara">bendahara</option>
                                    <option value="kepsek">kepsek</option>
                                    <option value="ketua_yayasan">ketua_yayasan</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a href="{{ route('kelola_akun') }}" class="btn btn-danger">Kembali</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
