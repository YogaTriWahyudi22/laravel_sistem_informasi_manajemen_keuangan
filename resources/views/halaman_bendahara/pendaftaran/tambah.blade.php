                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pendaftaran / Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('pendaftaran_tambah') }}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input class="form-control" name="nama_siswa"
                                                    placeholder="inputkan nama Siswa" type="text" required>
                                            </div>

                                            <div class="form-group">
                                                <label>NIS</label>
                                                <input class="form-control" name="nis" placeholder="Inputkan NIS"
                                                    type="text" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Pilih Jurusan</label>
                                                <select class="form-control" name="id_jurusan"
                                                    aria-label="Default select example">
                                                    <option selected>Pilih Jurusan</option>
                                                    @php
                                                        $jurusan = DB::table('jurusan')->get();
                                                    @endphp
                                                    @foreach ($jurusan as $j)
                                                        <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="custom-select col-12" name="jk" required>
                                                    <option selected="">Pilih Jenis Kelamin...</option>
                                                    <option value="laki-laki">laki-laki</option>
                                                    <option value="perempuan">perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input class="form-control" name="tanggal_lahir"
                                                    placeholder="Inputkan Tanggal Lahir" type="date" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Wali SIswa</label>
                                                <input class="form-control" name="wali_siswa"
                                                    placeholder="Inputkan Wali Siswa" type="text" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input class="form-control" name="alamat_siswa"
                                                    placeholder="Inputkan Alamat" type="text" required>
                                            </div>

                                            <button class="btn btn-primary" type="submit">Submit</button>
                                            <a href="{{ route('pendaftaran') }}" class="btn btn-danger">Kembali</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
