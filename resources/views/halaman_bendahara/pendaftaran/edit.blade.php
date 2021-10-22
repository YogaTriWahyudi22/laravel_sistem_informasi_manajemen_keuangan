@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Pendaftaran / Edit Data</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <form action="{{ route('pendaftaran_edit', $edit->id_pendaftaran) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input class="form-control" name="nama_siswa" value="{{ $edit->nama_siswa }}"
                                placeholder="inputkan nama Siswa" type="text" required>
                        </div>

                        <div class="form-group">
                            <label>NIS</label>
                            <input class="form-control" name="nis" value="{{ $edit->nis }}" placeholder="Inputkan NIS"
                                type="text" required>
                        </div>

                        <div class="form-group">
                            <label>Pilih Jurusan</label>
                            <select class="form-control" name="id_jurusan" aria-label="Default select example">
                                @php
                                    $edit_jurusan = DB::table('jurusan')
                                        ->where('id_jurusan', $edit->id_jurusan)
                                        ->first();
                                @endphp
                                <option value="{{ $edit_jurusan->id_jurusan }}">{{ $edit_jurusan->nama_jurusan }}
                                </option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="custom-select col-12" name="jk" required>
                                <option selected="">{{ $edit->jk }}</option>
                                <option value="laki-laki">laki-laki</option>
                                <option value="perempuan">perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="form-control" name="tanggal_lahir" value="{{ $edit->tanggal_lahir }}"
                                placeholder="Inputkan Tanggal Lahir" type="date" required>
                        </div>

                        <div class="form-group">
                            <label>Wali SIswa</label>
                            <input class="form-control" name="wali_siswa" value="{{ $edit->wali_siswa }}"
                                placeholder="Inputkan Wali Siswa" type="text" required>
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <input class="form-control" name="alamat_siswa" value="{{ $edit->alamat_siswa }}"
                                placeholder="Inputkan Alamat" type="text" required>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a href="{{ route('pendaftaran') }}" class="btn btn-danger">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
