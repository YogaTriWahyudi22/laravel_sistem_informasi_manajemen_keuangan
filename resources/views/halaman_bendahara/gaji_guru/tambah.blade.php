@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Pembayaran Gaji Guru / Tambah Data</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    @php
                        $t = Date('Y');
                        $b = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    @endphp
                    <form action="{{ route('pembayaran_gaji_tambah') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="control-label"> Pilih Bulan</label>
                            <select class="form-control" name="periode" aria-label="Default select example" required>
                                <option selected>Pilih Bulan</option>
                                @foreach ($b as $i)
                                    <option value="<?= $i . '-' . $t ?>"><?= $i . '-' . $t ?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Pilih Guru</label>
                            @php
                                $guru = DB::table('guru')->get();
                            @endphp
                            <select class="form-control" name="id_guru" aria-label="Default select example" required>
                                <option selected>Pilih Guru</option>

                                @foreach ($guru as $i)
                                    <option value="{{ $i->id_guru }}">{{ $i->nama_guru }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Jam Kerja</label>
                            <div><input type="text" name="jam" name="nominal" class="form-control" id="jam"></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label"> Nominal</label>
                            <div>
                                <input type="text" readonly="" name="nominal" class="form-control" id="total">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><span class="text-capitalize">simpan</span></button>
                        <a href="{{ route('pembayaran_gaji') }}" class="btn btn-danger">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let jam = document.getElementById("jam")
            jam.addEventListener('keyup', function() {
                let total = "40000"
                document.getElementById("total").value = parseInt(total) * parseInt(this.value)
            });
        });
    </script>
@endsection
