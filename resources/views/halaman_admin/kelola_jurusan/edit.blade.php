@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Kelola Jurusan / Edit Data</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <form action="{{ route('jurusan_edit', $edit->id_jurusan) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nama Jurusan</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="nama_jurusan"
                                    value="{{ $edit->nama_jurusan }}" placeholder="Input Nama Akun" required>
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
