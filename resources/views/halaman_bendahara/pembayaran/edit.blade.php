@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Kelola Pembayaran / Edit Data</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 card-box mb-30">
                    <form action="{{ route('pembayaran_edit', $edit->id_pembayaran) }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Kode Pembayaran</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="kode" value="{{ $edit->kode }}"
                                    placeholder="Inputkan Kode Pembayaran" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Jenis Pembayaran</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="form-control" name="jenis_pembayaran" onchange="jenis(this);"
                                    aria-label="Default select example" required>
                                    <option value="{{ $edit->jenis_pembayaran }}"><span
                                            class="text-capitalize">{{ $edit->jenis_pembayaran }}</span></option>
                                    <option value="Uang Pendaftaran">Uang Pendaftaran</option>
                                    <option value="Uang Seragam">Uang Seragam</option>
                                    <option value="Uang DSP">Uang DSP</option>
                                    <option value="Uang SPP">Uang SPP</option>
                                    <option value="Uang Ujian">Uang Ujian</option>
                                    <option value="Uang PKL">Uang PKL</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nominal</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="nominal" id="harga_satuan"
                                    placeholder="Input Nama Akun" value="{{ $edit->nominal }}" required>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a href="{{ route('pembayaran') }}" class="btn btn-danger">Kembali</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function jenis(val) {
            $.ajax({
                type: "POST",
                url: "{{ route('ajax_tambah') }}",
                dataType: "JSON",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "jenis": val.value
                },
                success: function(response) {
                    // document.getElementById("#harga_satuan").value(response)
                    $('#harga_satuan').val(response)
                }
            });
        }
    </script>
@endsection
