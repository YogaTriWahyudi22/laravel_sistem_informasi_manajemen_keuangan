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
                    </div>
                    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                        <div class="pb-20">
                            <ul class="list-group">
                                @foreach ($detail_slip as $detail)
                                    <a href="{{ route('cetak_slide', $detail->periode) }}" target="_blank">
                                        <li class="list-group-item">
                                            {{ $detail->periode }} </li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>

    @endsection
