@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Kelola Kelas / Edit Data</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <form action="{{ route('kelas_edit', $edit->id_kelas) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Kelas</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="kelas" required>
                                    <option selected="">{{ $edit->kelas }}</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nama Kelas</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="nama_kelas" value="{{ $edit->nama_kelas }}"
                                    placeholder="inputkan nama kelas" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Wali Kelas</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="wali_kelas" value="{{ $edit->wali_kelas }}"
                                    placeholder="Inputkan Wali Kelas" type="text" required>
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
