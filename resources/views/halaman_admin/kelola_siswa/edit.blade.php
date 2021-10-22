@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Kelola Siswa / Edit Data</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <form action="{{ route('siswa_edit', $edit->id_siswa) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Kelas</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="id_kelas" required>
                                    @php
                                        $kelas1 = DB::table('kelas')
                                            ->where('id_kelas', '=', $edit->id_kelas)
                                            ->first();
                                    @endphp
                                    <option value="{{ $kelas1->id_kelas }}">{{ $kelas1->kelas }} --
                                        {{ $kelas1->nama_kelas }}</option>
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
                                    @php
                                        $ju = DB::table('jurusan')
                                            ->where('id_jurusan', '=', $edit->id_jurusan)
                                            ->first();
                                    @endphp
                                    <option value="{{ $ju->id_jurusan }}">{{ $ju->nama_jurusan }}</option>
                                    @foreach ($jurusan as $j)
                                        <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nama Siswa</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="nama_siswa" value="{{ $edit->nama_siswa }}"
                                    placeholder="inputkan nama kelas" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">NIS</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="nis" value="{{ $edit->nis }}"
                                    placeholder="Inputkan Username" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="jk" value="{{ $edit->jk }}"
                                    placeholder="Inputkan Username" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="tanggal_lahir" value="{{ $edit->tanggal_lahir }}"
                                    placeholder="Inputkan Username" type="date" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Wali SIswa</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="wali_siswa" value="{{ $edit->wali_siswa }}"
                                    placeholder="Inputkan Username" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Alamat</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="alamat_siswa" placeholder="Inputkan Alamat"
                                    required>{{ $edit->alamat_siswa }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Status Siswa</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="status" required>
                                    <option selected="">{{ $edit->status }}</option>
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
