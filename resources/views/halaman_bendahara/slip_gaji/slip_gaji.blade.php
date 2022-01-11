@extends('template.admin')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Pembayaran Uang DSP</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="pd-20">
                        {{-- <form action="{{ route('dsp_cari') }}" method="POST">
                            @csrf
                            <select class="form-control" name="cari" aria-label="Default select example">
                                <option value="0">Pilih Kelas</option>

                                @foreach ($pilih_kelas as $k)
                                    <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                            <button style="submit" class="btn btn-primary mt-2">Cari</button>
                        </form> --}}
                    </div>
                    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                        <div class="pb-20">
                            <ul class="list-group">
                                @foreach ($slip_gaji as $slip)
                                    <li class="list-group-item"><a href="{{ route('detail_slip_gaji', $slip->id_guru) }}">
                                            {{ $slip->nama_guru }} </a> </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>

    @endsection
